<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LombaModel;
use App\Models\SubmitTugasModel;
use CodeIgniter\HTTP\RedirectResponse;
use Exception;

class LombaController extends BaseController
{
    protected $lombaModel;
    protected $submitTugasModel;
    protected $emailModel;

    public function __construct()
    {
        $this->submitTugasModel = new SubmitTugasModel();
        $this->lombaModel = new LombaModel();
        $this->emailModel = new \App\Models\MailModel();
    }

    // Admin check method to avoid repetition
    private function checkAdminAccess()
    {
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }
    }

    public function lombaView()
    {
        $this->checkAdminAccess();

        try {
            $data['dataLomba'] = $this->lombaModel->getdata();
            $header['title'] = 'Daftar Lomba';

            $data['dataSubmit'] = count($this->submitTugasModel->getDataSubmit());
            $data['dataIsNotSubmit'] = count($this->submitTugasModel->getDataNotSubmit());
            $data['unreadEmailCount'] = $this->emailModel->where('read_status', 'unread')->countAllResults();

            echo view('azia/header', $header);
            echo view('azia/top_menu', $data);
            echo view('azia/side_menu', $data);
            echo view('admin/daftar_lomba', $data);
            echo view('azia/footer');
        } catch (Exception $e) {
            session()->setFlashdata('error', 'Gagal memuat data lomba: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function insert(): RedirectResponse
    {
        $this->checkAdminAccess();

        $validationRules = [
            'nama' => 'required',
            'deskripsi' => 'required',
            'link_peraturan' => 'required|valid_url',
            'link_pendaftaran' => 'required|valid_url',
            'tgl_dibuka' => 'required|valid_date[Y-m-d]',
            'tgl_ditutup' => 'required|valid_date[Y-m-d]',
            'status' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        try {
            $data = [
                'nama' => esc($this->request->getPost('nama')),
                'deskripsi' => esc($this->request->getPost('deskripsi')),
                'link_peraturan' => esc($this->request->getPost('link_peraturan')),
                'link_pendaftaran' => esc($this->request->getPost('link_pendaftaran')),
                'tgl_dibuka' => esc($this->request->getPost('tgl_dibuka')),
                'tgl_ditutup' => esc($this->request->getPost('tgl_ditutup')),
                'status' => esc($this->request->getPost('status')),
            ];

            if ($this->lombaModel->insert($data)) {
                session()->setFlashdata('success', 'Data Berhasil Ditambah!');
            } else {
                throw new Exception('Data gagal ditambah.');
            }
        } catch (Exception $e) {
            session()->setFlashdata('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }

        return redirect()->to('/daftar-lomba');
    }

    public function update($id): RedirectResponse
    {
        $this->checkAdminAccess();

        $validationRules = [
            'nama' => 'required',
            'deskripsi' => 'required',
            'link_peraturan' => 'required|valid_url',
            'link_pendaftaran' => 'required|valid_url',
            'tgl_dibuka' => 'required|valid_date[Y-m-d]',
            'tgl_ditutup' => 'required|valid_date[Y-m-d]',
            'status' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        try {
            $data = [
                'nama' => esc($this->request->getPost('nama')),
                'deskripsi' => esc($this->request->getPost('deskripsi')),
                'link_peraturan' => esc($this->request->getPost('link_peraturan')),
                'link_pendaftaran' => esc($this->request->getPost('link_pendaftaran')),
                'tgl_dibuka' => esc($this->request->getPost('tgl_dibuka')),
                'tgl_ditutup' => esc($this->request->getPost('tgl_ditutup')),
                'status' => esc($this->request->getPost('status')),
            ];

            if ($this->lombaModel->update($id, $data)) {
                session()->setFlashdata('success', 'Data Berhasil Diubah!');
            } else {
                throw new Exception('Data gagal diubah.');
            }
        } catch (Exception $e) {
            session()->setFlashdata('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }

        return redirect()->to('/daftar-lomba');
    }

    public function delete($id): RedirectResponse
    {
        $this->checkAdminAccess();

        try {
            $lomba = $this->lombaModel->find($id);

            if ($lomba) {
                $this->lombaModel->deleteData($id);
                session()->setFlashdata('success', 'Data Berhasil Dihapus!');
            } else {
                throw new Exception('Data tidak ditemukan.');
            }
        } catch (Exception $e) {
            session()->setFlashdata('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }

        return redirect()->to('/daftar-lomba');
    }
}
