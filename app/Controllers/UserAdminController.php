<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class UserAdminController extends BaseController
{
    protected $adminModel;

    public function __construct()
    {
        // Inisialisasi AdminModel
        $this->adminModel = new AdminModel();
    }

    // Method untuk mengecek apakah user adalah admin
    private function isAdmin()
    {
        $session = session();
        return $session->get('logged_in') && $session->get('role') === 'admin';
    }

    // Method untuk menampilkan daftar admin
    public function daftarAdmin()
    {
        // Pengecekan apakah user adalah admin
        if (!$this->isAdmin()) {
            return redirect()->to('/login')->with('error', 'You must be an admin to access this page.');
        }

        $header['title'] = 'Daftar Admin';

        // Mengambil data admin dari model
        $data['dataAdmin'] = $this->adminModel->getdata();

        // Tampilkan view
        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('admin/user_admin', $data);
        echo view('partial/footer');
    }

    // Method untuk memasukkan data admin baru
    public function insert(): RedirectResponse
    {
        // Pengecekan apakah user adalah admin
        if (!$this->isAdmin()) {
            return redirect()->to('/login')->with('error', 'You must be an admin to access this page.');
        }

        // Inisialisasi model Admin
        $adminModel = new \App\Models\AdminModel();

        // Validasi input
        $validationRules = [
            'username' => 'required',
            'password' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        try {
            // Hashing password
            $password = esc($this->request->getPost('password'));
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            // Menyiapkan data untuk dimasukkan ke database
            $data = [
                'username' => esc($this->request->getPost('username')),
                'password' => $passwordHash,
                'role' => esc($this->request->getPost('role'))
            ];

            // Insert data ke tabel Users
            if ($adminModel->insert($data)) {
                session()->setFlashdata('success', 'Data Berhasil Ditambah!');
            } else {
                throw new Exception('Data gagal ditambah.');
            }
        } catch (Exception $e) {
            session()->setFlashdata('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }

        return redirect()->to('/daftar-admin');
    }

    public function update($id): RedirectResponse
    {
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/login')->with('error', 'You must be an admin to access this page.');
        }

        // Inisialisasi model Admin
        $adminModel = new \App\Models\AdminModel();

        // Validasi input
        $validationRules = [
            'username' => 'required',
            'password' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        try {
            $password = esc($this->request->getPost('password'));
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $data = [
                'username' => esc($this->request->getPost('username')),
                'password' => $passwordHash,
                'role' => esc($this->request->getPost('role'))
            ];

            if ($adminModel->update($id, $data)) {
                session()->setFlashdata('success', 'Data Berhasil Ditambah!');
            } else {
                throw new Exception('Data gagal ditambah.');
            }
        } catch (Exception $e) {
            session()->setFlashdata('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }

        return redirect()->to('/daftar-admin');
    }

    public function delete($id): ResponseInterface
    {
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/login')->with('error', 'You must be an admin to access this page.');
        }

        // Inisialisasi model Admin
        $adminModel = new \App\Models\AdminModel();

        try {
            if ($adminModel->delete($id)) {
                session()->setFlashdata('success', 'Data Berhasil Dihapus!');
            } else {
                throw new Exception('Gagal menghapus data.');
            }
        } catch (Exception $e) {
            session()->setFlashdata('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }

        return redirect()->to('/daftar-admin');
    }
}
