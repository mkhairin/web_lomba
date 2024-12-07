<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;
use App\Models\SubmitTugasModel;

class UsersController extends BaseController
{
    protected $submitTugasModel;

    public function __construct()
    {
        // untuk dashboard admin
        $this->submitTugasModel = new SubmitTugasModel();

        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }
    }

    public function daftarUser()
    {
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }

        $sekolahModel = new \App\Models\SekolahModel();
        $timLombaModel = new \App\Models\TimLombaModel();
        $lombaModel = new \App\Models\LombaModel();
        $userModel = new \App\Models\UsersModel();

        $header['title'] = 'Daftar Users';
        $data['dataSekolah'] = $sekolahModel->getdata();
        $data['dataTimLomba'] = $timLombaModel->getdata();
        $data['dataLomba'] = $lombaModel->getdata();
        $data['dataUsers'] = $userModel->getdata();

        $data['dataSubmit'] = count($this->submitTugasModel->getDataSubmit());
        $data['dataIsNotSubmit'] = count($this->submitTugasModel->getDataNotSubmit());

        $header['title'] = 'Daftar User';
        echo view('azia/header', $header);
        echo view('azia/top_menu');
        echo view('azia/side_menu');
        echo view('admin/users', $data);
        echo view('azia/footer');
    }

    public function insert(): RedirectResponse
    {
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }

        $userModel = new \App\Models\UsersModel();
        $validationRules = [
            'username' => 'required',
            'password' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        try {
            $password = esc($this->request->getPost('password'));
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $data = [
                'username' => esc($this->request->getPost('username')),
                'password' => $passwordHash,
                'id_sekolah' => esc($this->request->getPost('id_sekolah')),
                'id_tim_lomba' => esc($this->request->getPost('id_tim_lomba')),
                'id_lomba' => esc($this->request->getPost('id_lomba')),
                'role' => esc($this->request->getPost('role'))
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

        return redirect()->to('/user');
    }

    public function update($id): RedirectResponse
    {
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }

        $userModel = new \App\Models\UsersModel();
        $validationRules = [
            'username' => 'required',
            'password' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        try {
            $password = esc($this->request->getPost('password'));
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $data = [
                'username' => esc($this->request->getPost('username')),
                'password' => $passwordHash,
                'id_sekolah' => esc($this->request->getPost('id_sekolah')),
                'id_tim_lomba' => esc($this->request->getPost('id_tim_lomba')),
                'id_lomba' => esc($this->request->getPost('id_lomba')),
                'role' => esc($this->request->getPost('role'))
            ];

            if ($userModel->update($id, $data)) {
                session()->setFlashdata('success', 'Data Berhasil Ditambah!');
            } else {
                throw new Exception('Data gagal ditambah.');
            }
        } catch (Exception $e) {
            session()->setFlashdata('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }

        return redirect()->to('/user');
    }

    public function delete($id): RedirectResponse
    {
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }

        $userModel = new \App\Models\UsersModel();

        try {
            if ($userModel->delete($id)) {
                session()->setFlashdata('success', 'Data berhasil dihapus!');
            } else {
                throw new Exception('Gagal menghapus data.');
            }
        } catch (Exception $e) {
            session()->setFlashdata('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }

        return redirect()->to('/user');
    }
}
