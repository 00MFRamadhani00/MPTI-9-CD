<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class AdminController extends BaseController
{
    protected $db, $builder;
    public $userModel;

    public function __construct() // All Configs, DB, and Models Required
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title'     => 'Dasbor Admin',
        ];

        return view('index', $data);
    }

    public function karyawanList()
    {
        $this->builder->select('users.id as userid, username, email, name');
        $this->builder->where('name !=', 'admin');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $this->builder->get();


        $data = [
            'title'     => 'Daftar Karyawan',
            'users' => $query->getResult(),
        ];

        return view('admin/user_list', $data);
    }

    public function karyawanDetail($id) // Show User's Individual Details
    {
        $this->builder->select('*, profil_karyawan.id as idprofil');
        $this->builder->where('id_user', $id);
        $this->builder->join('profil_karyawan', 'profil_karyawan.id_user = users.id');
        $query = $this->builder->get();

        $data = [
            'title'     => 'Data Karyawan',
            'profil'    => $query->getResult()
        ];

        return view('admin/user_detail', $data);
    }

    public function deleteUser($id) // Delete Registered User
    {
        $this->builder->where('id', $id);
        $this->builder->delete();
        $result = $this->builder->get();

        if (!$result) {
            return redirect()->to(base_url('/'));
        }

        return redirect()->back();
    }
}
