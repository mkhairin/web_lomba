<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\SubmitTugasModel;
use Exception;

class TimLolosController extends BaseController
{
    protected $submitTugasModel;
    protected $timLolosModel;
    protected $deadlineTugasModel;
    protected $emailModel;

    public function __construct()
    {
        // untuk dashboard admin
        $this->submitTugasModel = new SubmitTugasModel();

        $this->timLolosModel = new \App\Models\TimLolosJuriModel();
        $this->deadlineTugasModel = new \App\Models\DeadlineTugasModel();

        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }
    }

    public function daftarTimLolos()
    {
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }

        $data['dataTimLolos'] = $this->timLolosModel->getdata();

        $data['dataSubmit'] = count($this->submitTugasModel->getDataSubmit());
        $data['dataIsNotSubmit'] = count($this->submitTugasModel->getDataNotSubmit());
        $data['unreadEmailCount'] = $this->emailModel->where('read_status', 'unread')->countAllResults();

        $header['title'] = 'Daftar Tim Lolos';

        echo view('azia/header', $header);
        echo view('azia/top_menu', $data);
        echo view('azia/side_menu', $data);
        echo view('admin/daftar_timlolos', $data);
        echo view('azia/footer');
    }


    public function insert(): RedirectResponse
    {
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }

        $timLolosModel = new \App\Models\TimLolosModel();
        $validationRules = [
            'id_tim_lomba' => 'required',
            'id_lomba' => 'required',
            'id_sekolah' => 'required',
            'id_pembimbing' => 'required',
            'nilai' => 'required',
            'status' => 'required'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        try {
            $data = [
                'id_tim_lomba' => esc($this->request->getPost('id_tim_lomba')),
                'id_lomba' => esc($this->request->getPost('id_lomba')),
                'id_sekolah' => esc($this->request->getPost('id_sekolah')),
                'id_pembimbing' => esc($this->request->getPost('id_pembimbing')),
                'nilai' => esc($this->request->getPost('nilai')),
                'status' => esc($this->request->getPost('status'))
            ];

            if ($timLolosModel->insert($data)) {
                session()->setFlashdata('success', 'Data Berhasil Ditambah!');
            } else {
                throw new Exception('Data gagal ditambah.');
            }
        } catch (Exception $e) {
            session()->setFlashdata('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }

        return redirect()->to('/tim-lolos');
    }

    public function update($id): RedirectResponse
    {
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }

        $timLolosModel = new \App\Models\TimLolosModel();
        $validationRules = [
            'id_tim_lomba' => 'required',
            'id_lomba' => 'required',
            'id_sekolah' => 'required',
            'id_pembimbing' => 'required',
            'nilai' => 'required',
            'status' => 'required'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        try {
            $data = [
                'id_tim_lomba' => esc($this->request->getPost('id_tim_lomba')),
                'id_lomba' => esc($this->request->getPost('id_lomba')),
                'id_sekolah' => esc($this->request->getPost('id_sekolah')),
                'id_pembimbing' => esc($this->request->getPost('id_pembimbing')),
                'nilai' => esc($this->request->getPost('nilai')),
                'status' => esc($this->request->getPost('status'))
            ];

            if ($timLolosModel->update($id, $data)) {
                session()->setFlashdata('success', 'Data Berhasil Diubah!');
            } else {
                throw new Exception('Data gagal ditambah.');
            }
        } catch (Exception $e) {
            session()->setFlashdata('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }

        return redirect()->to('/tim-lolos');
    }

    public function delete($id): ResponseInterface
    {
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }

        $timLolosModel = new \App\Models\TimLolosModel();

        try {
            if ($timLolosModel->delete($id)) {
                session()->setFlashdata('success', 'Data Berhasil Dihapus!');
            } else {
                throw new Exception('Gagal menghapus data.');
            }
        } catch (Exception $e) {
            session()->setFlashdata('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }

        return redirect()->to('/tim-lolos');
    }
}
