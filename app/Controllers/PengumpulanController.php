<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class PengumpulanController extends BaseController
{
    public function index()
    {
        $header['title'] = 'Daftar Soal';

        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('admin/daftar_pengumpulan');
        echo view('partial/footer');
    }
}
