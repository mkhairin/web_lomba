<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class SubmitTugasController extends BaseController
{
    protected $submitTugasModel;

    public function __construct()
    {
        // Inisialisasi model
        $this->submitTugasModel = new \App\Models\SubmitTugasModel();

        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'user') {
            return redirect()->to('/login')->with('error', 'You must be an admin to access this page.');
        }
    }

    public function insert()
    {
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'user') {
            return redirect()->to('/login')->with('error', 'You must be an admin to access this page.');
        }

        // Set validation rules
        $validation = \Config\Services::validation();
        $validation->setRules([
            'tim'                   => 'required',
            'ketua'                 => 'required',
            'lomba'                 => 'required',
            'pembimbing'            => 'required',
            'sekolah'               => 'required',
            'link_tugas'            => 'required',
        ]);

        // Run validation
        if (!$validation->withRequest($this->request)->run()) {
            // Jika validasi gagal, redirect dengan pesan error
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Jika validasi berhasil, lanjutkan ke insert data
        $data = [
            'id_submit_pengumpulan' => esc($this->request->getPost('id_submit_pengumpulan')),
            'tim'                   => esc($this->request->getPost('tim')),
            'ketua'                 => esc($this->request->getPost('ketua')),
            'lomba'                 => esc($this->request->getPost('lomba')),
            'pembimbing'            => esc($this->request->getPost('pembimbing')),
            'sekolah'               => esc($this->request->getPost('sekolah')),
            'link_tugas'            => esc($this->request->getPost('link_tugas')),
        ];

        try {
            // Asumsikan insertData mengembalikan ID baru atau false jika gagal
            if ($this->submitTugasModel->insert($data)) {
                session()->setFlashdata('success', 'Horee Kamu berhasil menyelesaikan Tugas!!!');
            } else {
                session()->setFlashdata('error', 'Data Gagal Ditambah!');
            }
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());  // Logging error details
            session()->setFlashdata('error', 'Terjadi kesalahan pada server!');
        }

        return redirect()->back();
    }
}
