<?php
namespace App\Controllers;
class HomeLombaTRKJ extends BaseController
{
    // public function index()
    // {
    //     $header['title']='Dashboard';
    //     echo view('web_lomba/header',$header);
    //     echo view('web_lomba/index');
    //     echo view('web_lomba/footer');
    // ;
    // }

    public function home()
    {
        $header['title']='Home';
        echo view('web_lomba/header',$header);
        echo view('web_lomba/home');
        echo view('web_lomba/footer');
    ;
    }
}