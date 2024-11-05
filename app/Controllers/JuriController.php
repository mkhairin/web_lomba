<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\RedirectResponse;

class JuriController extends BaseController
{
    protected $submitTugasModel;

    public function __construct()
    {
        // Inisialisasi model
        $this->submitTugasModel = new \App\Models\SubmitTugasModel();

        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'juri') {
            return redirect()->to('/login')->with('error', 'You must be an juri to access this page.');
        }
    }

    public function dashboardJuri()
    {
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'juri') {
            return redirect()->to('/login')->with('error', 'You must be an juri to access this page.');
        }

        $kategoriLomba = $session->get('lomba');
        $data['dataUsername'] = $session->get('username');
        $data['dataSubmitTugas'] = $this->submitTugasModel->getDataWhere($kategoriLomba);

        $header['title'] = 'Dashboard Juri';
        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('juri/side_menu', $data);
        echo view('juri/juri_dashboard', $data);
        echo view('partial/footer');
    }

    public function daftarDinilai()
    {
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'juri') {
            return redirect()->to('/login')->with('error', 'You must be an juri to access this page.');
        }

        $kategoriLomba = $session->get('lomba');
        $data['dataUsername'] = $session->get('username');
        $data['dataSubmitTugas'] = $this->submitTugasModel->getDataAfterWhere($kategoriLomba);

        $header['title'] = 'Dashboard Juri';
        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('juri/side_menu', $data);
        echo view('juri/daftar_dinilai', $data);
        echo view('partial/footer');
    }


    public function update($id): RedirectResponse
    {
        // Proses update data
        try {
            // Mengamankan data input menggunakan esc() dan memvalidasi input
            $data = [
                'status_penilaian' => esc($this->request->getPost('status_penilaian')),
            ];

            // Cek apakah data berhasil diupdate
            if ($this->submitTugasModel->update($id, $data)) {
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
        return redirect()->to('/juri-dashboard');
    }
}
