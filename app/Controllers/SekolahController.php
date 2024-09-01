<?

namespace App\Controllers;

class SekolahController extends BaseController
{


    public function index()
    {
        $header['title'] = 'Daftar Sekolah';
        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('daftar_sekolah');
        echo view('partial/footer');
    }

    public function insert()
    {

        $Model = new \App\Models\SekolahModel();
        $data = [
            'id_sekolah' => $this->request->getPost("id"),
            'nama_sekolah' => $this->request->getPost("nama_sekolah"),
            'alamat' => $this->request->getPost("alamat"),
        ];

        if ($Model->insertData($data)) {
            session()->setFlashdata('success', 'Data Berhasil Ditambahkan!');
            return redirect()->to('/daftar-sekolah');
        } else {
            return redirect()->to('/admin');
        }
    }
}
