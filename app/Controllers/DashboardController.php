<?php
namespace App\Controllers;
class DashboardController extends BaseController
{
    public function index()
    {
        $header['title']='Dashboard';
        echo view('partial/header',$header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('dashboard_admin');
        echo view('partial/footer');
    }

    public function daftarLomba()
    {
        $header['title']='Daftar Lomba';
        echo view('partial/header',$header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('daftar_lomba');
        echo view('partial/footer');
    }

    public function daftarRules()
    {
        $header['title']='Daftar Rules';
        echo view('partial/header',$header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('daftar_rules');
        echo view('partial/footer');
    }

    public function daftarSponsor()
    {
        $header['title']='Daftar Sponsor';
        echo view('partial/header',$header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('daftar_sponsor');
        echo view('partial/footer');
    }

    public function daftarJuara()
    {
        $header['title']='Daftar Juara';
        echo view('partial/header',$header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('daftar_juara');
        echo view('partial/footer');
    }

    public function daftarPeserta()
    {
        $header['title']='Daftar Peserta';
        echo view('partial/header',$header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('daftar_peserta');
        echo view('partial/footer');
    }

    public function daftarPembimbing()
    {
        $header['title'] = 'Daftar Pembimbing';
        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('daftar_pembimbing');
        echo view('partial/footer');
    }






    // sekolah methods
    public function daftarSekolah()
    {
        $Model = new \App\Models\SekolahModel();
        $header['title']='Daftar Sekolah';

        $data['dataSekolah'] = $Model->getdata();

        echo view('partial/header',$header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('daftar_sekolah', $data);
        echo view('partial/footer');
    }

    public function insertDataSekolah(){
        $Model = new \App\Models\SekolahModel();
        $data = [
            'id_sekolah' => $this->request->getPost("id"),
            'nama_sekolah' => $this->request->getPost("nama_sekolah"),
            'alamat' => $this->request->getPost("alamat"),
        ];

        if ($Model->insertData($data)) {
            session()->setFlashdata('success', 'Data Berhasil Ditambah!');
        } else {
            session()->setFlashdata('error', 'Data Gagal Ditambah!');
        }

        return redirect()->to('/daftar-sekolah');
    }

    public function updateDataSekolah($id)
    {

        $Model = new \App\Models\SekolahModel();
        $data = [
            'id_sekolah' => $this->request->getPost("id"),
            'nama_sekolah' => $this->request->getPost("nama_sekolah"),
            'alamat' => $this->request->getPost("alamat"),
        ];

        if ($Model->updateData($id, $data)) {
            session()->setFlashdata('success', 'Data Berhasil Diubah!');
        } else {
            session()->setFlashdata('error', 'Data Gagal Diubah!');
        }

        return redirect()->to('/daftar-sekolah');
    }

    public function deleteDataSekolah($id)
    {

        $Model = new \App\Models\SekolahModel();
        if ($Model == true) {
            $Model->deleteData($id);
            session()->setFlashdata('success', 'Data Berhasil Dihapus!');
        } else {
            session()->setFlashdata('error', 'Data Gagal Dihapus!');
        }

        return redirect()->to('/daftar-sekolah');
    }
}