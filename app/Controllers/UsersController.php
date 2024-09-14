<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class UsersController extends BaseController
{


    public function daftarUser()
    {

        $sekolahModel = new \App\Models\SekolahModel();
        $timLombaModel = new \App\Models\TimLombaModel();
        $lombaModel = new \App\Models\LombaModel();
        $userModel = new \App\Models\UsersModel();

        $header['title'] = 'Daftar Users';
        $data['dataSekolah'] = $sekolahModel->getdata();
        $data['dataTimLomba'] = $timLombaModel->getdata();
        $data['dataLomba'] = $lombaModel->getdata();
        $data['dataUsers'] = $userModel->getdata();

        $header['title'] = 'Daftar User';
        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('users', $data);
        echo view('partial/footer');
    }

    public function insert(): RedirectResponse
    {
        $userModel = new \App\Models\UsersModel();
        $validationRules = [
            'username' => 'required',
            'password' => 'required',
            'id_sekolah' => 'required',
            'id_tim_lomba' => 'required',
            'id_lomba' => 'required',
            'roles' => 'required'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        try {
            $data = [
                'username' => esc($this->request->getPost('username')),
                'password' => esc($this->request->getPost('password')),
                'id_sekolah' => esc($this->request->getPost('id_sekolah')),
                'id_tim_lomba' => esc($this->request->getPost('id_tim_lomba')),
                'id_lomba' => esc($this->request->getPost('id_lomba')),
                'roles' => esc($this->request->getPost('roles'))
            ];

            if ($userModel->insert($data)) {
                session()->setFlashdata('success', 'Data Berhasil Ditambah!');
            } else {
                throw new Exception('Data gagal ditambah.');
            }
        } catch (Exception $e) {
            session()->setFlashdata('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }

        return redirect()->to('/admin/user');
    }

    public function update(): RedirectResponse
    {
        $userModel = new \App\Models\UsersModel();
        $validationRules = [
            'username' => 'required',
            'password' => 'required',
            'id_sekolah' => 'required',
            'id_tim_lomba' => 'required',
            'id_lomba' => 'required',
            'roles' => 'required'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        try {
            $data = [
                'username' => esc($this->request->getPost('username')),
                'password' => esc($this->request->getPost('password')),
                'id_sekolah' => esc($this->request->getPost('id_sekolah')),
                'id_tim_lomba' => esc($this->request->getPost('id_tim_lomba')),
                'id_lomba' => esc($this->request->getPost('id_lomba')),
                'roles' => esc($this->request->getPost('roles'))
            ];

            if ($userModel->update($data)) {
                session()->setFlashdata('success', 'Data Berhasil Ditambah!');
            } else {
                throw new Exception('Data gagal ditambah.');
            }
        } catch (Exception $e) {
            session()->setFlashdata('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }

        return redirect()->to('/admin/user');
    }
}
