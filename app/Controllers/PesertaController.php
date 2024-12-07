<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PesertaModel;
use App\Models\LombaModel;
use App\Models\PembimbingModel;
use App\Models\SekolahModel;
use App\Models\TimLombaModel;
use App\Models\SubmitTugasModel;

class PesertaController extends BaseController
{
    protected $pesertaModel;
    protected $lombaModel;
    protected $pembimbingModel;
    protected $sekolahModel;
    protected $timLombaModel;
    protected $submitTugasModel;

    public function __construct()
    {
        // Initialize Models
        $this->pesertaModel = new PesertaModel();
        $this->lombaModel = new LombaModel();
        $this->pembimbingModel = new PembimbingModel();
        $this->sekolahModel = new SekolahModel();
        $this->timLombaModel = new TimLombaModel();
        $this->submitTugasModel = new SubmitTugasModel();
    }

    public function before()
    {
        // Ensure admin is logged in before accessing any controller action
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }
    }

    public function daftarPeserta()
    {
        $this->before(); // Ensure admin access

        $data = [
            'dataPeserta' => $this->pesertaModel->getdata(),
            'dataLomba' => $this->lombaModel->getdata(),
            'dataPembimbing' => $this->pembimbingModel->getdata(),
            'dataSekolah' => $this->sekolahModel->getdata(),
            'dataTimLomba' => $this->timLombaModel->getdata(),
            'dataSubmit' => count($this->submitTugasModel->getDataSubmit()),
            'dataIsNotSubmit' => count($this->submitTugasModel->getDataNotSubmit()),
        ];

        $header['title'] = 'Daftar Peserta';

        echo view('azia/header', $header);
        echo view('azia/top_menu');
        echo view('azia/side_menu');
        echo view('admin/daftar_peserta', $data);
        echo view('azia/footer');
    }

    public function insert()
    {
        $this->before(); // Ensure admin access

        $validation = \Config\Services::validation();
        $validation->setRules([
            'id_lomba' => 'required',
            'id_pembimbing' => 'required',
            'id_sekolah' => 'required',
            'id_tim_lomba' => 'required',
            'nama_peserta' => 'required',
            'no_handphone' => 'required',
        ]);

        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $data = [
            'id_lomba' => $this->request->getPost('id_lomba', FILTER_SANITIZE_NUMBER_INT),
            'id_pembimbing' => $this->request->getPost('id_pembimbing', FILTER_SANITIZE_NUMBER_INT),
            'id_sekolah' => $this->request->getPost('id_sekolah', FILTER_SANITIZE_NUMBER_INT),
            'id_tim_lomba' => $this->request->getPost('id_tim_lomba', FILTER_SANITIZE_NUMBER_INT),
            'nama_peserta' => htmlspecialchars($this->request->getPost('nama_peserta'), ENT_QUOTES, 'UTF-8'),
            'no_handphone' => htmlspecialchars($this->request->getPost('no_handphone'), ENT_QUOTES, 'UTF-8'),
        ];

        if ($this->pesertaModel->insert($data)) {
            session()->setFlashdata('success', 'Data Berhasil Ditambah!');
            return redirect()->to('/daftar-peserta');
        } else {
            session()->setFlashdata('error', 'Data Gagal Ditambah!');
            return redirect()->back()->withInput();
        }
    }

    public function update($id)
    {
        $this->before(); // Ensure admin access

        $validation = \Config\Services::validation();
        $validation->setRules([
            'id_lomba' => 'required',
            'id_pembimbing' => 'required',
            'id_sekolah' => 'required',
            'id_tim_lomba' => 'required',
            'nama_peserta' => 'required',
            'no_handphone' => 'required',
        ]);

        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $data = [
            'id_lomba' => $this->request->getPost('id_lomba', FILTER_SANITIZE_NUMBER_INT),
            'id_pembimbing' => $this->request->getPost('id_pembimbing', FILTER_SANITIZE_NUMBER_INT),
            'id_sekolah' => $this->request->getPost('id_sekolah', FILTER_SANITIZE_NUMBER_INT),
            'id_tim_lomba' => $this->request->getPost('id_tim_lomba', FILTER_SANITIZE_NUMBER_INT),
            'nama_peserta' => htmlspecialchars($this->request->getPost('nama_peserta'), ENT_QUOTES, 'UTF-8'),
            'no_handphone' => htmlspecialchars($this->request->getPost('no_handphone'), ENT_QUOTES, 'UTF-8'),
        ];

        if ($this->pesertaModel->update($id, $data)) {
            session()->setFlashdata('success', 'Data Berhasil Diubah!');
            return redirect()->to('/daftar-peserta');
        } else {
            session()->setFlashdata('error', 'Data Gagal Diubah!');
            return redirect()->back()->withInput();
        }
    }

    public function delete($id)
    {
        $this->before(); // Ensure admin access

        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

        if ($this->pesertaModel->find($id)) {
            if ($this->pesertaModel->delete($id)) {
                session()->setFlashdata('success', 'Data Berhasil Dihapus!');
            } else {
                session()->setFlashdata('error', 'Data Gagal Dihapus!');
            }
        } else {
            session()->setFlashdata('error', 'Data Tidak Ditemukan!');
        }

        return redirect()->to('/daftar-peserta');
    }
}
