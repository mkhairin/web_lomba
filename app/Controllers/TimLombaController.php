<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TimLombaModel;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class TimLombaController extends BaseController
{
    protected $timLombaModel, $sekolahModel, $lombaModel, $pembimbingModel;

    public function __construct()
    {
        $timLombaModel = new TimLombaModel();
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/login')->with('error', 'You must be an admin to access this page.');
        }
    }

    public function daftarTimLomba()
    {
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/login')->with('error', 'You must be an admin to access this page.');
        }

        $timLombaModel = new \App\Models\TimLombaModel();
        $sekolahModel = new \App\Models\SekolahModel();
        $lombaModel = new \App\Models\LombaModel();
        $pembimbingModel = new \App\Models\PembimbingModel();

        $header['title'] = 'Daftar Tim Lomba';
        $data['dataTimLomba'] = $timLombaModel->getdata();
        $data['dataSekolah'] = $sekolahModel->getdata();
        $data['dataLomba'] = $lombaModel->getdata();
        $data['dataPembimbing'] = $pembimbingModel->getdata();
        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('admin/daftar_timlomba', $data);
        echo view('partial/footer');
    }

    public function insert(): RedirectResponse
    {
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/login')->with('error', 'You must be an admin to access this page.');
        }

        // Instansiasi model TimLombaModel
        $timLombaModel = new \App\Models\TimLombaModel();

        // Aturan validasi
        $validationRules = [
            'id_sekolah' => 'required|integer',
            'id_lomba' => 'required|integer',
            'id_pembimbing' => 'required|integer',
            'nama_tim' => 'required|string|max_length[100]',
            'ketua_tim' => 'required|string|max_length[100]',
            'anggota' => 'required|string|max_length[100]',
            'no_ketua' => 'required'
        ];

        // Jika validasi gagal, kembalikan ke halaman sebelumnya dengan input dan pesan validasi
        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        // Tangani proses insert data
        try {
            // Mengamankan data input menggunakan esc() dan memvalidasi input sebelum digunakan
            $data = [
                'id_sekolah' => esc($this->request->getPost('id_sekolah')),
                'id_lomba' => esc($this->request->getPost('id_lomba')),
                'id_pembimbing' => esc($this->request->getPost('id_pembimbing')),
                'nama_tim' => esc($this->request->getPost('nama_tim')),
                'ketua_tim' => esc($this->request->getPost('ketua_tim')),
                'anggota' => esc($this->request->getPost('anggota')),
                'no_ketua' => esc($this->request->getPost('no_ketua')),
            ];

            // Masukkan data ke database dan cek keberhasilannya
            if ($timLombaModel->insert($data)) {
                session()->setFlashdata('success', 'Data Berhasil Ditambah!');
            } else {
                throw new \RuntimeException('Data gagal ditambah.');
            }
        } catch (\Exception $e) {
            // Penanganan error dan mengembalikan pesan kesalahan
            session()->setFlashdata('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }

        // Jika berhasil, redirect ke halaman tim-lomba
        return redirect()->to('/tim-lomba');
    }


    public function update($id): RedirectResponse
    {
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/login')->with('error', 'You must be an admin to access this page.');
        }

        // Instansiasi model TimLombaModel
        $timLombaModel = new \App\Models\TimLombaModel();

        // Aturan validasi input
        $validationRules = [
            'id_sekolah' => 'required|integer',
            'id_lomba' => 'required|integer',
            'id_pembimbing' => 'required|integer',
            'nama_tim' => 'required|string|max_length[100]',
            'ketua_tim' => 'required|string|max_length[100]',
            'anggota' => 'required|string|max_length[100]',
            'no_ketua' => 'required'
        ];

        // Jika validasi gagal, kembalikan ke halaman sebelumnya dengan input dan pesan validasi
        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        // Proses update data
        try {
            // Mengamankan data input menggunakan esc() dan memvalidasi input
            $data = [
                'id_sekolah' => esc($this->request->getPost('id_sekolah')),
                'id_lomba' => esc($this->request->getPost('id_lomba')),
                'id_pembimbing' => esc($this->request->getPost('id_pembimbing')),
                'nama_tim' => esc($this->request->getPost('nama_tim')),
                'ketua_tim' => esc($this->request->getPost('ketua_tim')),
                'anggota' => esc($this->request->getPost('anggota')),
                'no_ketua' => esc($this->request->getPost('no_ketua')),
            ];

            // Cek apakah data berhasil diupdate
            if ($timLombaModel->update($id, $data)) {
                session()->setFlashdata('success', 'Data Berhasil Diubah!');
            } else {
                throw new \RuntimeException('Data gagal diubah.');
            }
        } catch (\Exception $e) {
            // Penanganan error dan menampilkan pesan kesalahan
            session()->setFlashdata('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }

        // Redirect ke halaman tim-lomba jika berhasil
        return redirect()->to('/tim-lomba');
    }


    public function delete($id): ResponseInterface
    {
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/login')->with('error', 'You must be an admin to access this page.');
        }

        // Instansiasi model TimLombaModel
        $timLombaModel = new \App\Models\TimLombaModel();

        try {
            // Periksa apakah ID valid dan data berhasil dihapus
            if ($timLombaModel->find($id)) {
                if ($timLombaModel->delete($id)) {
                    session()->setFlashdata('success', 'Data Berhasil Dihapus!');
                } else {
                    throw new \RuntimeException('Gagal menghapus data.');
                }
            } else {
                throw new \RuntimeException('Data tidak ditemukan.');
            }
        } catch (\Exception $e) {
            // Penanganan error dan menampilkan pesan kesalahan
            session()->setFlashdata('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }

        // Redirect ke halaman tim-lomba setelah operasi selesai
        return redirect()->to('/tim-lomba');
    }
}
