<?php

namespace App\Models;

use CodeIgniter\Model;

class TanggapanModel extends Model
{
    protected $table      = 'tanggapan';
    protected $useAutoIncrement = true;
    protected $primaryKey = 'id_tanggapan';
    protected $allowedFields = ['id_pengaduan', 'tanggal_tanggapan', 'tanggapan',  'status', 'id_petugas', ];

    public function getTanggapan($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_pengaduan' => $id])->first();
    }
}
