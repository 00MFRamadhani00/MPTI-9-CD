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
            'nama_kriteria'          =>  'Pengalaman Kerja',
            'bobot'         =>  0.2
        ]);
        $kriteria->save([
            'nama_kriteria'          =>  'Pendidikan',
            'bobot'         =>  0.15
        ]);
        $kriteria->save([
            'nama_kriteria'          =>  'Keterampilan Komunikasi',
            'bobot'         =>  0.15
        ]);
        $kriteria->save([
            'nama_kriteria'          =>  'Keterampilan Manajerial',
            'bobot'         =>  0.15
        ]);
        $kriteria->save([
            'nama_kriteria'          =>  'Keterampilan Teknis',
            'bobot'         =>  0.1
        ]);
        $kriteria->save([
            'nama_kriteria'          =>  'Keterampilan Analitis',
            'bobot'         =>  0.1
        ]);
        $kriteria->save([
            'nama_kriteria'          =>  'Ketepatan Waktu',
            'bobot'         =>  0.1
        ]);
        $kriteria->save([
            'nama_kriteria'          =>  'Kinerja',
            'bobot'         =>  0.05
        ]);
    }
}
