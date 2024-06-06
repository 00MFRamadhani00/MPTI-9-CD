<?php

namespace App\Database\Seeds;

use App\Models\CriteriaModel;
use CodeIgniter\Database\Seeder;

class CriteriaSeed extends Seeder
{
    public function run()
    {
        $kriteria = new CriteriaModel();

        $kriteria->save([
            'nama'          =>  'Pengalaman Kerja',
            'bobot'         =>  0.2
        ]);
        $kriteria->save([
            'nama'          =>  'Pendidikan',
            'bobot'         =>  0.15
        ]);
        $kriteria->save([
            'nama'          =>  'Keterampilan Komunikasi',
            'bobot'         =>  0.15
        ]);
        $kriteria->save([
            'nama'          =>  'Keterampilan Manajerial',
            'bobot'         =>  0.15
        ]);
        $kriteria->save([
            'nama'          =>  'Keterampilan Teknis',
            'bobot'         =>  0.1
        ]);
        $kriteria->save([
            'nama'          =>  'Keterampilan Analitis',
            'bobot'         =>  0.1
        ]);
        $kriteria->save([
            'nama'          =>  'Ketepatan Waktu',
            'bobot'         =>  0.1
        ]);
        $kriteria->save([
            'nama'          =>  'Kinerja',
            'bobot'         =>  0.05
        ]);
    }
}
