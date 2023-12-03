<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tanggapan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_tanggapan' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_pengaduan'  => [
                'type'  => 'INT',
                'constraint' => 10,
            ],
            'tanggal_tanggapan' => [
                'type' => 'DATETIME',
            ],
            'tanggapan' => [
                'type' => 'TEXT',
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['0','1','2','3','4'],
            ],
            'id_petugas' => [
                'type' => 'INT',
                'constraint' => 10,
            ],
        ]);
        $this->forge->addKey('id_tanggapan', true);
        $this->forge->createTable('tanggapan');
    }

    public function down()
    {
        //
    }
}
