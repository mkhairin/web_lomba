<?php
namespace App\Controllers;
class HomeLombaTRKJ extends BaseController
{

    public function home()
    {
        $header['title']='Home';
        echo view('web_lomba/header',$header);
        echo view('web_lomba/home');
        echo view('web_lomba/footer');
    ;
    }
}