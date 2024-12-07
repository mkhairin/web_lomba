<?php

namespace App\Controllers;

use App\Models\FaQModel;
use App\Models\SponsorModel;
use App\Models\LombaModel;

class HomeLombaTRKJ extends BaseController
{
    protected $sponsorModel, $lombaModel, $faqModel;
    public function __construct()
    {
        $this->sponsorModel = new SponsorModel();
        $this->lombaModel = new LombaModel();
        $this->faqModel = new FaQModel();
    }

    public function home()
    {

        $header['title'] = 'Kaltech - 2024';

        $data['dataLomba'] = $this->lombaModel->getdata();
        $data['dataSponsor'] = $this->sponsorModel->getdata();
        $data['dataPertanyaan'] = $this->faqModel->getdata();

        echo view('web_lomba/header', $header);
        echo view('web_lomba/nav');
        echo view('web_lomba/home', $data);
        echo view('web_lomba/footer');;
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
