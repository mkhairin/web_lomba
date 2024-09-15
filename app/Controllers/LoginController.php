<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class LoginController extends BaseController
{
    public function login()
    {
        $header['title'] = 'Login';

        // Memuat tampilan login
        echo view('login/header', $header);
        echo view('login/login');
        echo view('login/footer');
    }

    public function loginAuth()
    {
        // Mengambil data username dan password dari form
        $username = $this->request->getPost("username");
        $password = $this->request->getPost("password");

        // Memanggil model Users
        $userModel = new UsersModel();

        // Cek apakah username ada di database
        $user = $userModel->where('username', $username)->first();

        // Verifikasi password
        if ($user && password_verify($password, $user['password'])) {
            // Menyimpan data yang dibutuhkan di session tanpa menggunakan setUserSession
            session()->set([
                'id_user' => $user['id_user'],
                'username' => $user['username'],
                'role' => $user['role'], // Simpan role di session
                'logged_in' => true,
            ]);

            // Redirect ke halaman berdasarkan role
            if ($user['role'] === 'admin') {
                return redirect()->to('/admin');
            } elseif ($user['role'] === 'user') {
                return redirect()->to('/landing-page');
            }
        } else {
            // Jika autentikasi gagal, tampilkan pesan kesalahan
            session()->setFlashdata('error', 'Username or Password incorrect!');
            return redirect()->to('/login');
        }
    }
}
