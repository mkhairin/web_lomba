<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\I18n\Time;
use DateTime;
use DateTimeZone;

class JuriController extends BaseController
{
    protected $submitTugasModel;
    protected $timLolosNew;
    protected $tanggalLengkap;
    protected $jamSekarang;
    protected $lombaModel;

    public function __construct()
    {
        // Inisialisasi model
        $this->submitTugasModel = new \App\Models\SubmitTugasModel();
        $this->timLolosNew = new \App\Models\TimLolosJuriModel();
        $this->lombaModel = new \App\Models\LombaModel();

        // Check if user is juri
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'juri') {
            return redirect()->to('/login')->with('error', 'You must be an juri to access this page.');
        }

        // Get the current date and time in WITA
        $date = new DateTime('now', new DateTimeZone('Asia/Makassar')); // WITA timezone (UTC+8)
        $tanggal = $date->format('d');
        $bulan = $date->format('n');
        $tahun = $date->format('Y');
        $hari = $date->format('l');
        $this->jamSekarang = $date->format('H:i:s') . ' WITA';

        // Array for month names in Indonesian
        $namaBulan = [
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];

        // Array for day names in Indonesian
        $namaHari = [
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
        ];

        // Format date in "Hari, dd Bulan yyyy, HH:mm:ss" format
        $this->tanggalLengkap = $namaHari[$hari] . ', ' . $tanggal . ' ' . $namaBulan[$bulan] . ' ' . $tahun;
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
        $data['tanggalLengkap'] = $this->tanggalLengkap;
        $data['jamSekarang'] = $this->jamSekarang;

        $header['title'] = 'Dashboard Juri';
        echo view('juri/header', $header);
        echo view('juri/top_menu');
        echo view('juri/side_menu');
        echo view('juri/juri_dashboard', $data);
        echo view('juri/footer');
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
        $data['tanggalLengkap'] = $this->tanggalLengkap;
        $data['jamSekarang'] = $this->jamSekarang;

        $header['title'] = 'Dashboard Juri';
        echo view('juri/header', $header);
        echo view('juri/top_menu');
        echo view('juri/side_menu');
        echo view('juri/daftar_dinilai', $data);
        echo view('juri/footer');
    }

    public function daftarTimLomba()
    {
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'juri') {
            return redirect()->to('/login')->with('error', 'You must be an juri to access this page.');
        }

        $timLombaModel = new \App\Models\TimLombaModel();
        $kategoriLomba = $session->get('lomba');
        $data['dataUsername'] = $session->get('username');
        $data['dataSubmitTugas'] = $this->submitTugasModel->getDataAfterWhere($kategoriLomba);
        $data['tanggalLengkap'] = $this->tanggalLengkap;
        $data['jamSekarang'] = $this->jamSekarang;
        $data['dataTimLomba'] = $timLombaModel->getDataWhere($kategoriLomba);


        $header['title'] = 'Dashboard Juri';
        echo view('juri/header', $header);
        echo view('juri/top_menu');
        echo view('juri/side_menu');
        echo view('juri/tim_lomba', $data);
        echo view('juri/footer');
    }

    public function dashboardTimLolos()
    {
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'juri') {
            return redirect()->to('/login')->with('error', 'You must be an juri to access this page.');
        }

        $kategoriLomba = $session->get('lomba');
        $data['dataUsername'] = $session->get('username');
        $data['dataSubmitTugas'] = $this->submitTugasModel->getDataAfterWhere($kategoriLomba);
        $data['dataTimLolosNew'] = $this->timLolosNew->getDataWhere($kategoriLomba);
        $data['tanggalLengkap'] = $this->tanggalLengkap;
        $data['jamSekarang'] = $this->jamSekarang;

        $header['title'] = 'Dashboard Juri';
        echo view('juri/header', $header);
        echo view('juri/top_menu');
        echo view('juri/side_menu');
        echo view('juri/tim_lolos', $data);
        echo view('juri/footer');
    }

    public function daftarDeadline()
    {
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'juri') {
            return redirect()->to('/login')->with('error', 'You must be an juri to access this page.');
        }

        $data['dataLomba'] = $this->lombaModel->getdata();

        $header['title'] = 'Dashboard Juri';
        echo view('juri/header', $header);
        echo view('juri/top_menu');
        echo view('juri/side_menu');
        echo view('juri/daftar_deadline', $data);
        echo view('juri/footer');
    }


    public function update($id): RedirectResponse
    {
        // Proses update data
        try {
            // Mengamankan data input menggunakan esc() dan memvalidasi input
            $data = [
                'status_penilaian' => esc($this->request->getPost('status_penilaian')),
                'skor_nilai' => esc($this->request->getPost('skor_nilai')),
                'feedback' => esc($this->request->getPost('feedback'))
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
