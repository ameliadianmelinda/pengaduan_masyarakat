<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MasyarakatModel;

class Auth extends BaseController
{
    protected $masyarakatModel;
    protected $session;
    protected $validation;

    public function __construct()
    {
        //membuat user model untuk konek ke database 
        $this->masyarakatModel = new MasyarakatModel();
        
        //meload validation
        $this->validation = \Config\Services::validation();
        
        //meload session
        $this->session = \Config\Services::session();
    }

    public function home()
    {
        return view('homepage');
    }


    public function loginmasyarakat()
    {
        return view('auth/loginmasyarakat');
    }


    public function register()
    {
        return view('auth/register');
    }


    public function valid_register()
    {
        // Tangkap data dari form
        $data = $this->request->getPost();

        // Jalankan validasi
        if (!$this->validation->run($data, 'register')) {
            // Jika ada error kembalikan ke halaman register
            session()->setFlashdata('error', $this->validation->getErrors());
            return redirect()->to('/auth/register');
        }

        // Hash password dengan salt (opsional)
        $password = md5($data['password']);

        // Masukkan data ke database
        $this->masyarakatModel->save([
            'nik' => $data['nik'],
            'username' => $data['username'],
            'password' => $password,
            'date_created' => date('Y-m-d'),
            'telepon' => $data['telp'],     
        ]);

        // Arahkan ke halaman login
        session()->setFlashdata('login', 'Anda berhasil mendaftar, silahkan login');
        return redirect()->to('/auth/loginmasyarakat');
    }

    
    public function valid_login()
    {
        //ambil data dari form
        $data = $this->request->getPost();
        
        //ambil data user di database yang usernamenya sama 
        $user = $this->masyarakatModel->where('username', $data['username'])->first();
        
        //cek apakah username ditemukan
        if($user){
            if($user['password'] != md5($data['password'])){
                session()->setFlashdata('password', 'Password salah');
                return redirect()->to('/auth/loginmasyarakat');
            }
            else {
                
                    $this->session->set([
                        'isLogin' => true,
                        'id_masyarakat' => $user['id_masyarakat'],
                        'username' => $user['username'],
                        'password' => $user['password'],
                        'nik' => $user['nik'],
                    ]);
                    //arahkan ke halaman admin
                    return redirect()->to('/masyarakat');
                
            }
        }
        else{
            //jika username tidak ditemukan, balikkan ke halaman login
            session()->setFlashdata('username', 'Username tidak ditemukan');
            return redirect()->to('/auth/loginmasyarakat');
        }
    }
    

    public function logout()
    {
        //hancurkan session 
        //balikan ke halaman login
        $this->session->destroy();
        return redirect()->to('/auth/loginmasyarakat');
    }
    
}