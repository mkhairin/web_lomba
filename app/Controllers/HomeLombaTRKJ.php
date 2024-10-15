<?php

namespace App\Controllers;

use App\Models\SponsorModel;
use App\Models\LombaModel;

class HomeLombaTRKJ extends BaseController
{
    protected $sponsorModel, $lombaModel;
    public function __construct()
    {
        $this->sponsorModel = new SponsorModel();
        $this->lombaModel = new LombaModel();
    }

    public function home()
    {

        $header['title'] = 'Home';

        $data['dataLomba'] = $this->lombaModel->getdata();
        $data['dataSponsor'] = $this->sponsorModel->getdata();
        echo view('web_lomba/header', $header);
        echo view('web_lomba/home', $data);
        echo view('web_lomba/footer');;
    }
}
