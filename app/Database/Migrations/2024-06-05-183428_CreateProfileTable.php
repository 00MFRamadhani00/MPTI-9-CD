<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProfileTable extends Migration
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
            'nama_lengkap' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'pendidikan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
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
        $this->forge->createTable('profil_karyawan');
    }

    public function down()
    {
        $this->forge->dropTable('profil_karyawan', true);
    }
}
