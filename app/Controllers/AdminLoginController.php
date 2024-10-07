<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AdminLoginController extends BaseController
{
    public function loginAdmin()
    {
        $header['title'] = 'Login';

        // Memuat tampilan login
        echo view('login/header', $header);
        echo view('login/admin_panel');
        echo view('login/footer');
    }

    public function loginAuth()
    {
        // Mengambil data username dan password dari form
        $username = esc($this->request->getPost("username"));
        $password = esc($this->request->getPost("password"));

        // Memanggil model Admin
        $adminModel = new AdminModel();

        // Cek apakah username ada di database tabel admin
        $admin = $adminModel->where('username', $username)->first();

        // Verifikasi password
        if ($admin && password_verify($password, $admin['password'])) {

            // Menyimpan data yang dibutuhkan di session
            session()->set([
                'id_admin' => $admin['id_admin'],
                'username' => $admin['username'],
                'role' => 'admin', // Set role ke admin
                'logged_in' => true,
            ]);

            // Redirect ke halaman admin
            return redirect()->to('/admin');
        } else {
            // Jika autentikasi gagal, tampilkan pesan kesalahan
            session()->setFlashdata('error', 'Username or Password incorrect!');
            return redirect()->to('/login');
        }
    }
}
