<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\I18n\Time;
use App\Models\SubmitTugasModel;
use Exception;

class FaQController extends BaseController
{
    protected $faqModel, $emailModel;
    protected $submitTugasModel;

    public function __construct()
    {
        // untuk dashboard admin
        $this->submitTugasModel = new SubmitTugasModel();
        $this->faqModel = new \App\Models\FaQModel();
        $this->emailModel = new \App\Models\MailModel();

        // Check if user is admin
        $this->checkAdmin();
    }

    private function checkAdmin()
    {
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }
    }

    public function daftarQuestion()
    {
        $this->checkAdmin(); // Ensure admin access

        $data['dataQuestions'] = $this->faqModel->getdata();
        $data['dataSubmit'] = count($this->submitTugasModel->getDataSubmit());
        $data['dataIsNotSubmit'] = count($this->submitTugasModel->getDataNotSubmit());

        $header['title'] = 'Daftar Pertanyaan';
        echo view('azia/header', $header);
        echo view('azia/top_menu');
        echo view('azia/side_menu');
        echo view('admin/daftar_faq', $data);
        echo view('azia/footer');
    }

    public function insert(): ResponseInterface
    {
        $this->checkAdmin(); // Ensure admin access

        $validation = \Config\Services::validation();
        $validation->setRules([
            'questions' => 'required',
            'answers'  => 'required'
        ]);

        // Validate input
        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        try {
            $data = [
                'questions' => esc($this->request->getPost('questions')),
                'answers' => esc($this->request->getPost('answers')),
            ];

            if ($this->faqModel->insert($data)) {
                session()->setFlashdata('success', 'Data berhasil ditambah!');
            } else {
                throw new Exception('Gagal menambahkan data.');
            }
        } catch (Exception $e) {
            log_message('error', 'Error in FAQ insert: ' . $e->getMessage());
            session()->setFlashdata('error', 'Terjadi kesalahan: Gagal menambahkan data.');
            return redirect()->back()->withInput();
        }

        return redirect()->to('/daftar-pertanyaan');
    }

    public function update($id): ResponseInterface
    {
        $this->checkAdmin(); // Ensure admin access

        $validation = \Config\Services::validation();
        $validation->setRules([
            'questions' => 'required',
            'answers'  => 'required'
        ]);

        // Validate input
        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        try {
            $data = [
                'questions' => esc($this->request->getPost('questions')),
                'answers' => esc($this->request->getPost('answers')),
            ];

            if ($this->faqModel->update($id, $data)) {
                session()->setFlashdata('success', 'Data berhasil diubah!');
            } else {
                throw new Exception('Gagal mengubah data.');
            }
        } catch (Exception $e) {
            log_message('error', 'Error in FAQ update: ' . $e->getMessage());
            session()->setFlashdata('error', 'Terjadi kesalahan: Gagal mengubah data.');
            return redirect()->back()->withInput();
        }

        return redirect()->to('/daftar-pertanyaan');
    }

    public function delete($id): RedirectResponse
    {
        $this->checkAdmin(); // Ensure admin access

        try {
            if ($this->faqModel->delete($id)) {
                session()->setFlashdata('success', 'Data berhasil dihapus!');
            } else {
                throw new Exception('Gagal menghapus data.');
            }
        } catch (Exception $e) {
            log_message('error', 'Error in FAQ delete: ' . $e->getMessage());
            session()->setFlashdata('error', 'Terjadi kesalahan: Gagal menghapus data.');
        }

        return redirect()->to('/daftar-pertanyaan');
    }
}
