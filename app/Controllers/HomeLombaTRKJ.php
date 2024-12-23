<?php

namespace App\Controllers;

use App\Models\FaQModel;
use App\Models\SponsorModel;
use App\Models\LombaModel;
use DateTime;
use DateTimeZone;

class HomeLombaTRKJ extends BaseController
{
    protected $sponsorModel, $lombaModel, $faqModel;
    protected $tanggalLengkap;
    protected $jamSekarang;

    public function __construct()
    {
        $this->sponsorModel = new SponsorModel();
        $this->lombaModel = new LombaModel();
        $this->faqModel = new FaQModel();

        // Set waktu dan tanggal WITA
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

        // Set properti tanggal dan waktu
        $this->tanggalLengkap = $namaHari[$hari] . ', ' . $tanggal . ' ' . $namaBulan[$bulan] . ' ' . $tahun;
        $this->jamSekarang = $jam . ' WITA';
    }

    public function home()
    {
        $header['title'] = 'Kaltech - 2024';

        $data['dataLomba'] = $this->lombaModel->getdata();
        $data['dataLombaFirst'] = $this->lombaModel->getdataSingle();
        $data['dataSponsor'] = $this->sponsorModel->getdata();
        $data['dataPertanyaan'] = $this->faqModel->getdata();
        $data['tanggalLengkap'] =  $this->tanggalLengkap;
        $data['jamSekarang'] =  $this->jamSekarang;

        echo view('web_lomba/header', $header);
        echo view('web_lomba/nav', $data);
        echo view('web_lomba/home', $data);
        echo view('web_lomba/footer');
    }

    public function team()
    {

        $header['title'] = 'Team Development';

        $data['dataLomba'] = $this->lombaModel->getdata();
        $data['dataSponsor'] = $this->sponsorModel->getdata();
        $data['dataPertanyaan'] = $this->faqModel->getdata();

        echo view('web_lomba/header', $header);
        echo view('web_lomba/nav_team');
        echo view('web_lomba/team', $data);
        echo view('web_lomba/footer');;
    }

    public function contact()
    {

        $header['title'] = 'Team Development';

        $data['dataLomba'] = $this->lombaModel->getdata();
        $data['dataSponsor'] = $this->sponsorModel->getdata();
        $data['dataPertanyaan'] = $this->faqModel->getdata();

        echo view('web_lomba/header', $header);
        echo view('web_lomba/nav');
        echo view('web_lomba/contact', $data);
        echo view('web_lomba/footer');;
    }
}
