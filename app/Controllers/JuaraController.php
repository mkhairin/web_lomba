<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JuaraModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\RedirectResponse;

class JuaraController extends BaseController
{
    protected $juaraModel;

    public function __construct()
    {
        $this->juaraModel = new JuaraModel();

        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }
    }

    public function juaraView(): ResponseInterface
    {
        // Check admin access again if needed
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }

        $header['title'] = 'Daftar Juara';
        $data['dataJuara'] = $this->juaraModel->getdata();
        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('admin/daftar_juara', $data);
        echo view('partial/footer');
        return $this->response;
    }

    public function insert(): RedirectResponse
    {
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }

        $validation = \Config\Services::validation();
        $validation->setRules([
            'juara' => 'required|min_length[1]|max_length[50]',
            'total_hadiah' => 'required|numeric'
        ]);

        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $data = [
            'id_juara' => esc($this->request->getPost('id')),
            'juara' => esc($this->request->getPost('juara')),
            'total_hadiah' => esc($this->request->getPost('total_hadiah'))
        ];

        try {
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
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }

        $validation = \Config\Services::validation();
        $validation->setRules([
            'juara' => 'required|min_length[1]|max_length[50]',
            'total_hadiah' => 'required|numeric'
        ]);

        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $data = [
            'id_juara' => esc($this->request->getPost('id')),
            'juara' => esc($this->request->getPost('juara')),
            'total_hadiah' => esc($this->request->getPost('total_hadiah'))
        ];

        try {
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
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }

        try {
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
