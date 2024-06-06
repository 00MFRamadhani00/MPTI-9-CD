<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
    public $userModel;
    protected $db, $builder;
    protected $auth, $userId;

    public function __construct() // All Configs, DB, and Models Required
    {
        $this->db      = \Config\Database::connect();
        $this->auth = service('authentication');
        $this->userId = $this->auth->id();
        $this->builder = $this->db->table('users');
        $this->userModel = new UserModel();
    }

    public function index() // Show Dashboard
    {
        $data = [
            'title'     => 'Dashboard',
        ];

        return view('index', $data);
    }

    public function kriteriaList()
    {
        $data = [
            'title'     => 'Daftar Kriteria',
        ];

        return view('criteria_list', $data);
    }

    public function rangkingList()
    {
        $this->builder->select();
        $this->builder->join('profil_karyawan', 'profil_karyawan.id_user = users.id');
        $this->builder->join('poin_hasil', 'poin_hasil.id_user = users.id');
        $query = $this->builder->get();


        $data = [
            'title'     => 'Hasil Rangking',
            'hasil' => $query->getResult(),
        ];

        return view('ranking', $data);
    }
}
