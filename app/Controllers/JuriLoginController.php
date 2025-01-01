<?php

namespace App\Controllers;

use App\Models\JuriModel;
use App\Models\LombaModel;
use App\Controllers\BaseController;
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
        // Load helper cookie dan URL
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
        $JuriModel = new JuriModel();
        $lombaModel = new LombaModel();
    
        // Cek apakah username ada di database tabel juri
        $juri = $JuriModel->where('username', $username)->first();
    
        if ($juri) {
            if (password_verify($password, $juri['password'])) {
                if ($juri['role'] !== 'juri') {
                    session()->setFlashdata('error', 'You are not authorized to access this page!');
                    return redirect()->to('/juri_panel');
                }
    
                 // Ambil kategori lomba berdasarkan id_lomba
                 $lomba = $lombaModel->where('id_lomba', $juri['id_lomba'])->first();
                 $kategoriLomba = $lomba ? $lomba['nama'] : 'No category';

                // Simpan data di session termasuk id_lomba
                session()->set([
                    'id_juri' => $juri['id_juri'],
                    'username' => $juri['username'],
                    'role' => $juri['role'], // Role user
                    'lomba' => $kategoriLomba,
                    'id_lomba' => $juri['id_lomba'], // id_lomba dari data juri
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
                    set_cookie('user_cookie', $encryptedData, 604800); // 7 hari
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

    public function logout()
    {
        session()->destroy();

        helper('cookie');
        // Hapus cookie
        delete_cookie('user_cookie');

        return redirect()->to('/juri_panel');
    }
}
