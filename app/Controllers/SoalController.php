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
    protected $emailModel;

    public function __construct()
    {
        // Initialize models
        $this->submitTugasModel = new SubmitTugasModel();
        $this->modelLomba = new \App\Models\LombaModel();
        $this->modelSoal = new SoalModel();
        $this->emailModel = new \App\Models\MailModel();

        // Check if user is logged in and is an admin
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

        // Get data
        $data['dataLomba'] = $this->modelLomba->getdata();
        $data['dataSoal'] = $this->modelSoal->getdata();
        $data['dataSubmit'] = count($this->submitTugasModel->getDataSubmit());
        $data['dataIsNotSubmit'] = count($this->submitTugasModel->getDataNotSubmit());
        $data['unreadEmailCount'] = $this->emailModel->where('read_status', 'unread')->countAllResults();

        // Set header and render view
        $header['title'] = 'Daftar Soal';
        echo view('azia/header', $header);
        echo view('azia/top_menu', $data);
        echo view('azia/side_menu', $data);
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

        // Validation rules
        $validationRules = [
            'id_lomba' => 'required',
            'link_soal' => 'required'
        ];

        // Validate input
        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator->getErrors());
        }

        // Insert data
        $data = [
            'id_soal' => esc($this->request->getPost('id_soal')),
            'id_lomba' => esc($this->request->getPost('id_lomba')),
            'link_soal' => esc($this->request->getPost('link_soal'))
        ];

        try {
            if ($this->modelSoal->insert($data)) {
                session()->setFlashdata('success', 'Data Berhasil Ditambah!');
            } else {
                session()->setFlashdata('error', 'Data Gagal Ditambah!');
            }
        } catch (Exception $e) {
            log_message('error', $e->getMessage());  // Log error details
            session()->setFlashdata('error', 'Terjadi kesalahan pada server!');
        }

        return redirect()->to('/daftar-soal');
    }

    public function update($id)
    {
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }

        // Validation rules
        $validationRules = [
            'id_lomba' => 'required',
            'link_soal' => 'required'
        ];

        // Validate input
        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator->getErrors());
        }

        // Prepare data for update
        $data = [
            'id_soal' => esc($this->request->getPost('id_soal')),
            'id_lomba' => esc($this->request->getPost('id_lomba')),
            'link_soal' => esc($this->request->getPost('link_soal'))
        ];

        try {
            if ($this->modelSoal->update($id, $data)) {
                session()->setFlashdata('success', 'Data Berhasil Diubah!');
            } else {
                session()->setFlashdata('error', 'Data Gagal Diubah!');
            }
        } catch (Exception $e) {
            log_message('error', $e->getMessage());  // Log error details
            session()->setFlashdata('error', 'Terjadi kesalahan pada server!');
        }

        return redirect()->to('/daftar-soal');
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
                session()->setFlashdata('error', 'Data Gagal Dihapus!');
            }
        } catch (Exception $e) {
            log_message('error', $e->getMessage());  // Log error details
            session()->setFlashdata('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }

        return redirect()->to('/daftar-soal');
    }
}
