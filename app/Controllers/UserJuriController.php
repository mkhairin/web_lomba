<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JuriModel;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class UserJuriController extends BaseController
{
    protected $juriModel;

    public function __construct()
    {
        // Inisialisasi JuriModel
        $this->juriModel = new JuriModel();
    }

    // Method untuk mengecek apakah user adalah Admin
    private function isAdmin()
    {
        $session = session();
        return $session->get('logged_in') && $session->get('role') === 'admin';
    }

    // Method untuk menampilkan daftar juri
    public function daftarJuri()
    {
        // Pengecekan apakah user adalah juri
        if (!$this->isAdmin()) {
            return redirect()->to('/login')->with('error', 'You must be a admin to access this page.');
        }

        $header['title'] = 'Daftar Juri';

        // Mengambil data juri dari model
        $data['dataJuri'] = $this->juriModel->getData();

        // Tampilkan view
        echo view('azia/header', $header);
        echo view('azia/top_menu');
        echo view('azia/side_menu');
        echo view('admin/user_juri', $data);
        echo view('azia/footer');
    }

    // Method untuk memasukkan data juri baru
    public function insert(): RedirectResponse
    {
        // Pengecekan apakah user adalah juri
        if (!$this->isAdmin()) {
            return redirect()->to('/login')->with('error', 'You must be a admin to access this page.');
        }

        // Inisialisasi model Juri
        $juriModel = new \App\Models\JuriModel();

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

            // Insert data ke tabel Juri
            if ($juriModel->insert($data)) {
                session()->setFlashdata('success', 'Data Berhasil Ditambah!');
            } else {
                throw new Exception('Data gagal ditambah.');
            }
        } catch (Exception $e) {
            session()->setFlashdata('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }

        return redirect()->to('/daftar-juri');
    }

    public function update($id): RedirectResponse
    {
        // Check if user is juri
        if (!$this->isAdmin()) {
            return redirect()->to('/login')->with('error', 'You must be a admin to access this page.');
        }

        // Inisialisasi model Juri
        $juriModel = new \App\Models\JuriModel();

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

            if ($juriModel->update($id, $data)) {
                session()->setFlashdata('success', 'Data Berhasil Diupdate!');
            } else {
                throw new Exception('Data gagal diupdate.');
            }
        } catch (Exception $e) {
            session()->setFlashdata('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }

        return redirect()->to('/daftar-juri');
    }

    public function delete($id): ResponseInterface
    {
        // Check if user is juri
        if (!$this->isAdmin()) {
            return redirect()->to('/login')->with('error', 'You must be a admin to access this page.');
        }

        // Inisialisasi model Juri
        $juriModel = new \App\Models\JuriModel();

        try {
            if ($juriModel->delete($id)) {
                session()->setFlashdata('success', 'Data Berhasil Dihapus!');
            } else {
                throw new Exception('Gagal menghapus data.');
            }
        } catch (Exception $e) {
            session()->setFlashdata('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }

        return redirect()->to('/daftar-juri');
    }
}
