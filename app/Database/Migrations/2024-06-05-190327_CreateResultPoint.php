<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateResultPoint extends Migration
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
            'poin_spk' => [
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
        $this->forge->createTable('poin_hasil');
    }

    public function down()
    {
        $this->forge->dropTable('poin_hasil', true);
    }
}
