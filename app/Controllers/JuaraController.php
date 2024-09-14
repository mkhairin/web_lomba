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
    }

    // juara methods
    public function juaraView(): ResponseInterface
    {
        $header['title'] = 'Daftar Juara';
        $data['dataJuara'] = $this->juaraModel->getdata();
        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('daftar_juara', $data);
        echo view('partial/footer');
        return $this->response;
    }

    public function insert(): RedirectResponse
    {
        // CSRF Protection is enabled by default in CodeIgniter 4
        
        // Aturan validasi
        $validation = \Config\Services::validation();
        $validation->setRules([
            'juara' => 'required|min_length[1]|max_length[50]',
            'total_hadiah' => 'required|numeric'
        ]);

        // Cek validasi input
        if (!$this->validate($validation->getRules())) {
            // Jika validasi gagal, simpan pesan error ke flashdata
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        // Jika validasi berhasil, lanjutkan ke insert data
        $data = [
            'id_juara' => esc($this->request->getPost('id')),  // Escaping input
            'juara' => esc($this->request->getPost('juara')),
            'total_hadiah' => esc($this->request->getPost('total_hadiah'))
        ];

        try {
            if ($this->juaraModel->insert($data)) {  // Gunakan insert() bawaan CodeIgniter
                session()->setFlashdata('success', 'Data Berhasil Ditambah!');
            } else {
                session()->setFlashdata('error', 'Data Gagal Ditambah!');
            }
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());  // Log error details
            session()->setFlashdata('error', 'Terjadi kesalahan pada server!');
        }

        return redirect()->to('/daftar-juara');
    }

    public function update($id): RedirectResponse
    {
        // Aturan validasi
        $validation = \Config\Services::validation();
        $validation->setRules([
            'juara' => 'required|min_length[1]|max_length[50]',
            'total_hadiah' => 'required|numeric'
        ]);

        // Cek validasi input
        if (!$this->validate($validation->getRules())) {
            // Jika validasi gagal, simpan pesan error ke flashdata
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        // Jika validasi berhasil, lanjutkan ke update data
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
            log_message('error', $e->getMessage());  // Log error details
            session()->setFlashdata('error', 'Terjadi kesalahan pada server!');
        }

        return redirect()->to('/daftar-juara');
    }

    public function delete($id): RedirectResponse
    {
        try {
            if ($this->juaraModel->delete($id)) {
                session()->setFlashdata('success', 'Data Berhasil Dihapus!');
            } else {
                session()->setFlashdata('error', 'Data Gagal Dihapus!');
            }
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());  // Log error details
            session()->setFlashdata('error', 'Terjadi kesalahan pada server!');
        }

        return redirect()->to('/daftar-juara');
    }
}
