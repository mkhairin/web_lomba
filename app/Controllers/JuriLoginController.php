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

    public function loginAuth()
    {
        // Mengambil data username dan password dari form
        $username = esc($this->request->getPost("username"));
        $password = esc($this->request->getPost("password"));

        // Memanggil model Juri
        $juriModel = new JuriModel();

        // Cek apakah username ada di database tabel juri
        $juri = $juriModel->where('username', $username)->first();

        // Verifikasi password
        if ($juri && password_verify($password, $juri['password'])) {

            // Menyimpan data yang dibutuhkan di session
            session()->set([
                'id_juri' => $juri['id_juri'],
                'username' => $juri['username'],
                'role' => 'juri', // Set role ke juri
                'logged_in' => true,
            ]);

            // Redirect ke halaman juri
            return redirect()->to('/daftar-juri');
        } else {
            // Jika autentikasi gagal, tampilkan pesan kesalahan
            session()->setFlashdata('error', 'Username or Password incorrect!');
            return redirect()->to('/juri_panel');
        }
    }
}
