<?php

namespace App\Controllers;

use App\Models\JuriModel;
use App\Controllers\BaseController;
use App\Models\UsersModel;
use CodeIgniter\HTTP\ResponseInterface;

class JuriLoginController extends BaseController
{
    public function loginJuri()
    {
        $header['title'] = 'Login Juri';

        // Memuat tampilan login untuk juri
        echo view('login/header', $header);
        echo view('login/juri_panel');
        echo view('login/footer');
    }

    public function loginJuriAuth()
    {
        // Load helper cookie
        helper('cookie', 'url');

        // Load Encryption Library
        $encrypter = \Config\Services::encrypter();

        // Ambil data dari form
        $username = esc($this->request->getPost("username"));
        $password = esc($this->request->getPost("password"));
        $rememberMe = $this->request->getPost('remember_me');

        // Pastikan input tidak kosong
        if (empty($username) || empty($password)) {
            session()->setFlashdata('error', 'Username and Password must be filled!');
            return redirect()->to('/juri_panel');
        }

        // Memanggil model
        $userModel = new UsersModel();

        // Cek apakah username ada di database tabel user
        $user = $userModel->where('username', $username)->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                if ($user['role'] !== 'juri') {
                    session()->setFlashdata('error', 'You are not authorized to access this page!');
                    return redirect()->to('/juri_panel');
                }

                // / Simpan data di session
                session()->set([
                    'id_user' => $user['id_user'],
                    'username' => $user['username'],
                    'role' => $user['role'], // Role user
                    'logged_in' => true,
                ]);
                // Menyimpan cookie jika Remember Me dicentang
                if ($rememberMe) {
                    // Buat array data untuk disimpan dalam cookie
                    $cookieData = [
                        'username' => $username,
                    ];

                    // Enkripsi data cookie
                    $encryptedData = base64_encode($encrypter->encrypt(json_encode($cookieData)));

                    // Simpan cookie terenkripsi
                    set_cookie('user_cookie', $encryptedData, 604800 * 7); // 7 hari
                }

                // Redirect ke dashboard juri
                return redirect()->to('/juri-dashboard');
            } else {
                // Password salah
                session()->setFlashdata('error', 'Password incorrect!');
            }
        } else {
            // Username tidak ditemukan
            session()->setFlashdata('error', 'Username not found!');
        }

        // Jika autentikasi gagal, kembali ke halaman login
        return redirect()->to('/juri_panel');
    }
}
