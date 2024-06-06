<?php

namespace App\Database\Seeds;

use App\Models\AuthGroupsModel;
use CodeIgniter\Database\Seeder;

class AuthGroupsSeeder extends Seeder
{
    public function run()
    {
        $auth_groups = new AuthGroupsModel();

        $auth_groups->save([
            'name'          =>  'admin',
            'description'   =>  'Site Administrator'
        ]);
        $auth_groups->save([
            'name'          =>  'karyawan',
            'description'   =>  'Regular User'
        ]);
    }
}
