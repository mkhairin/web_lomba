<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JuaraModel;
use App\Models\SubmitTugasModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\RedirectResponse;

class JuaraController extends BaseController
{
    protected $juaraModel;
    protected $submitTugasModel;
    protected $emailModel;

    public function __construct()
    {
        // Initialize models
        $this->submitTugasModel = new SubmitTugasModel();
        $this->juaraModel = new JuaraModel();
        $this->emailModel = new \App\Models\MailModel();

        // Ensure the user is logged in as admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }
    }

    public function juaraView(): ResponseInterface
    {
        // Ensure the user is logged in as admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }

        $header['title'] = 'Daftar Juara';

        // Fetch data
        $data['dataSubmit'] = count($this->submitTugasModel->getDataSubmit());
        $data['dataIsNotSubmit'] = count($this->submitTugasModel->getDataNotSubmit());
        $data['dataJuara'] = $this->juaraModel->getdata();
        $data['unreadEmailCount'] = $this->emailModel->where('read_status', 'unread')->countAllResults();

        // Render view
        echo view('azia/header', $header);
        echo view('azia/top_menu', $data);
        echo view('azia/side_menu', $data);
        echo view('admin/daftar_juara', $data);
        echo view('azia/footer');

        return $this->response;
    }

    public function insert(): RedirectResponse
    {
        // Ensure the user is logged in as admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }

        // Validate form inputs
        $validation = \Config\Services::validation();
        $validation->setRules([
            'juara' => 'required|min_length[1]|max_length[50]',
            'total_hadiah' => 'required|numeric'
        ]);

        // If validation fails, return with validation errors
        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        // Prepare data for insertion
        $data = [
            'id_juara' => esc($this->request->getPost('id')),
            'juara' => esc($this->request->getPost('juara')),
            'total_hadiah' => esc($this->request->getPost('total_hadiah'))
        ];

        try {
            // Insert data into the database
            if ($this->juaraModel->insert($data)) {
                session()->setFlashdata('success', 'Data Berhasil Ditambah!');
            } else {
                session()->setFlashdata('error', 'Data Gagal Ditambah!');
            }
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            session()->setFlashdata('error', 'Terjadi kesalahan pada server!');
        }

        return redirect()->to('/daftar-juara');
    }

    public function update($id): RedirectResponse
    {
        // Ensure the user is logged in as admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }

        // Validate form inputs
        $validation = \Config\Services::validation();
        $validation->setRules([
            'juara' => 'required|min_length[1]|max_length[50]',
            'total_hadiah' => 'required|numeric'
        ]);

        // If validation fails, return with validation errors
        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        // Prepare data for update
        $data = [
            'id_juara' => esc($this->request->getPost('id')),
            'juara' => esc($this->request->getPost('juara')),
            'total_hadiah' => esc($this->request->getPost('total_hadiah'))
        ];

        try {
            // Update data in the database
            if ($this->juaraModel->update($id, $data)) {
                session()->setFlashdata('success', 'Data Berhasil Diubah!');
            } else {
                session()->setFlashdata('error', 'Data Gagal Diubah!');
            }
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            session()->setFlashdata('error', 'Terjadi kesalahan pada server!');
        }

        return redirect()->to('/daftar-juara');
    }

    public function delete($id): RedirectResponse
    {
        // Ensure the user is logged in as admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }

        try {
            // Delete data from the database
            if ($this->juaraModel->delete($id)) {
                session()->setFlashdata('success', 'Data Berhasil Dihapus!');
            } else {
                session()->setFlashdata('error', 'Data Gagal Dihapus!');
            }
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            session()->setFlashdata('error', 'Terjadi kesalahan pada server!');
        }

        return redirect()->to('/daftar-juara');
    }
}
