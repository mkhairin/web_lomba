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
    protected $emailModel;

    public function __construct()
    {
        // untuk dashboard admin
        $this->submitTugasModel = new SubmitTugasModel();
        $this->sekolahModel = new SekolahModel();
        $this->emailModel = new \App\Models\MailModel();

        // Check if user is admin
        $this->checkAdminAccess();
    }

    private function checkAdminAccess()
    {
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }
    }

    // sekolah methods
    public function sekolahView(): ResponseInterface
    {
        $data['dataSubmit'] = count($this->submitTugasModel->getDataSubmit());
        $data['dataIsNotSubmit'] = count($this->submitTugasModel->getDataNotSubmit());
        $data['dataSekolah'] = $this->sekolahModel->getdata();
        $data['unreadEmailCount'] = $this->emailModel->where('read_status', 'unread')->countAllResults();

        $header['title'] = 'Daftar Sekolah';
        
        echo view('azia/header', $header);
        echo view('azia/top_menu', $data);
        echo view('azia/side_menu', $data);
        echo view('admin/daftar_sekolah', $data);
        echo view('azia/footer');

        return $this->response;
    }

    public function insert(): RedirectResponse
    {
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
            if ($this->sekolahModel->insert($data)) {
                session()->setFlashdata('success', 'Data Berhasil Ditambah!');
            } else {
                session()->setFlashdata('error', 'Data Gagal Ditambah!');
            }
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());  // Logging error details
            session()->setFlashdata('error', 'Terjadi kesalahan pada server!');
        }

        return redirect()->to('/daftar-sekolah');
    }

    public function update($id): RedirectResponse
    {
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
        try {
            if ($this->sekolahModel->delete($id)) { // Use default delete method
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
