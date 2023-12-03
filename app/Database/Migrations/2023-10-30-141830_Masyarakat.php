<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Masyarakat extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_masyarakat' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nik' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'telepon' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'salt' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'datetime_created' => [
                'type' => 'DATETIME',
            ],
        ]);
        $this->forge->addKey('id_masyarakat', true);
        $this->forge->createTable('masyarakat');
    }

    public function down()
    {
        //
    }
}
