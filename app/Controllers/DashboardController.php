<?php

namespace App\Controllers;

class DashboardController extends BaseController
{
    public function index()
    {
        $header['title'] = 'Dashboard';
        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('dashboard_admin');
        echo view('partial/footer');
    }

    public function daftarLomba()
    {
        $header['title'] = 'Daftar Lomba';
        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('daftar_lomba');
        echo view('partial/footer');
    }

    public function daftarRules()
    {
        $header['title'] = 'Daftar Rules';
        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('daftar_rules');
        echo view('partial/footer');
    }

    public function daftarSponsor()
    {
        $header['title'] = 'Daftar Sponsor';
        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('daftar_sponsor');
        echo view('partial/footer');
    }

    public function daftarPeserta()
    {
        $header['title'] = 'Daftar Peserta';
        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('daftar_peserta');
        echo view('partial/footer');
    }

    public function daftarSekolah()
    {
        $header['title']='Daftar Juara';
        echo view('partial/header',$header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('daftar_sekolah');
        echo view('partial/footer');
    }
}