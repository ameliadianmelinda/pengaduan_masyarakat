<?php

namespace App\Models;

use CodeIgniter\Model;

class PengaduanModel extends Model
{
    protected $table            = 'pengaduan';
    protected $primaryKey       = 'id_pengaduan';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['tanggal_pengaduan', 'nik', 'judul_laporan', 'isi_laporan', 'lokasi', 'foto', 'status'];

    // Dates
    protected $useTimestamps = false;
    


    public function getPengaduan($id = false)
    {
        if($id == false){
            return $this->findAll();
        }
        return $this->where(['id_pengaduan' => $id])->first();
    }

    public function update_data($data,$id)
    {
        $query = $this->db->table($this->table)->where('id_pengaduan',$id)->update($data);
        return $query ;
    }

    public function getDataWithTwoConditions($nik)
    {
        // Menggunakan metode where untuk menambahkan dua kondisi
        return $this->where('nik', $nik)
                    ->findAll();
    }
    
}
