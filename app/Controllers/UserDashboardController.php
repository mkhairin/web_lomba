<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;
use DateTime;
use DateTimeZone;

class UserDashboardController extends BaseController
{
    protected $timLolosModel;
    protected $timLombaModel;
    protected $sekolahModel;
    protected $lombaModel;
    protected $pembimbingModel;
    protected $pesertaModel;
    protected $soalModel;
    protected $userModel;
    protected $submitTugasModel;
    protected $timLolosJuri;
    protected $deadlineTugasModel;

    public function __construct()
    {
        // Inisialisasi model di constructor
        $this->timLolosModel = new \App\Models\TimLolosModel();
        $this->timLombaModel = new \App\Models\TimLombaModel();
        $this->sekolahModel = new \App\Models\SekolahModel();
        $this->lombaModel = new \App\Models\LombaModel();
        $this->pembimbingModel = new \App\Models\PembimbingModel();
        $this->pesertaModel = new \App\Models\PesertaModel();
        $this->soalModel = new \App\Models\SoalModel();
        $this->userModel = new \App\Models\UsersModel();
        $this->submitTugasModel = new \App\Models\SubmitTugasModel();
        $this->timLolosJuri = new \App\Models\TimLolosJuriModel();
        $this->deadlineTugasModel = new \App\Models\DeadlineTugasModel();
    }

    public function dashboarduser()
    {
        $session = session();

        // Cek apakah user sudah login dan memiliki role 'user'
        if (!$session->get('logged_in') || $session->get('role') !== 'user') {
            return redirect()->to('/login')->with('error', 'You must be a user to access this page.');
        }

        // Ambil informasi sesi
        $kategoriLomba = $session->get('lomba');
        $username = $session->get('username');
        $namaTimLomba = $session->get('tim_lomba');

        // Get the current date and time in WITA
        $date = new DateTime('now', new DateTimeZone('Asia/Makassar')); // WITA timezone (UTC+8)
        $tanggal = $date->format('d');
        $bulan = $date->format('n');
        $tahun = $date->format('Y');
        $hari = $date->format('l');
        $jam = $date->format('H:i:s');

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

        // Format tanggal lengkap
        $tanggalLengkap = $namaHari[$hari] . ', ' . $tanggal . ' ' . $namaBulan[$bulan] . ' ' . $tahun;

        // Ambil data berdasarkan kategori lomba dan nama tim yang sesuai
        $data['dataSoal'] = $this->soalModel->getDataWhere($kategoriLomba); // Data soal sesuai kategori
        $data['dataUser'] = $this->userModel->getDataWhere($username); // Data user login
        $data['dataKategori'] = $this->lombaModel->getDataWhere($kategoriLomba); // Detail kategori lomba
        $data['dataTimLombaNama'] = $this->timLombaModel->getDataWhereTeam($kategoriLomba, $namaTimLomba); // Data tim sesuai nama tim
        $data['dataTimLomba'] = $this->timLombaModel->getDataWhereTeam($kategoriLomba, $namaTimLomba);
        $data['dataSubmitTugasTim'] = $this->submitTugasModel->getDataWhereTeam($kategoriLomba, $namaTimLomba);
        $data['dataSubmitTugas'] = $this->submitTugasModel->getDataWhere($kategoriLomba); // Data tugas berdasarkan kategori
        $data['daftarTimSelesai'] = $this->submitTugasModel->getData($kategoriLomba); // Daftar tim yang selesai
        $data['daftarTimSelesaiWhere'] = $this->submitTugasModel->getDataWhereTeam($kategoriLomba, $namaTimLomba);
        $data['dataTimDinilai'] = $this->submitTugasModel->getDataWhereTeamPenilaian($kategoriLomba, $namaTimLomba);<? // Data tim yang sudah dinilai
        $data['dataTimLolos'] = $this->timLolosJuri->getDataWhere($kategoriLomba); // Tim yang lolos
        $data['dataTimLolosTim'] = $this->timLolosJuri->getDataWhereTim($kategoriLomba, $namaTimLomba);
        $data['dataDeadlineLomba'] = $this->deadlineTugasModel->getDataWhere($kategoriLomba); // Deadline lomba
        $data['tanggalLengkap'] = $tanggalLengkap; // Tanggal lengkap
        $data['jamSekarang'] = $jam . ' WITA'; // Waktu sekarang

        // Set judul halaman
        $header['title'] = 'Dashboard User';

        // Tampilkan view
        echo view('user/partial/header', $header);
        echo view('user/partial/top_menu');
        echo view('user/partial/side_menu');
        echo view('user/dashboarduser', $data);
        echo view('user/partial/footer');
    }



    public function informasiView()
    {
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'user') {
            return redirect()->to('/login')->with('error', 'You must be an admin to access this page.');
        }

        $kategoriLomba = $session->get('lomba');
        $username = $session->get('username');
        $namaTimLomba = $session->get('tim_lomba');

        $data['dataSoal'] = $this->soalModel->getDataWhere($kategoriLomba);
        $data['dataUser'] = $this->userModel->getDataWhere($username);
        $data['dataTimLombaNama'] = $this->timLombaModel->getDataWhereTeam($kategoriLomba, $namaTimLomba);
        $data['dataTimLomba'] = $this->timLombaModel->getDataWhere($kategoriLomba);
        $data['dataTimLombaAll'] = $this->timLombaModel->getdata();
        $data['dataDeadlineLomba'] = $this->deadlineTugasModel->getDataWhere($kategoriLomba);

        $header['title'] = 'Dashboard User';

        echo view('user/partial/header');
        echo view('user/partial/top_menu');
        echo view('user/partial/side_menu');
        echo view('user/informasilainnya', $data);
        echo view('user/partial/footer');
    }

    public function helpDesk() {
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'user') {
            return redirect()->to('/login')->with('error', 'You must be an admin to access this page.');
        }

        $kategoriLomba = $session->get('lomba');
        $username = $session->get('username');
        $namaTimLomba = $session->get('tim_lomba');

        $data['dataSoal'] = $this->soalModel->getDataWhere($kategoriLomba);
        $data['dataUser'] = $this->userModel->getDataWhere($username);
        $data['dataTimLombaNama'] = $this->timLombaModel->getDataWhereTeam($kategoriLomba, $namaTimLomba);
        $data['dataTimLomba'] = $this->timLombaModel->getDataWhere($kategoriLomba);
        $data['dataTimLombaAll'] = $this->timLombaModel->getdata();
        $data['dataDeadlineLomba'] = $this->deadlineTugasModel->getDataWhere($kategoriLomba);

        $header['title'] = 'Dashboard User';

        echo view('user/partial/header');
        echo view('user/partial/top_menu');
        echo view('user/partial/side_menu');
        echo view('user/helpdesk', $data);
        echo view('user/partial/footer');
    }
}
