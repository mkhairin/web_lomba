<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;

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
    }

    public function index()
    {
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'user') {
            return redirect()->to('/login')->with('error', 'You must be an admin to access this page.');
        }

        $waktuSekarang = Time::now('Asia/Jakarta', 'id_ID');
        $username = $session->get('username');

        $data['dataTimLolos'] = $this->timLolosModel->getdata();
        $data['dataTimLomba'] = $this->timLombaModel->getdata();
        $data['dataSekolah'] = $this->sekolahModel->getdata();
        $data['dataLomba'] = $this->lombaModel->getdata();
        $data['dataPembimbing'] = $this->pembimbingModel->getdata();
        $data['dataPeserta'] = $this->pesertaModel->getdata();

        $data['Mikrotik'] = $this->timLolosModel->getDataWhere('Mikrotik');
        $data['IT'] = $this->timLolosModel->getDataWhere('IT');
        $data['desainGrafis'] = $this->timLolosModel->getDataWhere('Desain Grafis');
        $data['cisco'] = $this->timLolosModel->getDataWhere('Cisco');

        $data['dataUsername'] = $username;
        $data['jam'] = $waktuSekarang;

        $data['dataUser'] = $this->userModel->getDataWhere($username);

        $header['title'] = 'Dashboard User';
        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('user/side_menu', $data);
        echo view('user/dashboard_user', $data);
        echo view('partial/footer');
    }

    public function dashboardLomba()
    {
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'user') {
            return redirect()->to('/login')->with('error', 'You must be an admin to access this page.');
        }

        $kategoriLomba = $session->get('lomba');
        $username = $session->get('username');

        $data['dataSoal'] = $this->soalModel->getDataWhere($kategoriLomba);
        $data['dataUser'] = $this->userModel->getDataWhere($username);

        $header['title'] = 'Dashboard User';
        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('user/side_menu', $data);
        echo view('user/dashboard_lomba', $data);
        echo view('partial/footer');
    }

    public function dashboarduser()
    {
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'user') {
            return redirect()->to('/login')->with('error', 'You must be an admin to access this page.');
        }

        $kategoriLomba = $session->get('lomba');
        $username = $session->get('username');

        $data['dataSoal'] = $this->soalModel->getDataWhere($kategoriLomba);
        $data['dataUser'] = $this->userModel->getDataWhere($username);

        $header['title'] = 'Dashboard User';

        echo view('user/partial/header');
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

        $data['dataSoal'] = $this->soalModel->getDataWhere($kategoriLomba);
        $data['dataUser'] = $this->userModel->getDataWhere($username);

        $header['title'] = 'Dashboard User';
    
        echo view('user/partial/header');
        echo view('user/partial/top_menu');
        echo view('user/partial/side_menu');
        echo view('user/informasilainnya', $data);
        echo view('user/partial/footer');
     
    }
}
