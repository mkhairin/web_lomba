<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class TimLolosJuriController extends BaseController
{


    public function insert(): RedirectResponse
    {
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'juri') {
            return redirect()->to('/login')->with('error', 'You must be an juri to access this page.');
        }

        $timLolosJuriModel = new \App\Models\TimLolosJuriModel();
        $validationRules = [
            'tim' => 'required',
            'ketua' => 'required',
            'lomba' => 'required',
            'pembimbing' => 'required',
            'sekolah' => 'required',
            'skor_nilai' => 'required',
            'status' => 'required'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        try {
            $data = [
                'tim' => esc($this->request->getPost('tim')),
                'ketua' => esc($this->request->getPost('ketua')),
                'lomba' => esc($this->request->getPost('lomba')),
                'pembimbing' => esc($this->request->getPost('pembimbing')),
                'sekolah' => esc($this->request->getPost('sekolah')),
                'skor_nilai' => esc($this->request->getPost('skor_nilai')),
                'status' => esc($this->request->getPost('status'))
            ];

            if ($timLolosJuriModel->insert($data)) {
                session()->setFlashdata('success', 'Data berhasil diubah!');
            } else {
                throw new Exception('Data gagal diubah.');
            }
        } catch (Exception $e) {
            session()->setFlashdata('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }

        return redirect()->to('/juri-dashboard/tim-lolos');
    }

  

   
}
