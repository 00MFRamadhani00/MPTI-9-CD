<?php

namespace App\Models;

use CodeIgniter\Model;

class PoinHasilModel extends Model
{
    protected $table = 'poin_hasil';
    protected $primaryKey = 'id';
    protected $allowedFields = ['poin_spk', 'id_user'];
}