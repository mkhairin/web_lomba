<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SoalModel;
use App\Models\SubmitTugasModel;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class SoalController extends BaseController
{
    protected $modelLomba, $modelSoal;
    protected $submitTugasModel;

    public function __construct()
    {
        // untuk dashboard admin
        $this->submitTugasModel = new SubmitTugasModel();

        // Inisialisasi model
        $this->modelLomba = new \App\Models\LombaModel();
        $this->modelSoal = new \App\Models\SoalModel();

        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }
    }

    public function index()
    {
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }

        $data['dataLomba'] = $this->modelLomba->getdata();
        $data['dataSoal'] = $this->modelSoal->getdata();

        $data['dataSubmit'] = count($this->submitTugasModel->getDataSubmit());
        $data['dataIsNotSubmit'] = count($this->submitTugasModel->getDataNotSubmit());

        $header['title'] = 'Daftar Soal';

        echo view('azia/header', $header);
        echo view('azia/top_menu');
        echo view('azia/side_menu');
        echo view('admin/daftar_soal', $data);
        echo view('azia/footer');
    }

    public function insert()
    {
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }

        // Aturan validasi
        $validationRules = [
            'id_lomba' => 'required',
            'link_soal' => 'required'
        ];

        // Cek validasi input
        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator->getErrors());
        }

        // Jika validasi berhasil, lanjutkan ke insert data
        $data = [
            'id_soal' => esc($this->request->getPost('id_soal')),
            'id_lomba' => esc($this->request->getPost('id_lomba')),
            'link_soal' => esc($this->request->getPost('link_soal')),
        ];

        try {
            // Asumsikan insertData mengembalikan ID baru atau false jika gagal
            if ($this->modelSoal->insert($data)) {
                session()->setFlashdata('success', 'Data Berhasil Ditambah!');
            } else {
                session()->setFlashdata('error', 'Data Gagal Ditambah!');
            }
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());  // Logging error details
            session()->setFlashdata('error', 'Terjadi kesalahan pada server!');
        }

        return redirect()->to('/daftar-soal'); // Redirect ke halaman daftar setelah insert
    }

    public function update($id)
    {
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }

        // Aturan validasi
        $validationRules = [
            'id_lomba' => 'required',
            'link_soal' => 'required'
        ];

        // Cek validasi input
        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator->getErrors());
        }

        // Jika validasi berhasil, lanjutkan ke insert data
        $data = [
            'id_soal' => esc($this->request->getPost('id_soal')),
            'id_lomba' => esc($this->request->getPost('id_lomba')),
            'link_soal' => esc($this->request->getPost('link_soal')),
        ];

        try {
            // Asumsikan insertData mengembalikan ID baru atau false jika gagal
            if ($this->modelSoal->update($id, $data)) {
                session()->setFlashdata('success', 'Data Berhasil Ditambah!');
            } else {
                session()->setFlashdata('error', 'Data Gagal Ditambah!');
            }
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());  // Logging error details
            session()->setFlashdata('error', 'Terjadi kesalahan pada server!');
        }

        return redirect()->to('/daftar-soal'); // Redirect ke halaman daftar setelah insert
    }

    public function delete($id): RedirectResponse
    {
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }

        try {
            if ($this->modelSoal->delete($id)) {
                session()->setFlashdata('success', 'Data Berhasil Dihapus!');
            } else {
                throw new Exception('Gagal menghapus data.');
            }
        } catch (Exception $e) {
            session()->setFlashdata('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }

        return redirect()->to('/daftar-soal');
    }
}
