<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use App\Models\LombaModel;
use App\Models\TimLombaModel;

class LoginController extends BaseController
{
    public function login()
    {
        helper('cookie');
        $encrypter = \Config\Services::encrypter();

        $username = '';
        $password = ''; // Password tidak disarankan ditampilkan di input field, lebih baik biarkan kosong

        if (get_cookie('user_cookie')) {
            try {
                // Mendekripsi data dari cookie
                $decryptedData = $encrypter->decrypt(base64_decode(get_cookie('user_cookie')));
                $cookieData = json_decode($decryptedData, true);

                if (isset($cookieData['username'])) {
                    $username = $cookieData['username']; // Menampilkan username
                    // Password tidak disertakan dalam cookie (keamanan)
                }
            } catch (\Exception $e) {
                // Jika ada error dekripsi, hapus cookie
                delete_cookie('user_cookie');
            }
        }

        $header['title'] = 'Login';

        // Memuat tampilan login
        echo view('login/header_user', $header);
        echo view('login/login', ['username' => $username, 'password' => $password]);
        echo view('login/footer_user');
    }

    public function loginAuth()
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
                // Pastikan role user adalah 'user', jika bukan 'user' (misal 'juri'), redirect ke login
                if ($user['role'] !== 'user') {
                    session()->setFlashdata('error', 'Only users can login. Juri cannot login!');
                    return redirect()->to('/login');
                }

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

                // Redirect berdasarkan role
                return redirect()->to('/user-dashboard');
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

        helper('cookie');
        // Hapus cookie
        delete_cookie('user_cookie');

        return redirect()->to('/login');
    }
}
