<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PetugasModel;

class AuthPetugas extends BaseController
{
    protected $petugasModel;
    protected $session;
    protected $validation;

    public function __construct()
    {
        //membuat user model untuk konek ke database 
        $this->petugasModel = new PetugasModel();
        
        //meload validation
        $this->validation = \Config\Services::validation();
        
        //meload session
        $this->session = \Config\Services::session();
    }

    public function loginpetugas()
    {
        return view('auth/loginpetugas');
    }

    
    public function valid_login()
    {
        //ambil data dari form
        $data = $this->request->getPost();
        
        //ambil data user di database yang usernamenya sama 
        $user = $this->petugasModel->where('username', $data['username'])->first();
        
        //cek apakah username ditemukan
        if($user){
            //cek password
            //jika salah arahkan lagi ke halaman login
            if($user['password'] != md5($data['password'])){
                session()->setFlashdata('password', 'Password salah');
                return redirect()->to('/auth/loginpetugas');
            }
            else {

                if($user['level'] == "petugas") {
                    $this->session->set([
                        'isLoginPetugas' => true,
                        'id_petugas' => $user['id_petugas'],
                        'username' => $user['username'],
                    ]);
                    //arahkan ke halaman admin
                    return redirect()->to('/petugas');
                }
                elseif($user['level'] == "admin") {
                    $this->session->set([
                        'isLoginPetugas' => true,
                        'id_petugas' => $user['id_petugas'],
                        'username' => $user['username'],
                    ]);
                    //arahkan ke halaman admin
                    return redirect()->to('/admin');
                }
            }
        
        }
        else
        {
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