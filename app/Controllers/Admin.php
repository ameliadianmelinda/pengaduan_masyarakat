<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\MasyarakatModel;
use App\Models\PengaduanModel;
use App\Models\PetugasModel;
use App\Models\TanggapanModel;
use Config\Services;

class Admin extends BaseController
{
    protected $masyarakatModel;
    protected $pengaduanModel;
    protected $tanggapanModel;
    protected $petugasModel;
    protected $validation;

    public function __construct()
    {
        $this->masyarakatModel = new MasyarakatModel();
        $this->pengaduanModel = new PengaduanModel();
        $this->petugasModel = new PetugasModel();
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

        return view('admin/dashboard', $data);
    }

    public function managementMasyarakat()
    {
        $masyarakat = $this->masyarakatModel->findAll();
        $data = [
            'title' => 'Data Masyarakat',
            'masyarakat' => $masyarakat
        ];

        return view('admin/managementmasyarakat', $data);
    }

    public function editMasyarakat($id)
    {
        $data = [
            'title' => 'Edit Data Masyarakat',
            'validation' => \Config\Services::validation(),
            'masyarakat' => $this->masyarakatModel->getMasyarakat($id)
        ];

        return view('admin/editmasyarakat', $data);
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
        return redirect()->to('/admin/managementmasyarakat');
    }

    public function deleteMasyarakat($id)
    {
        $this->masyarakatModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/admin/managementmasyarakat');
    }

    public function defaultpassMasyarakat($id)
    {
        $default = 'default123';
        $this->masyarakatModel->save([
            "id_masyarakat" => $id,
            "password" => md5($default),
        ]);

        session()->setFlashdata('pesan', 'Password berhasil diubah ke default');
        return redirect()->to('/admin/managementmasyarakat');
    }

    public function managementPetugas()
    {
        $petugas = $this->petugasModel->findAll();
        $data = [
            'title' => 'Data Petugas',
            'petugas' => $petugas
        ];

        return view('admin/managementpetugas', $data);
    }

    public function editPetugas($id)
    {
        $data = [
            'title' => 'Edit Data Petugas',
            'validation' => \Config\Services::validation(),
            'petugas' => $this->petugasModel->getPetugas($id)
        ];

        return view('admin/editpetugas', $data);
    }

    public function updatePetugas($id)
    {
        if (!$this->validate([
            'nama_petugas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama petugas harus diisi'
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
            ],
            'level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Level harus diisi'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            session()->setFlashdata('vall', $validation->listErrors());

            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $this->petugasModel->save([
            "id_petugas" => $id,
            "nama_petugas" => $this->request->getVar('nama_petugas'),
            "username" => $this->request->getVar('username'),
            "telepon" => $this->request->getVar('telepon'),
            "level" => $this->request->getVar('level'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diedit.');
        return redirect()->to('/admin/managementpetugas');
    }

    public function deletePetugas($id)
    {
        $this->petugasModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/admin/managementpetugas');
    }

    public function tambahPetugas()
    {
        // Load the validation service
        $validation = \Config\Services::validation();

        $data = [
            'validation' => $validation,
            'title' => 'Tambah Petugas',
        ];

        // Set validation as a property of the class
        $this->validation = $validation;

        return view('admin/tambahpetugas', $data);
    }

    public function savePetugas()
    {
        // Tangkap data dari form
        $data = $this->request->getPost();

        // Initialize the validation service
        $validation = Services::validation();

        // Jalankan validasi
        $validation->run($data, 'tambah_petugas');

        // Cek errornya
        $errors = $validation->getErrors();

        if ($errors) {
            session()->setFlashdata('nama_petugas', $validation->getError('nama_petugas'));
            session()->setFlashdata('username', $validation->getError('username'));
            session()->setFlashdata('password', $validation->getError('password'));
            session()->setFlashdata('confirm', $validation->getError('confirm'));
            session()->setFlashdata('telepon', $validation->getError('telepon'));
            return redirect()->to('/admin/tambahpetugas');
        }

        $hashedpass = md5($data['password']);
        $this->petugasModel->save([
            'nama_petugas' => $data['nama_petugas'],
            'username' => $data['username'],
            'password' => $hashedpass,
            'telepon' => $data['telepon'],
            'level' => $data['level'],
        ]);

        session()->setFlashdata('pesan', 'Berhasil menambahkan data petugas');
        return redirect()->to('/admin/managementpetugas');
    }

    
    public function defaultpassPetugas($id)
    {
        $default = 'default123';
        $this->petugasModel->save([
            "id_petugas" => $id,
            "password" => md5($default),
        ]);

        session()->setFlashdata('pesan', 'Password berhasil diubah ke default');
        return redirect()->to('/admin/managementpetugas');
    }


    public function validasi()
    {
        $pengaduan = $this->pengaduanModel->findAll();
        $data = [
            'title' => 'Data Masyarakat',
            'pengaduan' => $pengaduan
        ];

        return view('admin/validasi', $data);
    }

    public function updatevalidasi($id)
    {
        $tervalidasi = '1';
        $this->pengaduanModel->save([
            'id_pengaduan' => $id,
            'status' => $tervalidasi,

        ]);
        session()->setFlashdata('pesan', 'Data berhasil divalidasi.');
        return redirect()->to('/admin/validasi');
    }

    public function tolak($id)
    {
        $ditolak = '3';
        $this->pengaduanModel->save([
            'id_pengaduan' => $id,
            "status" => $ditolak,

        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditolak.');
        return redirect()->to('/admin/validasi');
    }

    public function detailLaporan($id)
    {
        $data = [
            'title' => 'Detail Laporan',
            'pengaduan' => $this->pengaduanModel->getPengaduan($id),
            'tanggapan' => $this->tanggapanModel->getTanggapan($id),
        ];

        return view('admin/detaillaporan', $data);
    }
}
