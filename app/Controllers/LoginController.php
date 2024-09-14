<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class LoginController extends BaseController
{
    public function login()
    {
        $header['title'] = 'Login';

        echo view('login/header', $header);
        echo view('login/login');
        echo view('login/footer');
    }
}
