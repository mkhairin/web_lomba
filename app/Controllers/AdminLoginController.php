<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AdminLoginController extends BaseController
{
    public function loginAdmin()
    {
        helper('cookie');
        $encrypter = \Config\Services::encrypter();

        $username = '';
        $password = ''; // Password tidak disarankan ditampilkan di input field, lebih baik biarkan kosong

        if (get_cookie('admin_cookie')) {
            try {
                // Mendekripsi data dari cookie
                $decryptedData = $encrypter->decrypt(base64_decode(get_cookie('admin_cookie')));
                $cookieData = json_decode($decryptedData, true);

                if (isset($cookieData['username'])) {
                    $username = $cookieData['username']; // Menampilkan username
                    // Password tidak disertakan dalam cookie (keamanan)
                }
            } catch (\Exception $e) {
                // Jika ada error dekripsi, hapus cookie
                delete_cookie('admin_cookie');
            }
        }

        $header['title'] = 'Admin Login';

        // Memuat tampilan login
        echo view('login/header', $header);
        echo view('login/admin_panel', ['username' => $username, 'password' => $password]);
        echo view('login/footer');
    }

    public function loginAuth()
    {
        // Load helper cookie
        helper('cookie', 'url');

        // Load Encryption Library
        $encrypter = \Config\Services::encrypter();

        // Mengambil data username dan password dari form
        $username = esc($this->request->getPost("username"));
        $password = esc($this->request->getPost("password"));
        $rememberMe = $this->request->getPost('remember_me');

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

            // Set cookie terenkripsi jika Remember Me dicentang
            if ($rememberMe) {
                // Buat array data untuk disimpan dalam cookie
                $cookieData = [
                    'username' => $username,
                    // Jika ingin menyimpan password (meskipun tidak disarankan), bisa dilakukan di sini
                    //'password' => $password, 
                ];

                // Enkripsi data cookie
                $encryptedData = base64_encode($encrypter->encrypt(json_encode($cookieData)));

                // Simpan cookie terenkripsi
                set_cookie('admin_cookie', $encryptedData, 604800 * 7); // 7 hari
            }

            // Redirect ke halaman admin
            return redirect()->to('/admin');
        } else {
            // Jika autentikasi gagal, tampilkan pesan kesalahan
            session()->setFlashdata('error', 'Username or Password incorrect!');
            return redirect()->to('/admin_panel');
        }
    }

    public function logout()
    {
        session()->destroy();

        helper('cookie');

        // Hapus cookie admin
        delete_cookie('admin_cookie');
        delete_cookie('remember_username');
        delete_cookie('remember_password');

        return redirect()->to('/admin_panel');
    }
}
