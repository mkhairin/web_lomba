<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use App\Models\LombaModel;
use App\Models\AdminModel;

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
        // Mengambil data username dan password dari form
        $username = esc($this->request->getPost("username"));
        $password = esc($this->request->getPost("password"));
    
        // Memanggil model Users
        $userModel = new UsersModel();
        $lombaModel = new LombaModel();
    
        // Cek apakah username ada di database tabel user
        $user = $userModel->where('username', $username)->first();
    
        // Verifikasi password
        if ($user && password_verify($password, $user['password'])) {
            // Ambil kategori lomba berdasarkan lomba_id di tabel user
            $lomba = $lombaModel->where('id_lomba', $user['id_lomba'])->first();
            $kategoriLomba = $lomba ? $lomba['nama'] : 'No category';
    
            // Menyimpan data yang dibutuhkan di session
            session()->set([
                'id_user' => $user['id_user'],
                'username' => $user['username'],
                'role' => $user['role'], // Simpan role di session
                'lomba' => $kategoriLomba,
                'logged_in' => true,
            ]);
    
            // Redirect ke halaman user dashboard
            return redirect()->to('/user-dashboarduser');
        } else {
            // Jika autentikasi gagal, tampilkan pesan kesalahan
            session()->setFlashdata('error', 'Username or Password incorrect!');
            return redirect()->to('/login');
        }
    }
    
}
