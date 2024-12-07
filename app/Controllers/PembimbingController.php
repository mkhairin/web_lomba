<?php

namespace App\Controllers;

use App\Models\SubmitTugasModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class PembimbingController extends BaseController
{
    protected $modelPembimbing;
    protected $modelSekolah;
    protected $modelLomba;
    protected $submitTugasModel;

    public function __construct()
    {
        // untuk dashboard admin
        $this->submitTugasModel = new SubmitTugasModel();

        // Inisialisasi model
        $this->modelPembimbing = new \App\Models\PembimbingModel();
        $this->modelSekolah = new \App\Models\SekolahModel();
        $this->modelLomba = new \App\Models\LombaModel();

        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }
    }

    // Method daftar pembimbing
    public function pembimbingView()
    {
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }

        $data['dataPembimbing'] = $this->modelPembimbing->getdata();
        $data['dataSekolah'] = $this->modelSekolah->getdata();
        $data['dataLomba'] = $this->modelLomba->getdata();

        $data['dataSubmit'] = count($this->submitTugasModel->getDataSubmit());
        $data['dataIsNotSubmit'] = count($this->submitTugasModel->getDataNotSubmit());


        $header['title'] = 'Daftar Pembimbing';

        echo view('azia/header', $header);
        echo view('azia/top_menu');
        echo view('azia/side_menu');
        echo view('admin/daftar_pembimbing', $data);
        echo view('azia/footer');
    }

    // Method insert pembimbing
    public function insert(): ResponseInterface
    {
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }


        // Aturan validasi
        $validation = \Config\Services::validation();
        $validation->setRules([
            'id_sekolah' => 'required',
            'id_lomba' => 'required',
            'nama_pembimbing' => 'required',
            'no_handphone' => 'required',
        ]);

        // Cek validasi input
        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        try {
            // Data yang akan di-insert
            $data = [
                'id_sekolah' => esc($this->request->getPost('id_sekolah')),
                'id_lomba' => esc($this->request->getPost('id_lomba')),
                'nama_pembimbing' => esc($this->request->getPost('nama_pembimbing')),
                'no_handphone' => esc($this->request->getPost('no_handphone')),
            ];

            if ($this->modelPembimbing->insert($data)) {
                session()->setFlashdata('success', 'Data Berhasil Ditambah!');
            } else {
                throw new Exception('Gagal menambahkan data.');
            }
        } catch (Exception $e) {
            session()->setFlashdata('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }

        return redirect()->to('/daftar-pembimbing');
    }

    // Method update pembimbing
    public function update($id): ResponseInterface
    {
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }

        // Aturan validasi
        $validation = \Config\Services::validation();
        $validation->setRules([
            'id_sekolah' => 'required|numeric',
            'nama_pembimbing' => 'required|min_length[3]|max_length[100]',
            'lomba' => 'required|min_length[3]|max_length[100]'
        ]);

        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        try {
            // Data yang akan di-update
            $data = [
                'id_sekolah' => esc($this->request->getPost('id_sekolah')),
                'nama_pembimbing' => esc($this->request->getPost('nama_pembimbing')),
                'lomba' => esc($this->request->getPost('lomba'))
            ];

            if ($this->modelPembimbing->update($id, $data)) {
                session()->setFlashdata('success', 'Data Berhasil Diubah!');
            } else {
                throw new Exception('Gagal mengubah data.');
            }
        } catch (Exception $e) {
            session()->setFlashdata('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }

        return redirect()->to('/daftar-pembimbing');
    }

    // Method delete pembimbing
    public function delete($id): ResponseInterface
    {
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }


        try {
            // Cek apakah data ada
            $pembimbing = $this->modelPembimbing->find($id);
            if (!$pembimbing) {
                throw new Exception('Data tidak ditemukan.');
            }

            if ($this->modelPembimbing->delete($id)) {
                session()->setFlashdata('success', 'Data Berhasil Dihapus!');
            } else {
                throw new Exception('Gagal menghapus data.');
            }
        } catch (Exception $e) {
            session()->setFlashdata('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }

        return redirect()->to('/daftar-pembimbing');
    }
}
