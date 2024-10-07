<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class PengumpulanController extends BaseController
{
    protected $modelLomba, $modelPengumpulan;

    public function __construct()
    {
        // Inisialisasi model
        $this->modelLomba = new \App\Models\LombaModel();
        $this->modelPengumpulan = new \App\Models\PengumpulanModel();

        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/login')->with('error', 'You must be an admin to access this page.');
        }
    }

    public function index()
    {
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/login')->with('error', 'You must be an admin to access this page.');
        }

        $data['dataLomba'] = $this->modelLomba->getdata();
        $data['dataPengumpulan'] = $this->modelPengumpulan->getdata();

        $header['title'] = 'Daftar Pengumpulan';

        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('admin/daftar_pengumpulan', $data);
        echo view('partial/footer');
    }

    public function insert()
    {
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/login')->with('error', 'You must be an admin to access this page.');
        }

        // Aturan validasi
        $validationRules = [
            'id_lomba' => 'required',
            'link_pengumpulan' => 'required',
            'deadline' => 'required',
            'status' => 'required'
        ];

        // Cek validasi input
        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator->getErrors());
        }

        // Jika validasi berhasil, lanjutkan ke insert data
        $data = [
            'id_pengumpulan' => esc($this->request->getPost('id_pengumpulan')),
            'id_lomba' => esc($this->request->getPost('id_lomba')),
            'link_pengumpulan' => esc($this->request->getPost('link_pengumpulan')),
            'deadline' => esc($this->request->getPost('deadline')),
            'status' => esc($this->request->getPost('status')),
        ];

        try {
            // Asumsikan insertData mengembalikan ID baru atau false jika gagal
            if ($this->modelPengumpulan->insert($data)) {
                session()->setFlashdata('success', 'Data Berhasil Ditambah!');
            } else {
                session()->setFlashdata('error', 'Data Gagal Ditambah!');
            }
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());  // Logging error details
            session()->setFlashdata('error', 'Terjadi kesalahan pada server!');
        }

        return redirect()->to('/daftar-pengumpulan'); // Redirect ke halaman daftar setelah insert
    }

    public function update($id)
    {
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/login')->with('error', 'You must be an admin to access this page.');
        }

        // Aturan validasi
        $validationRules = [
            'id_lomba' => 'required',
            'link_pengumpulan' => 'required',
            'deadline' => 'required',
            'status' => 'required'
        ];

        // Cek validasi input
        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator->getErrors());
        }

        // Jika validasi berhasil, lanjutkan ke insert data
        $data = [
            'id_pengumpulan' => esc($this->request->getPost('id_pengumpulan')),
            'id_lomba' => esc($this->request->getPost('id_lomba')),
            'link_pengumpulan' => esc($this->request->getPost('link_pengumpulan')),
            'deadline' => esc($this->request->getPost('deadline')),
            'status' => esc($this->request->getPost('status')),
        ];

        try {
            if ($this->modelPengumpulan->update($id, $data)) {
                session()->setFlashdata('success', 'Data Berhasil Diubah!');
            } else {
                session()->setFlashdata('error', 'Data Gagal Diubah!');
            }
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());  // Logging error details
            session()->setFlashdata('error', 'Terjadi kesalahan pada server!');
        }

        return redirect()->to('/daftar-pengumpulan'); // Redirect ke halaman daftar setelah insert
    }
}
