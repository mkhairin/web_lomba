<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LombaModel;
use CodeIgniter\HTTP\RedirectResponse;
use Exception;

class LombaController extends BaseController
{
    protected $lombaModel;

    public function __construct()
    {
        $this->lombaModel = new LombaModel();
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/login')->with('error', 'You must be an admin to access this page.');
        }
    }

    public function lombaView()
    {
       // Check if user is admin
       $session = session();
       if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
           return redirect()->to('/login')->with('error', 'You must be an admin to access this page.');
       }
    
        try {
            // Ambil data lomba dari model
            $data['dataLomba'] = $this->lombaModel->getdata();
            $header['title'] = 'Daftar Lomba';
    
            // Load views
            echo view('partial/header', $header);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('admin/daftar_lomba', $data);
            echo view('partial/footer');
    
        } catch (Exception $e) {
            // Set error jika terjadi masalah
            session()->setFlashdata('error', 'Gagal memuat data lomba: ' . $e->getMessage());
            return redirect()->back();
        }
    
        return '';
    }
    

    public function insert(): RedirectResponse
    {
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/login')->with('error', 'You must be an admin to access this page.');
        }

        // Aturan validasi
        $validationRules = [
            'nama' => 'required',
            'deskripsi' => 'required',
            'peraturan' => 'required',
            'link_peraturan' => 'required',
            'link_pendaftaran' => 'required',
            'tgl_dibuka' => 'required',
            'tgl_ditutup' => 'required',
            'status' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        try {
            $data = [
                'nama' => esc($this->request->getPost('nama')),
                'deskripsi' => esc($this->request->getPost('deskripsi')),
                'peraturan' => esc($this->request->getPost('peraturan')),
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
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/login')->with('error', 'You must be an admin to access this page.');
        }

        $validationRules = [
            'nama' => 'required',
            'deskripsi' => 'required',
            'peraturan' => 'required',
            'link_peraturan' => 'required',
            'link_pendaftaran' => 'required',
            'tgl_dibuka' => 'required',
            'tgl_ditutup' => 'required',
            'status' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        try {
            $data = [
                'nama' => esc($this->request->getPost('nama')),
                'deskripsi' => esc($this->request->getPost('deskripsi')),
                'peraturan' => esc($this->request->getPost('peraturan')),
                'link_peraturan' => esc($this->request->getPost('link_peraturan')),
                'link_pendaftaran' => esc($this->request->getPost('link_pendaftaran')),
                'tgl_dibuka' => esc($this->request->getPost('tgl_dibuka')),
                'tgl_ditutup' => esc($this->request->getPost('tgl_ditutup')),
                'status' => esc($this->request->getPost('status')),
            ];

            if ($this->lombaModel->updateData($id, $data)) {
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
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/login')->with('error', 'You must be an admin to access this page.');
        }

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
