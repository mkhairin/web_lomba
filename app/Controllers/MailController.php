<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\RedirectResponse;
use Exception;
use DateTime;
use DateTimeZone;


class MailController extends BaseController
{
    protected $emailModel;
    protected $deadlineTugasModel;
    protected $tanggalLengkap;
    protected $jamSekarang;

    public function __construct()
    {
        $this->emailModel = new \App\Models\MailModel();
        $this->deadlineTugasModel = new \App\Models\DeadlineTugasModel();

        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }

        // Set waktu dan tanggal WITA
        $date = new DateTime('now', new DateTimeZone('Asia/Makassar')); // WITA timezone (UTC+8)
        $tanggal = $date->format('d');
        $bulan = $date->format('n');
        $tahun = $date->format('Y');
        $hari = $date->format('l');
        $jam = $date->format('H:i:s');

        // Array for month names in Indonesian
        $namaBulan = [
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];

        // Array for day names in Indonesian
        $namaHari = [
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
        ];

        // Set properti tanggal dan waktu
        $this->tanggalLengkap = $namaHari[$hari] . ', ' . $tanggal . ' ' . $namaBulan[$bulan] . ' ' . $tahun;
        $this->jamSekarang = $jam . ' WITA';
    }

    public function MailsView()
    {
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }

        $data['dataEmail'] = $this->emailModel->getdata();
        $data['dataDeadlineLomba'] = $this->deadlineTugasModel->getdata();
        $data['unreadEmailCount'] = $this->emailModel->where('read_status', 'unread')->countAllResults();

        $header['title'] = 'Daftar Email';
        echo view('juri/header', $header);
        echo view('azia/top_menu', $data);
        echo view('azia/side_menu', $data);
        echo view('admin/daftar_email', $data);
        echo view('juri/footer');
    }


    public function sendEmail()
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required',
            'email' => 'required|valid_email',
            'subject' => 'required',
            'message' => 'required',
            'tgl' => 'required',
            'jam' => 'required',
        ]);

        // Cek apakah validasi gagal
        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON(['success' => false, 'error' => $validation->getErrors()]);
        }

        // Ambil data dari form
        $name = esc($this->request->getPost('name'));
        $email = esc($this->request->getPost('email'));
        $subject = esc($this->request->getPost('subject'));
        $message = esc($this->request->getPost('message'));
        $tgl = esc($this->request->getPost('tgl'));
        $jam = esc($this->request->getPost('jam'));

        // Cek apakah sudah ada data dengan kombinasi email, message, tgl, dan jam
        $existingEmail = $this->emailModel
            ->where('email', $email)
            ->where('message', $message)
            ->where('tgl', $tgl)
            ->where('jam', $jam)
            ->first();

        // Jika sudah ada, jangan insert lagi
        if ($existingEmail) {
            return $this->response->setJSON(['success' => true, 'message' => 'This message has already been sent.']);
        }

        // Set layanan email
        $emailService = \Config\Services::email();
        $emailService->setTo('mkhairin04@gmail.com');
        $emailService->setFrom($email, $name);
        $emailService->setReplyTo($email, $name);
        $emailService->setSubject($subject);
        $emailService->setMessage($message);

        // Kirim email
        if ($emailService->send()) {
            // Simpan data email ke database
            $this->emailModel->insert([
                'name' => $name,
                'email' => $email,
                'subject' => $subject,
                'message' => $message,
                'status' => 'sent',
                'tgl' => $tgl,
                'jam' => $jam,
                'read_status' => 'unread',
            ]);

            return $this->response->setJSON(['success' => true, 'message' => 'Email berhasil dikirim!']);
        } else {
            // Jika gagal kirim email, tampilkan error
            $error = $emailService->printDebugger(['headers', 'body']);
            log_message('error', 'Email gagal dikirim. Error: ' . $error);

            return $this->response->setJSON(['success' => false, 'error' => 'Gagal mengirim email. Silakan coba lagi.']);
        }
    }



    public function update($id)
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'read_status' => 'required'
        ]);

        // Cek apakah validasi gagal
        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        // Ambil data dari form
        $read_status = esc($this->request->getPost('read_status'));


        $data = [
            'read_status' => $read_status
        ];

        try {
            if ($this->emailModel->update($id, $data)) {
                session()->setFlashdata('success', 'Status Berhasil Diubah!');
                return redirect()->to('/email/list');
            } else {
                session()->setFlashdata('error', 'Status Gagal Diubah!');
                return redirect()->back()->withInput();
            }
        } catch (Exception $e) {
            session()->setFlashdata('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }



    public function delete($id)
    {
        // Check if user is admin
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin_panel')->with('error', 'You must be an admin to access this page.');
        }

        try {
            if ($this->emailModel->delete($id)) {
                session()->setFlashdata('success', 'Email berhasil dihapus!');
            } else {
                throw new Exception('Gagal menghapus email.');
            }
        } catch (Exception $e) {
            session()->setFlashdata('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }

        return redirect()->to('/email/list');
    }
}
