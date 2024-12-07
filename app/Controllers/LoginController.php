<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use App\Models\LombaModel;
use App\Models\AdminModel;
use App\Models\TimLombaModel;

class LoginController extends BaseController
{
    public function login()
    {
        $header['title'] = 'Login';

        // Memuat tampilan login
        echo view('login/header_user', $header);
        echo view('login/login');
        echo view('login/footer_user');
    }

    public function loginAuth()
    {
        // Ambil data dari form
        $username = esc($this->request->getPost("username"));
        $password = esc($this->request->getPost("password"));

        // Pastikan input tidak kosong
        if (empty($username) || empty($password)) {
            session()->setFlashdata('error', 'Username and Password must be filled!');
            return redirect()->to('/login');
        }

        // Memanggil model
        $userModel = new UsersModel();
        $lombaModel = new LombaModel();
        $timLombaModel = new TimLombaModel();

        // Cek apakah username ada di database tabel user
        $user = $userModel->where('username', $username)->first();

        if ($user) {
            // Verifikasi password
            if (password_verify($password, $user['password'])) {
                // Ambil kategori lomba berdasarkan id_lomba
                $lomba = $lombaModel->where('id_lomba', $user['id_lomba'])->first();
                $kategoriLomba = $lomba ? $lomba['nama'] : 'No category';

                // Ambil nama tim lomba berdasarkan id_tim_lomba
                $timLomba = $timLombaModel->where('id_tim_lomba', $user['id_tim_lomba'])->first();
                $idTim = $timLomba['id_tim_lomba'] ?? null;
                $namaTimLomba = $timLomba['nama_tim'] ?? 'No team';

                // Simpan data di session
                session()->set([
                    'id_user' => $user['id_user'],
                    'username' => $user['username'],
                    'role' => $user['role'], // Role user
                    'lomba' => $kategoriLomba, // Nama kategori lomba
                    'id_tim' => $idTim, // ID tim
                    'tim_lomba' => $namaTimLomba, // Nama tim
                    'logged_in' => true,
                ]);

                // Redirect berdasarkan role
                if ($user['role'] === 'juri') {
                    return redirect()->to('/juri-dashboard');
                } elseif ($user['role'] === 'user') {
                    return redirect()->to('/user-dashboard');
                }
            } else {
                // Password salah
                session()->setFlashdata('error', 'Password incorrect!');
            }
        } else {
            // Username tidak ditemukan
            session()->setFlashdata('error', 'Username not found!');
        }

        // Jika autentikasi gagal, kembali ke halaman login
        return redirect()->to('/login');
    }



    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }
}
