<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCriteriaPointTable extends Migration
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
            'poin_pengalamankerja' => [
                'type' => 'FLOAT',
                'constraint' => 5,
                'null' => true,
            ],
            'poin_pendidikan' => [
                'type' => 'FLOAT',
                'constraint' => 5,
                'null' => true,
            ],
            'poin_komunikasi' => [
                'type' => 'FLOAT',
                'constraint' => 5,
                'null' => true,
            ],
            'poin_manajerial' => [
                'type' => 'FLOAT',
                'constraint' => 5,
                'null' => true,
            ],
            'poin_teknis' => [
                'type' => 'FLOAT',
                'constraint' => 5,
                'null' => true,
            ],
            'poin_analitis' => [
                'type' => 'FLOAT',
                'constraint' => 5,
                'null' => true,
            ],
            'poin_kinerja' => [
                'type' => 'FLOAT',
                'constraint' => 5,
                'null' => true,
            ],
            'poin_ketepatanwaktu' => [
                'type' => 'FLOAT',
                'constraint' => 5,
                'null' => true,
            ],
            'id_user'=> [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'created_at'=> [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at'=> [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true, true);
        $this->forge->addForeignKey('id_user','users','id','CASCADE', 'CASCADE');
        $this->forge->createTable('poin_kriteria');
    }

    public function down()
    {
        $this->forge->dropTable('poin_kriteria', true);
    }
}
