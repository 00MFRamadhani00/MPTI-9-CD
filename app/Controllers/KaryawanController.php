<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProfileModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class KaryawanController extends BaseController
{
    protected $db, $builder, $builderprofil;
    public $userModel, $profilModel;
    protected $auth, $userId;

    public function __construct() // All Configs, DB, and Models Required
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->builderprofil = $this->db->table('profil_karyawan');
        $this->userModel = new UserModel();
        $this->profilModel = new ProfileModel();
        $this->auth = service('authentication');
        $this->userId = $this->auth->id();
    }

    public function index()
    {
        $data = [
            'title'     => 'Dasbor karyawan',
        ];

        return view('index', $data);
    }

    public function profile() // Show Profile Detail and Form to Edit Profile
    {
        $this->builder->select('*, profil_karyawan.id as idprofil');
        $this->builder->where('id_user', $this->userId);
        $this->builder->join('profil_karyawan', 'profil_karyawan.id_user = users.id');
        $query = $this->builder->get();

        $data = [
            'profil'    => $query->getResult(),
            'title'     => 'Profil Karyawan',
        ];

        return view('karyawan/profile', $data);
    }

    public function createProfile() // Show Form to Create Profile
    {
        $this->builderprofil->select();
        $this->builderprofil->where('id_user', $this->userId);
        $query = $this->builderprofil->get();

        if ($query->getNumRows() > 0) {
            return redirect()->back();
        }

        $data = [
            'title'     => 'Buat Profil',
        ];

        return view('karyawan/create_profile', $data);
    }

    public function saveProfile() // Fetch Data from Form to Create Profile
    {
        $this->profilModel->save([
            'id_user' => $this->userId,
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'pendidikan' => $this->request->getVar('pendidikan'),
            'alamat' => $this->request->getVar('alamat'),
        ]);

        return redirect()->to(base_url('/'));
    }
}
