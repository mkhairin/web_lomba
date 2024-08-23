<?php
namespace App\Controllers;
class HomeLombaTRKJ extends BaseController
{
    public function index()
    {
        $header['title']='Dashboard';
        echo view('web_lomba/header',$header);
        echo view('web_lomba/content');
        echo view('web_lomba/footer');
    ;
    }
}