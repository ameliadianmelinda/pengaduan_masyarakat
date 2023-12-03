<?php

namespace App\Models;

use CodeIgniter\Model;

class MasyarakatModel extends Model
{
    protected $table            = 'masyarakat';
    protected $primaryKey       = 'id_masyarakat';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nik', 'username', 'password', 'telepon', 'date_created'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'date_created';


    public function getMasyarakat($id = false)
    {
        if($id == false){
            return $this->findAll();
        }
        return $this->where(['id_masyarakat' => $id])->first();
    }
    
}
