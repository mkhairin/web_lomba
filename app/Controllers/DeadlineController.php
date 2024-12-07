<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\RedirectResponse;
use Exception;

class DeadlineController extends BaseController
{
    protected $deadlineSoalModel;

    public function __construct()
    {
        $this->deadlineSoalModel = new \App\Models\DeadlineTugasModel();

        // Ensure that only authorized users (juri) can access
        $this->checkAccess('juri');
    }

    // Helper function for session validation and redirect
    private function checkAccess($role)
    {
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== $role) {
            return redirect()->to('/login')->with('error', 'You must be a ' . $role . ' to access this page.');
        }
    }

    public function insert(): ResponseInterface
    {
        // Check if the user has proper access
        $this->checkAccess('juri');

        // Set validation rules
        $validation = \Config\Services::validation();
        $validation->setRules([
            'id_lomba' => 'required',
            'deskripsi' => 'required',
            'deadline' => 'required',
        ]);

        // Validate inputs
        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        try {
            // Prepare data to insert
            $data = [
                'id_lomba' => esc($this->request->getPost('id_lomba')),
                'deskripsi' => esc($this->request->getPost('deskripsi')),
                'deadline' => esc($this->request->getPost('deadline')),
            ];

            // Insert data and handle the response
            if ($this->deadlineSoalModel->insert($data)) {
                session()->setFlashdata('success', 'Data Berhasil Ditambah!');
            } else {
                throw new Exception('Failed to add data. Please try again.');
            }
        } catch (Exception $e) {
            session()->setFlashdata('error', 'Error: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }

        return redirect()->to('/juri-dashboard/daftar-deadline');
    }

    public function update($id): ResponseInterface
    {
        // Check if the user has proper access
        $this->checkAccess('juri');

        // Set validation rules
        $validation = \Config\Services::validation();
        $validation->setRules([
            'id_lomba' => 'required',
            'deskripsi' => 'required',
            'deadline' => 'required',
        ]);

        // Validate inputs
        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        try {
            // Prepare data to update
            $data = [
                'id_lomba' => esc($this->request->getPost('id_lomba')),
                'deskripsi' => esc($this->request->getPost('deskripsi')),
                'deadline' => esc($this->request->getPost('deadline')),
            ];

            // Update data and handle the response
            if ($this->deadlineSoalModel->update($id, $data)) {
                session()->setFlashdata('success', 'Data Berhasil diubah!');
            } else {
                throw new Exception('Failed to update data. Please try again.');
            }
        } catch (Exception $e) {
            session()->setFlashdata('error', 'Error: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }

        return redirect()->to('/juri-dashboard/daftar-deadline');
    }

    public function delete($id): RedirectResponse
    {
        // Check if the user has proper access
        $this->checkAccess('juri');

        try {
            // Delete data and handle the response
            if ($this->deadlineSoalModel->delete($id)) {
                session()->setFlashdata('success', 'Data berhasil dihapus!');
            } else {
                throw new Exception('Failed to delete data. Please try again.');
            }
        } catch (Exception $e) {
            session()->setFlashdata('error', 'Error: ' . $e->getMessage());
        }

        return redirect()->to('/juri-dashboard/daftar-deadline');
    }
}
