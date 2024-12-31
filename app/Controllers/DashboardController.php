<?php

namespace App\Controllers;

use App\Models\SekolahModel;
use App\Models\PesertaModel;
use App\Models\TimLombaModel;
use App\Models\PembimbingModel;
use App\Models\SubmitTugasModel;
use App\Models\TimLolosJuriModel;
use CodeIgniter\I18n\Time;
use DateTime;
use DateTimeZone;


class DashboardController extends BaseController
{
    protected $sekolahModel, $pesertaModel, $timLombaModel, $pembimbingModel, $timLolosNew, $submitTugasModel;
    protected $tanggalLengkap;
    protected $jamSekarang;
    protected $emailModel;

    public function __construct()
    {
        $this->sekolahModel = new SekolahModel();
        $this->pesertaModel = new PesertaModel();
        $this->timLombaModel = new TimLombaModel();
        $this->pembimbingModel = new PembimbingModel();
        $this->timLolosNew = new TimLolosJuriModel();
        $this->submitTugasModel = new SubmitTugasModel();
        $this->emailModel = new \App\Models\MailModel();

        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/login')->with('error', 'You must be an admin to access this page.');
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

    public function index()
    {
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }


        $header['title'] = 'Dashboard Admin';

        $data['dataSekolah'] = count($this->sekolahModel->getdata());
        $data['dataTimLomba'] = count($this->timLombaModel->getdata());
        $data['dataPeserta'] = count($this->pesertaModel->getdata());
        $data['dataPembimbing'] = count($this->pembimbingModel->getdata());
        $data['dataTimLolos'] = count($this->timLolosNew->getdata());
        $data['dataSubmit'] = count($this->submitTugasModel->getDataSubmit());
        $data['dataIsNotSubmit'] = count($this->submitTugasModel->getDataNotSubmit());
        $data['dataTimLolos'] = $this->timLolosNew->getdata();
        $data['dataTimNotlos'] = count($this->timLolosNew->getDataNotLolos());
        $data['tanggalLengkap'] = $this->tanggalLengkap;
        $data['jamSekarang'] = $this->jamSekarang;
        $data['unreadEmailCount'] = $this->emailModel->where('read_status', 'unread')->countAllResults();



        echo view('azia/header', $header);
        echo view('azia/top_menu', $data);
        // echo view('azia/side_menu');
        echo view('admin/dashboard_admin', $data);
        echo view('azia/footer');
    }
}
