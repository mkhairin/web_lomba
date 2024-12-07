<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\I18n\Time;
use DateTime;
use DateTimeZone;
use Exception;


class DeadlineController extends BaseController
{
    protected $deadlineSoalModel;

    public function __construct()
    {
        $this->deadlineSoalModel = new \App\Models\DeadlineTugasModel();

        // Check if user is juri
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'juri') {
            return redirect()->to('/login')->with('error', 'You must be an juri to access this page.');
        }
    }

    public function insert(): ResponseInterface
    {
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'juri') {
            return redirect()->to('/login')->with('error', 'You must be an juri to access this page.');
        }

        // Aturan validasi
        $validation = \Config\Services::validation();
        $validation->setRules([
            'id_lomba' => 'required',
            'deskripsi' => 'required',
            'deadline' => 'required',
        ]);

        // Cek validasi input
        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        try {
            // Data yang akan di-insert
            $data = [
                'id_lomba' => esc($this->request->getPost('id_lomba')),
                'deskripsi' => esc($this->request->getPost('deskripsi')),
                'deadline' => esc($this->request->getPost('deadline')),
            ];

            if ($this->deadlineSoalModel->insert($data)) {
                session()->setFlashdata('success', 'Data Berhasil Ditambah!');
            } else {
                throw new Exception('Gagal menambahkan data.');
            }
        } catch (Exception $e) {
            session()->setFlashdata('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }

        return redirect()->to('/juri-dashboard/daftar-deadline');
    }

    public function update($id): ResponseInterface
    {
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'juri') {
            return redirect()->to('/login')->with('error', 'You must be an juri to access this page.');
        }

        // Aturan validasi
        $validation = \Config\Services::validation();
        $validation->setRules([
            'id_lomba' => 'required',
            'deskripsi' => 'required',
            'deadline' => 'required',
        ]);

        // Cek validasi input
        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        try {
            // Data yang akan di-insert
            $data = [
                'id_lomba' => esc($this->request->getPost('id_lomba')),
                'deskripsi' => esc($this->request->getPost('deskripsi')),
                'deadline' => esc($this->request->getPost('deadline')),
            ];

            if ($this->deadlineSoalModel->update($id, $data)) {
                session()->setFlashdata('success', 'Data Berhasil diubah!');
            } else {
                throw new Exception('Gagal menambahkan diubah.');
            }
        } catch (Exception $e) {
            session()->setFlashdata('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }

        return redirect()->to('/juri-dashboard/daftar-deadline');
    }

    public function delete($id): RedirectResponse
    {
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'juri') {
            return redirect()->to('/login')->with('error', 'You must be an juri to access this page.');
        }

        try {
            if ($this->deadlineSoalModel->delete($id)) {
                session()->setFlashdata('success', 'Data berhasil dihapus!');
            } else {
                throw new Exception('Gagal menghapus data.');
            }
        } catch (Exception $e) {
            session()->setFlashdata('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }

        return redirect()->to('/juri-dashboard/daftar-deadline');
    }
}
