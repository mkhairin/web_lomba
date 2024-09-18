<?php

namespace App\Controllers;

use App\Models\SekolahModel;
use App\Models\PesertaModel;
use App\Models\TimLombaModel;
use App\Models\PembimbingModel;
use CodeIgniter\I18n\Time;


class DashboardController extends BaseController
{
    protected $sekolahModel, $pesertaModel, $timLombaModel, $pembimbingModel;

    public function __construct()
    {
        $this->sekolahModel = new SekolahModel();
        $this->pesertaModel = new PesertaModel();
        $this->timLombaModel = new TimLombaModel();
        $this->pembimbingModel = new PembimbingModel();

        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/login')->with('error', 'You must be an admin to access this page.');
        }
    }

    public function index()
    {
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/login')->with('error', 'You must be an admin to access this page.');
        }

        $waktuSekarang = Time::now('Asia/Jakarta', 'id_ID');

        $header['title'] = 'Dashboard';

        $data['dataSekolah'] = count($this->sekolahModel->getdata());
        $data['dataTimLomba'] = count($this->timLombaModel->getdata());
        $data['dataPeserta'] = count($this->pesertaModel->getdata());
        $data['dataPembimbing'] = count($this->pembimbingModel->getdata());
        $data['jam'] = $waktuSekarang;
        
        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('admin/dashboard_admin', $data);
        echo view('partial/footer');
    }
}
