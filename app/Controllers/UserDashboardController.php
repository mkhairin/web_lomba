<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;

class UserDashboardController extends BaseController
{
    public function index()
    {
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'user') {
            return redirect()->to('/login')->with('error', 'You must be an admin to access this page.');
        }

        $timLolosModel = new \App\Models\TimLolosModel();
        $timLombaModel = new \App\Models\TimLombaModel();
        $sekolahModel = new \App\Models\SekolahModel();
        $lombaModel = new \App\Models\LombaModel();
        $pembimbingModel = new \App\Models\PembimbingModel();
        $pesertaModel = new \App\Models\PesertaModel();

        $waktuSekarang = Time::now('Asia/Jakarta', 'id_ID');

        $data['dataTimLolos'] = $timLolosModel->getdata();
        $data['dataTimLomba'] = $timLombaModel->getdata();
        $data['dataSekolah'] = $sekolahModel->getdata();
        $data['dataLomba'] = $lombaModel->getdata();
        $data['dataPembimbing'] = $pembimbingModel->getdata();
        $data['dataPeserta'] = $pesertaModel->getdata();

        // Data Tim Lolos per Kategori
        $data['Mikrotik'] = $timLolosModel->getDataWhere('Mikrotik');
        $data['IT'] = $timLolosModel->getDataWhere('IT');
        $data['desainGrafis'] = $timLolosModel->getDataWhere('Desain Grafis');
        $data['cisco'] = $timLolosModel->getDataWhere('Cisco');

        $data['jam'] = $waktuSekarang;

        $header['title'] = 'Dashboard User';
        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('user/side_menu');
        echo view('user/dashboard_user', $data);
        echo view('partial/footer');
    }
}
