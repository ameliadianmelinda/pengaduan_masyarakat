<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTimestampsToPetugasTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('petugas', [
            'created_at' => ['type' => 'datetime', 'null' => true],
            'updated_at' => ['type' => 'datetime', 'null' => true],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('petugas', 'created_at');
        $this->forge->dropColumn('petugas', 'updated_at');
    }
}
