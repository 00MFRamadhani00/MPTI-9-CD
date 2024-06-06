<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Criteria extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_kriteria' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'bobot' => [
                'type' => 'FLOAT',
                'constraint' => 5,
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true, true);
        $this->forge->createTable('kriteria');
    }

    public function down()
    {
        $this->forge->dropTable('kriteria', true);
    }
}
