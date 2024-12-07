<?php

namespace App\Controllers;

use App\Models\SekolahModel;
use App\Models\SubmitTugasModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\RedirectResponse;

class SekolahController extends BaseController
{
    protected $sekolahModel;
    protected $submitTugasModel;

    public function __construct()
    {
        // untuk dashboard admin
        $this->submitTugasModel = new SubmitTugasModel();

        $this->sekolahModel = new SekolahModel();
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }
    }

    // sekolah methods
    public function sekolahView(): ResponseInterface
    {
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }

        $data['dataSubmit'] = count($this->submitTugasModel->getDataSubmit());
        $data['dataIsNotSubmit'] = count($this->submitTugasModel->getDataNotSubmit());

        $data['dataSekolah'] = $this->sekolahModel->getdata();

        $header['title'] = 'Daftar Sekolah';
        
        echo view('azia/header', $header);
        echo view('azia/top_menu');
        echo view('azia/side_menu');
        echo view('admin/daftar_sekolah', $data);
        echo view('azia/footer');

        return $this->response;
    }

    public function insert(): RedirectResponse
    {
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }

        // Aturan validasi
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_sekolah' => 'required',
            'alamat' => 'required'
        ]);

        // Cek validasi input
        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('validation', $this->validator->getErrors());
        }

        // Jika validasi berhasil, lanjutkan ke insert data
        $data = [
            'nama_sekolah' => esc($this->request->getPost("nama_sekolah")),
            'alamat' => esc($this->request->getPost("alamat")),
        ];

        try {
            // Asumsikan insertData mengembalikan ID baru atau false jika gagal
            if ($this->sekolahModel->insert($data)) {
                session()->setFlashdata('success', 'Data Berhasil Ditambah!');
            } else {
                session()->setFlashdata('error', 'Data Gagal Ditambah!');
            }
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());  // Logging error details
            session()->setFlashdata('error', 'Terjadi kesalahan pada server!');
        }

        return redirect()->to('/daftar-sekolah'); // Redirect ke halaman daftar setelah insert
    }

    public function update($id): RedirectResponse
    {
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }

        // Aturan validasi
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_sekolah' => 'required',
            'alamat' => 'required'
        ]);

        // Cek validasi input
        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        // Jika validasi berhasil, lanjutkan ke update data
        $data = [
            'id_sekolah' => esc($this->request->getPost("id")),
            'nama_sekolah' => esc($this->request->getPost("nama_sekolah")),
            'alamat' => esc($this->request->getPost("alamat")),
        ];

        try {
            if ($this->sekolahModel->update($id, $data)) {
                session()->setFlashdata('success', 'Data Berhasil Diubah!');
            } else {
                session()->setFlashdata('error', 'Data Gagal Diubah!');
            }
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());  // Logging error details
            session()->setFlashdata('error', 'Terjadi kesalahan pada server!');
        }

        return redirect()->to('/daftar-sekolah');
    }

    public function delete($id): RedirectResponse
    {
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }

        try {
            if ($this->sekolahModel->deleteData($id)) {
                session()->setFlashdata('success', 'Data Berhasil Dihapus!');
            } else {
                session()->setFlashdata('error', 'Data Gagal Dihapus!');
            }
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());  // Logging error details
            session()->setFlashdata('error', 'Terjadi kesalahan pada server!');
        }

        return redirect()->to('/daftar-sekolah');
    }
}
