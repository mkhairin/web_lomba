<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;

class SubmitTugasController extends BaseController
{
    protected $submitTugasModel;

    public function __construct()
    {
        // Inisialisasi model
        $this->submitTugasModel = new \App\Models\SubmitTugasModel();

        // Check if user is logged in and has 'user' role
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'user') {
            return redirect()->to('/login')->with('error', 'You must be a user to access this page.');
        }
    }

    public function insert()
    {
        // Check if user is logged in and has 'user' role
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'user') {
            return redirect()->to('/login')->with('error', 'You must be a user to access this page.');
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
            'status_pengumpulan'    => 'required',
            'status_penilaian'     => 'required',
            'tgl'                   => 'required',
            'jam'                   => 'required',
        ]);

        // Run validation
        if (!$validation->withRequest($this->request)->run()) {
            // If validation fails, redirect with error messages
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // If validation passes, continue with inserting data
        $data = [
            'id_submit_pengumpulan' => esc($this->request->getPost('id_submit_pengumpulan')),
            'tim'                   => esc($this->request->getPost('tim')),
            'ketua'                 => esc($this->request->getPost('ketua')),
            'lomba'                 => esc($this->request->getPost('lomba')),
            'pembimbing'            => esc($this->request->getPost('pembimbing')),
            'sekolah'               => esc($this->request->getPost('sekolah')),
            'link_tugas'            => esc($this->request->getPost('link_tugas')),
            'status_pengumpulan'    => esc($this->request->getPost('status_pengumpulan')),
            'status_penilaian'     => esc($this->request->getPost('status_penilaian')),
            'tgl'                   => esc($this->request->getPost('tgl')),
            'jam'                   => esc($this->request->getPost('jam')),
        ];

        try {
            // Try inserting data into the model
            if ($this->submitTugasModel->insert($data)) {
                session()->setFlashdata('success', 'Horee! Kamu berhasil menyelesaikan Tugas!');
            } else {
                session()->setFlashdata('error', 'Data Gagal Ditambah!');
            }
        } catch (\Exception $e) {
            // Log error message and show general error to user
            log_message('error', $e->getMessage());
            session()->setFlashdata('error', 'Terjadi kesalahan pada server!');
        }

        // Redirect back to the previous page after inserting
        return redirect()->back();
    }
}
