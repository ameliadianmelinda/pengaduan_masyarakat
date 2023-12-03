<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MasyarakatModel;
use App\Models\PengaduanModel;
use App\Models\TanggapanModel;

class Masyarakat extends BaseController
{
    protected $session;
    protected $pengaduanModel;
    protected $masyarakatModel;
    protected $tanggapanModel;

    protected $validation;

    public function __construct()
    {
        $this->session = session();
        $this->pengaduanModel = new PengaduanModel();
        $this->masyarakatModel = new MasyarakatModel();
        $this->tanggapanModel = new TanggapanModel();
    }


    public function dashboard()
    {
        return view('masyarakat/dashboard');
    }

    public function pengaduan()
    {
        return view('masyarakat/pengaduan');
    }

    public function lihatpengaduan()
    {
        $tanggapan = $this->tanggapanModel->findAll();
        $pengaduanModel = new PengaduanModel();
        $nik = session('nik');
        $pengaduan = $pengaduanModel->getDataWithTwoConditions($nik);
        $data = [
            'title' => 'Data Pengaduan',
            'pengaduan' => $pengaduan,
            'tanggapan' => $tanggapan,
        ];

        return view('masyarakat/lihatpengaduan', $data);
    }

    public function editPengaduan($id)
    {
        $data = [
            'title' => 'Edit Pengaduan',
            'validation' => \Config\Services::validation(),
            'pengaduan' => $this->pengaduanModel->getPengaduan($id)
        ];

        return view('masyarakat/editpengaduan', $data);
    }

    public function updatePengaduan($id)
    {
        if (!$this->validate([
            'judul_laporan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul pengaduan harus diisi'
                ]
            ],
            'isi_laporan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Peluhan harus diisi'
                ]
            ],
            'lokasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Lokasi harus diisi'
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            session()->setFlashdata('vall', $validation->listErrors());

            return redirect()->back()->withInput();
        }

        // ambil gambar
        $fileDokumen = $this->request->getFile('foto');
        $newName = $fileDokumen->getRandomName();
        $fileDokumen->move('foto_storage', $newName);


        $data = array(
            "id_pengaduan" => $id,
            "judul_laporan" => $this->request->getVar('judul_laporan'),
            "isi_laporan" => $this->request->getVar('isi_laporan'),
            "lokasi" => $this->request->getVar('lokasi'),
            "foto" => $newName,
        );
        $this->pengaduanModel->update_data($data, $id);
        session()->setFlashdata('pesan', 'Data berhasil diedit.');
        return redirect()->to('/lihatpengaduan/masyarakat');
    }

    public function deletePengaduan($id)
    {
        $this->pengaduanModel->delete($id);
        session()->setFlashdata('pesan', 'Pengaduan berhasil dihapus.');
        return redirect()->to('/lihatpengaduan/masyarakat');
    }


    public function lihattanggapan($id)
    {
        $data = [
            'title' => 'Edit Data Kelahiran',
            'validation' => \Config\Services::validation(),
            'tanggapan' => $this->tanggapanModel->getTanggapan($id)
        ];

        $data = $this->tanggapanModel->table('tanggapan')
            ->where('id_pengaduan', $id)
            ->get()
            ->getResult();


        return view('masyarakat/tanggapan', ['data' => $data]);
    }

}
