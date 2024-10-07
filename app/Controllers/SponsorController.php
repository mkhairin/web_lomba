<?php

namespace App\Controllers;

use App\Models\SponsorModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\RedirectResponse;

class SponsorController extends BaseController
{
    protected $sponsorModel;

    public function __construct()
    {
        $this->sponsorModel = new SponsorModel();
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }
    }

    // Method to list all sponsors
    public function sponsorView(): ResponseInterface
    {
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }

        $header['title'] = 'Daftar Sponsor';
        $data['dataSponsor'] = $this->sponsorModel->getdata();

        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('admin/daftar_sponsor', $data);
        echo view('partial/footer');

        return $this->response;
    }

    // Method to insert sponsor data
    public function insert(): RedirectResponse
    {
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }

        // Input validation rules including file validation
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

        // If validation fails
        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $file = $this->request->getFile('logo');

        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('./img/sponsor', $newName);

            $data = [
                'id_sponsor' => esc($this->request->getPost('id')),  // Escaped input
                'nama_sponsor' => esc($this->request->getPost('nama_sponsor')),
                'logo' => $newName
            ];

            try {
                if ($this->sponsorModel->insert($data)) {
                    session()->setFlashdata('success', 'Data Berhasil Ditambah!');
                } else {
                    session()->setFlashdata('error', 'Data Gagal Ditambah!');
                }
            } catch (\Exception $e) {
                log_message('error', $e->getMessage());  // Log error details
                session()->setFlashdata('error', 'Terjadi kesalahan pada server!');
            }
        } else {
            session()->setFlashdata('error', 'File Gagal Diunggah!');
        }

        return redirect()->to('/daftar-sponsor');
    }

    // Method to update sponsor data
    public function update($id): RedirectResponse
    {
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }
        // Input validation rules
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

        // If validation fails
        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $file = $this->request->getFile('logo');
        $data = [
            'nama_sponsor' => esc($this->request->getPost('nama_sponsor')) // Escaped input
        ];

        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Delete old logo if exists
            $oldData = $this->sponsorModel->find($id);
            if ($oldData && !empty($oldData['logo']) && file_exists('./img/sponsor/' . $oldData['logo'])) {
                unlink('./img/sponsor/' . $oldData['logo']);
            }

            // Move new logo
            $newName = $file->getRandomName();
            $file->move('./img/sponsor', $newName);
            $data['logo'] = $newName;
        }

        // Update sponsor data
        if ($this->sponsorModel->update($id, $data)) {
            session()->setFlashdata('success', 'Data Berhasil Diperbarui!');
        } else {
            session()->setFlashdata('error', 'Data Gagal Diperbarui!');
        }

        return redirect()->to('/daftar-sponsor');
    }

    // Method to delete sponsor data
    public function delete($id): RedirectResponse
    {
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }
        $sponsor = $this->sponsorModel->find($id);

        if ($sponsor && $this->sponsorModel->delete($id)) {
            // Delete logo file if it exists
            if (!empty($sponsor['logo']) && file_exists('./img/sponsor/' . $sponsor['logo'])) {
                unlink('./img/sponsor/' . $sponsor['logo']);
            }
            session()->setFlashdata('success', 'Data Berhasil Dihapus!');
        } else {
            session()->setFlashdata('error', 'Data Gagal Dihapus!');
        }

        return redirect()->to('/daftar-sponsor');
    }
}
