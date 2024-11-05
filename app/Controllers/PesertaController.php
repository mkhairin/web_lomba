<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class PesertaController extends BaseController
{
    public function daftarPeserta()
    {
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }

        $ModelPeserta = new \App\Models\PesertaModel();
        $ModelLomba = new \App\Models\LombaModel();
        $ModelPembimbing = new \App\Models\PembimbingModel();
        $ModelSekolah = new \App\Models\SekolahModel();
        $ModelTimLomba = new \App\Models\TimLombaModel();

        $data['dataPeserta'] = $ModelPeserta->getdata();
        $data['dataLomba'] = $ModelLomba->getdata();
        $data['dataPembimbing'] = $ModelPembimbing->getdata();
        $data['dataSekolah'] = $ModelSekolah->getdata();
        $data['dataTimLomba'] = $ModelTimLomba->getdata();

        $header['title'] = 'Daftar Peserta';

        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('admin/daftar_peserta', $data);
        echo view('partial/footer');
    }

    public function insert()
    {
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }

        // Aturan validasi
        $validation = \Config\Services::validation();
        $validation->setRules([
            'id_lomba' => 'required|integer',
            'id_pembimbing' => 'required|integer',
            'id_sekolah' => 'required|integer',
            'id_tim_lomba' => 'required|integer',
            'nama_peserta' => 'required|alpha_space',
            'no_handphone' => 'required|integer',
        ]);

        // Cek validasi input
        if (!$this->validate($validation->getRules())) {
            // Jika validasi gagal, simpan pesan error ke flashdata
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        // Menggunakan getPost dengan filter dan validasi ekstra
        $id_lomba = $this->request->getPost('id_lomba', FILTER_SANITIZE_NUMBER_INT);
        $id_pembimbing = $this->request->getPost('id_pembimbing', FILTER_SANITIZE_NUMBER_INT);
        $id_sekolah = $this->request->getPost('id_sekolah', FILTER_SANITIZE_NUMBER_INT);
        $id_tim_lomba = $this->request->getPost('id_tim_lomba', FILTER_SANITIZE_NUMBER_INT);
        $nama_peserta = $this->request->getPost('nama_peserta', FILTER_SANITIZE_STRING);
        $no_handphone = $this->request->getPost('no_handphone', FILTER_SANITIZE_STRING);

        // Jika validasi berhasil, lanjutkan ke insert data
        $pesertaModel = new \App\Models\PesertaModel();
        $data = [
            'id_lomba' => $id_lomba,
            'id_pembimbing' => $id_pembimbing,
            'id_sekolah' => $id_sekolah,
            'id_tim_lomba' => $id_tim_lomba,
            'nama_peserta' => htmlspecialchars($nama_peserta, ENT_QUOTES, 'UTF-8'), // XSS protection
            'no_handphone' => htmlspecialchars($no_handphone, ENT_QUOTES, 'UTF-8') // XSS protection
        ];

        // Insert data dengan prepared statements (CodeIgniter menggunakan ini secara default)
        if ($pesertaModel->insert($data)) {
            session()->setFlashdata('success', 'Data Berhasil Ditambah!');
            return redirect()->to('/daftar-peserta');
        } else {
            session()->setFlashdata('error', 'Data Gagal Ditambah!');
            return redirect()->back()->withInput();
        }
    }

    public function update($id)
    {
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }

        // Aturan validasi
        $validation = \Config\Services::validation();
        $validation->setRules([
            'id_lomba' => 'required|integer',
            'id_pembimbing' => 'required|integer',
            'id_sekolah' => 'required|integer',
            'id_tim_lomba' => 'required|integer',
            'nama_peserta' => 'required|alpha_space',
            'no_handphone' => 'required|integer',
        ]);

        // Cek validasi input
        if (!$this->validate($validation->getRules())) {
            // Jika validasi gagal, simpan pesan error ke flashdata
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        // Menggunakan getPost dengan filter untuk memastikan data lebih aman
        $id_lomba = $this->request->getPost('id_lomba', FILTER_SANITIZE_NUMBER_INT);
        $id_pembimbing = $this->request->getPost('id_pembimbing', FILTER_SANITIZE_NUMBER_INT);
        $id_sekolah = $this->request->getPost('id_sekolah', FILTER_SANITIZE_NUMBER_INT);
        $id_tim_lomba = $this->request->getPost('id_tim_lomba', FILTER_SANITIZE_NUMBER_INT);
        $nama_peserta = $this->request->getPost('nama_peserta', FILTER_SANITIZE_STRING);
        $no_handphone = $this->request->getPost('no_handphone', FILTER_SANITIZE_STRING);

        // Jika validasi berhasil, lanjutkan ke update data
        $pesertaModel = new \App\Models\PesertaModel();
        $data = [
            'id_lomba' => $id_lomba,
            'id_pembimbing' => $id_pembimbing,
            'id_sekolah' => $id_sekolah,
            'id_tim_lomba' => $id_tim_lomba,
            'nama_peserta' => htmlspecialchars($nama_peserta, ENT_QUOTES, 'UTF-8'), // XSS protection
            'no_handphone' => htmlspecialchars($no_handphone, ENT_QUOTES, 'UTF-8') // XSS protection
        ];

        // Update data dengan prepared statements
        if ($pesertaModel->update($id, $data)) {
            session()->setFlashdata('success', 'Data Berhasil Diubah!');
            return redirect()->to('/daftar-peserta');
        } else {
            session()->setFlashdata('error', 'Data Gagal Diubah!');
            return redirect()->back()->withInput();
        }
    }


    public function delete($id)
    {
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }

        // Pastikan model diinstansiasi dengan benar
        $pesertaModel = new \App\Models\PesertaModel();

        // Sanitasi ID yang diterima untuk menghindari input berbahaya
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

        // Cek apakah data peserta dengan ID tersebut ada
        $dataPeserta = $pesertaModel->find($id);
        if ($dataPeserta) {
            // Jika data ditemukan, hapus data dengan prepared statement
            if ($pesertaModel->delete($id)) {
                session()->setFlashdata('success', 'Data Berhasil Dihapus!');
            } else {
                session()->setFlashdata('error', 'Data Gagal Dihapus!');
            }
        } else {
            session()->setFlashdata('error', 'Data Tidak Ditemukan!');
        }

        // Redirect kembali ke halaman daftar peserta
        return redirect()->to('/daftar-peserta');
    }
}
