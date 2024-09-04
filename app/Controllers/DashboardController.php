<?php

namespace App\Controllers;

use App\Models\PembimbingModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $header['title'] = 'Dashboard';
        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('dashboard_admin');
        echo view('partial/footer');
    }

    public function daftarLomba()
    {
        $header['title'] = 'Daftar Lomba';
        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('daftar_lomba');
        echo view('partial/footer');
    }

    public function daftarRules()
    {
        $header['title'] = 'Daftar Rules';
        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('daftar_rules');
        echo view('partial/footer');
    }


    public function daftarPeserta()
    {
        $header['title'] = 'Daftar Peserta';
        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('daftar_peserta');
        echo view('partial/footer');
    }





    // sekolah methods
    public function daftarSekolah()
    {
        $Model = new \App\Models\SekolahModel();
        $header['title'] = 'Daftar Sekolah';

        $data['dataSekolah'] = $Model->getdata();

        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('daftar_sekolah', $data);
        echo view('partial/footer');
    }

    public function insertDataSekolah()
    {
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




    // juara methods
    public function daftarJuara()
    {
        $Model = new \App\Models\JuaraModel();

        $header['title'] = 'Daftar Juara';
        $data['dataJuara'] = $Model->getdata();
        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('daftar_juara', $data);
        echo view('partial/footer');
    }

    public function insertDataJuara()
    {
        $Model = new \App\Models\JuaraModel();
        $data = [
            'id_juara' => $this->request->getPost('id'),
            'juara' => $this->request->getPost('juara'),
            'total_hadiah' => $this->request->getPost('total_hadiah')
        ];

        if ($Model->insertData($data)) {
            session()->setFlashdata('success', 'Data Berhasil Ditambah!');
        } else {
            session()->setFlashdata('error', 'Data Gagal Ditambah!');
        }

        return redirect()->to('/daftar-juara');
    }

    public function updateDataJuara($id)
    {
        $Model = new \App\Models\JuaraModel();
        $data = [
            'id_juara' => $this->request->getPost('id'),
            'juara' => $this->request->getPost('juara'),
            'total_hadiah' => $this->request->getPost('total_hadiah')
        ];

        if ($Model->updateData($id, $data)) {
            session()->setFlashdata('success', 'Data Berhasil Diubah!');
        } else {
            session()->setFlashdata('error', 'Data Gagal Diubah!');
        }

        return redirect()->to('/daftar-juara');
    }

    public function deleteDataJuara($id)
    {
        $Model = new \App\Models\JuaraModel();

        if ($Model == true) {
            $Model->deleteData($id);
            session()->setFlashdata('success', 'Data Berhasil Dihapus!');
        } else {
            session()->setFlashdata('error', 'Data Gagal Dihapus!');
        }

        return redirect()->to('/daftar-juara');
    }




    // sponsor methods
    public function daftarSponsor()
    {
        $Model = new \App\Models\SponsorModel();

        $header['title'] = 'Daftar Sponsor';

        $data['dataSponsor'] = $Model->getdata();

        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('daftar_sponsor', $data);
        echo view('partial/footer');
    }

    public function insertDataSponsor()
    {
        $Model = new \App\Models\SponsorModel();

        // Validasi input termasuk file
        $validationRules = [
            'nama_sponsor' => 'required',
            'logo' => [
                'rules' => 'uploaded[logo]|mime_in[logo,image/jpg,image/jpeg,image/png]|max_size[logo,2048]',
                'errors' => [
                    'uploaded' => 'File logo harus diunggah.',
                    'mime_in' => 'Hanya file dengan ekstensi jpg, jpeg, atau png yang diizinkan.',
                    'max_size' => 'Ukuran file maksimal adalah 2MB.'
                ]
            ]
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $file = $this->request->getFile('logo');

        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('./img/sponsor', $newName);

            $data = [
                'id_sponsor' => $this->request->getPost('id'),
                'nama_sponsor' => $this->request->getPost('nama_sponsor'),
                'logo' => $newName
            ];

            if ($Model->insert($data)) {  // Perbaikan: menggunakan metode 'insert' bawaan CodeIgniter
                session()->setFlashdata('success', 'Data Berhasil Ditambah!');
            } else {
                session()->setFlashdata('error', 'Data Gagal Ditambah!');
            }
        } else {
            session()->setFlashdata('error', 'File Gagal Diunggah!');
        }

        return redirect()->to('/daftar-sponsor');
    }

    public function updateDataSponsor($id)
    {
        $Model = new \App\Models\SponsorModel();

        // Validasi input termasuk file
        $validationRules = [
            'nama_sponsor' => 'required',
            'logo' => [
                'rules' => 'mime_in[logo,image/jpg,image/jpeg,image/png]|max_size[logo,2048]',
                'errors' => [
                    'mime_in' => 'Hanya file dengan ekstensi jpg, jpeg, atau png yang diizinkan.',
                    'max_size' => 'Ukuran file maksimal adalah 2MB.'
                ]
            ]
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $file = $this->request->getFile('logo');
        $data = [
            'nama_sponsor' => $this->request->getPost('nama_sponsor')
        ];

        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Hapus logo lama jika ada
            $oldData = $Model->find($id);
            if ($oldData && !empty($oldData['logo']) && file_exists('./img/sponsor/' . $oldData['logo'])) {
                unlink('./img/sponsor/' . $oldData['logo']);
            }

            // Pindahkan logo baru
            $newName = $file->getRandomName();
            $file->move('./img/sponsor', $newName);
            $data['logo'] = $newName;
        }

        if ($Model->updateData($id, $data)) {
            session()->setFlashdata('success', 'Data Berhasil Diperbarui!');
        } else {
            session()->setFlashdata('error', 'Data Gagal Diperbarui!');
        }

        return redirect()->to('/daftar-sponsor');
    }

    public function deleteDataSponsor($id) 
    {
        $Model = new \App\Models\SponsorModel();

        if ($Model == true) {
            $Model->deleteData($id);
            session()->setFlashdata('success', 'Data Berhasil Dihapus!');
        } else {
            session()->setFlashdata('error', 'Data Gagal Dihapus!');
        }

        return redirect()->to('/daftar-sponsor');
    }




    public function daftarPembimbing()
    {
        $Model = new \App\Models\PembimbingModel();
        $ModelSekolah = new \App\Models\SekolahModel();

        $data['dataPembimbing'] = $Model->getDataPembimbing();
        $data['dataSekolah'] = $ModelSekolah->getdata();

        $header['title'] = 'Daftar Pembimbing';
        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('daftar_pembimbing', $data);
        echo view('partial/footer');
    }


    public function insertDataPembimbing()
    {

    }
}
