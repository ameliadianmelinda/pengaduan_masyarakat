<?php

namespace App\Controllers;

use App\Models\PengaduanModel;
use App\Models\TanggapanModel;


class TanggapanPetugas extends BaseController
{
    protected $pengaduanModel;
    protected $tanggapanModel;
    protected $session;
    protected $helper = ['form', 'url'];

    public function __construct()
    {
        $this->session = session();
        $this->pengaduanModel = new PengaduanModel();
        $this->tanggapanModel = new TanggapanModel();
    }


    public function tanggapan($id)
    {
        $data = [
            'title' => 'Beri Tanggapan',
            'pengaduan' => $this->pengaduanModel->getPengaduan($id)
        ];

        return view('petugas/tanggapan', $data);
    }

    public function updatetanggapan($id)
    {
        $petugas = session('id_petugas'); // Ambil id dari session
        $selesai = '2';
        $this->tanggapanModel->save([
            'id_pengaduan' => $id,
            'tanggal_tanggapan' => date('Y-m-d'),
            'tanggapan' => $this->request->getVar('tanggapan'),
            'id_petugas' => $petugas,
            'status' => $selesai,
            
        ]);

        $this->pengaduanModel->save([
            'id_pengaduan' => $id,
            "status" => $selesai,
            
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditanggapi.');
        return redirect()->to('/petugas/validasi');
    }
    
}
