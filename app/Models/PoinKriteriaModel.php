<?php

namespace App\Models;

use CodeIgniter\Model;

class PoinKriteriaModel extends Model
{
    protected $table = 'poin_kriteria';
    protected $primaryKey = 'id';
    protected $allowedFields = ['poin_pengalamankerja', 'poin_pendidikan', 'poin_komunikasi', 'poin_manajerial', 'poin_teknis', 'poin_analitis', 'poin_kinerja', 'poin_ketepatanwaktu', 'id_user'];
}