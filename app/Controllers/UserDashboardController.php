<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class UserDashboardController extends BaseController
{
    public function index()
    {
        $timLolosModel = new \App\Models\TimLolosModel();
        $timLombaModel = new \App\Models\TimLombaModel();
        $sekolahModel = new \App\Models\SekolahModel();
        $lombaModel = new \App\Models\LombaModel();
        $pembimbingModel = new \App\Models\PembimbingModel();
        $pesertaModel = new \App\Models\PesertaModel();

        $data['dataTimLolos'] = $timLolosModel->getdata();
        $data['dataTimLomba'] = $timLombaModel->getdata();
        $data['dataSekolah'] = $sekolahModel->getdata();
        $data['dataLomba'] = $lombaModel->getdata();
        $data['dataPembimbing'] = $pembimbingModel->getdata();
        $data['dataPeserta'] = $pesertaModel->getdata();

        // Data Tim Lolos per Kategori
        $data['Mikrotik'] = $timLolosModel->getDataWhere('Mikrotik');
        $data['IT'] = $timLolosModel->getDataWhere('IT');

        $header['title'] = 'Dashboard User';
        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('user/side_menu');
        echo view('user/dashboard_user', $data);
        echo view('partial/footer');
    }
}
