<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PengaduanModel;

class Pengaduan extends BaseController
{
    protected $pengaduanModel;
    protected $session;
    protected $validation;

    public function __construct()
    {
        //membuat user model untuk konek ke database 
        $this->pengaduanModel = new PengaduanModel();

        //meload validation
        $this->validation = \Config\Services::validation();

        //meload session
        $this->session = \Config\Services::session();
    }


    public function save()
    {
        // validation
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
                    'required' => 'Isi laporan harus diisi'
                ]
            ],
            'lokasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Lokasi harus diisi',
                ]
            ],
            'foto' => [
                'rules' => 'uploaded[foto]|max_size[foto,10240]',
                'errors' => [
                    'uploaded' => 'File harus ditambahkan',
                    'max_size' => 'Ukuran file harus kurang dari 10MB',
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            session()->setFlashdata('vall', $validation->listErrors());

            return redirect()->back()->withInput();
        }

        // Check if 'nik' is available in the session
        $nik = session('nik');
        if (!$nik) {
            // Handle the case when 'nik' is not available (you might want to redirect to a login page or handle it accordingly)
            return redirect()->to('/auth/loginmasyarakat');
        }

        // ambil gambar
        $fileDokumen = $this->request->getFile('foto');
        $newName = $fileDokumen->getRandomName();
        $fileDokumen->move('foto_storage', $newName);

        // Save the record with 'nik' value
        $this->pengaduanModel->save([
            'judul_laporan' => $this->request->getVar('judul_laporan'),
            'isi_laporan' => $this->request->getVar('isi_laporan'),
            'lokasi' => $this->request->getVar('lokasi'),
            'foto' => $newName,
            'nik' => $nik,
            'tanggal_pengaduan' => date('Y-m-d'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to('/lihatpengaduan/masyarakat');
    }
}
