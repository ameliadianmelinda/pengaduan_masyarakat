<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\MasyarakatModel;
use App\Models\PengaduanModel;
use App\Models\TanggapanModel;

class Petugas extends BaseController
{
    protected $masyarakatModel;
    protected $pengaduanModel;
    protected $tanggapanModel;

    public function __construct()
    {
        $this->masyarakatModel = new MasyarakatModel();
        $this->pengaduanModel = new PengaduanModel();
        $this->tanggapanModel = new TanggapanModel();
    }


    public function dashboard()
    {
        $tanggal = date('Y-m-d');
        $pengaduan = $this->pengaduanModel->where('tanggal_pengaduan', $tanggal)->findAll();
        $jumlah = $this->pengaduanModel->countAll();
        $jumlahBelumValidasi = $this->pengaduanModel->where('status', '1')->countAllResults();
        $jumlahSudahValidasi = $this->pengaduanModel->where('status', '2')->countAllResults();
        $tolak = $this->pengaduanModel->where('status', '3')->countAllResults();
        $data = [
            'title' => 'Halaman Dashboard',
            'jumlah' => $jumlah,
            'jumlahBelumValidasi' => $jumlahBelumValidasi,
            'jumlahSudahValidasi' => $jumlahSudahValidasi,
            'tolak' => $tolak,
            'pengaduan' => $pengaduan,
        ];

        return view('petugas/dashboard', $data);
    }

    public function management()
    {
        $masyarakat = $this->masyarakatModel->findAll();
        $data = [
            'title' => 'Data Masyarakat',
            'masyarakat' => $masyarakat
        ];

        return view('petugas/managementmasyarakat', $data);
    }

    public function editmanagement($id)
    {
        $data = [
            'title' => 'Edit Data Masyarakat',
            'validation' => \Config\Services::validation(),
            'masyarakat' => $this->masyarakatModel->getMasyarakat($id)
        ];

        return view('petugas/editmasyarakat', $data);
    }

    public function updateMasyarakat($id)
    {
        if (!$this->validate([
            'nik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'NIK harus diisi'
                ]
            ],
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username harus diisi'
                ]
            ],
            'telepon' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Telepon harus diisi'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            session()->setFlashdata('vall', $validation->listErrors());

            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $this->masyarakatModel->save([
            "id_masyarakat" => $id,
            "nik" => $this->request->getVar('nik'),
            "username" => $this->request->getVar('username'),
            "telepon" => $this->request->getVar('telepon'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diedit.');
        return redirect()->to('/petugas/management');
    }

    public function deleteMasyarakat($id)
    {
        $this->masyarakatModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/petugas/management');
    }

    public function defaultpass($id)
    {
        $default = 'default123';
        $this->masyarakatModel->save([
            "id_masyarakat" => $id,
            "password" => md5($default),
        ]);

        session()->setFlashdata('pesan', 'Password berhasil diubah ke default');
        return redirect()->to('/petugas/management');
    }

    public function validasi()
    {
        $pengaduan = $this->pengaduanModel->findAll();
        $data = [
            'title' => 'Data Masyarakat',
            'pengaduan' => $pengaduan
        ];

        return view('petugas/validasi', $data);
    }

    public function updatevalidasi($id)
    {
        $tervalidasi = '1';
        $this->pengaduanModel->save([
            'id_pengaduan' => $id,
            'status' => $tervalidasi,
            
        ]);
        session()->setFlashdata('pesan', 'Data berhasil divalidasi.');
        return redirect()->to('/petugas/validasi');
    }

    public function tolak($id)
    {
        $ditolak = '3';
        $this->pengaduanModel->save([
            'id_pengaduan' => $id,
            "status" => $ditolak,
            
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditolak.');
        return redirect()->to('/petugas/validasi');
    }

    public function detailLaporan($id)
    {
        $data = [
            'title' => 'Detail Laporan',
            'pengaduan' => $this->pengaduanModel->getPengaduan($id),
            'tanggapan' => $this->tanggapanModel->getTanggapan($id),
        ];

        return view('petugas/detaillaporan', $data);
    }

}
