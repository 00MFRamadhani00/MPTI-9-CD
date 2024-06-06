<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\PoinKriteriaModel;
use App\Models\PoinHasilModel;
use CodeIgniter\HTTP\ResponseInterface;

class AdminController extends BaseController
{
    protected $db, $builder, $builderCrit;
    public $userModel, $poinKriteriaModel, $poinHasilModel;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->builderCrit = $this->db->table('kriteria');
        $this->userModel = new UserModel();
        $this->poinKriteriaModel = new PoinKriteriaModel();
        $this->poinHasilModel = new PoinHasilModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Dasbor Admin',
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
            'title' => 'Daftar Karyawan',
            'users' => $query->getResult(),
        ];

        return view('admin/user_list', $data);
    }

    public function karyawanDetail($id)
    {
        $this->builder->select('*, profil_karyawan.id as idprofil');
        $this->builder->where('id_user', $id);
        $this->builder->join('profil_karyawan', 'profil_karyawan.id_user = users.id');
        $query = $this->builder->get();

        $data = [
            'title' => 'Data Karyawan',
            'profil' => $query->getResult()
        ];

        return view('admin/user_detail', $data);
    }

    public function deleteUser($id)
    {
        $this->builder->where('id', $id);
        $this->builder->delete();
        $result = $this->builder->get();

        if (!$result) {
            return redirect()->to(base_url('/'));
        }

        return redirect()->back();
    }

    public function topsisForm()
    {
        $this->builder->select();
        $this->builder->where('name !=', 'admin');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->join('profil_karyawan', 'profil_karyawan.id_user = users.id');
        $query = $this->builder->get();

        $this->builderCrit->select();
        $querycrit = $this->builderCrit->get();

        $data = [
            'title' => 'Formulir Perhitungan Poin',
            'users' => $query->getResult(),
            'criteria' => $querycrit->getResult(),
        ];

        return view('admin/topsis_form', $data);
    }

    public function calculate()
    {
        // Ambil data dari request
        $karyawan = $this->request->getPost('karyawan');
        $kriteriaData = $this->request->getPost();

        // Ambil bobot dari database
        $querycrit = $this->builderCrit->get();
        $bobot = [];
        $criteriaKeys = [];
        foreach ($querycrit->getResult() as $index => $criterion) {
            $bobot[] = $criterion->bobot;
            $criteriaKeys[] = strtolower(str_replace(' ', '_', $criterion->nama_kriteria));
        }

        // // Debug data untuk memastikan data benar sebelum disimpan
        // echo '<pre>';
        // print_r($criteriaKeys);
        // print_r($kriteriaData);
        // echo '</pre>';
        // exit();

        // Simpan poin kriteria ke dalam database
        foreach ($karyawan as $index => $karyawanId) {
            $dataKriteria = [];
            foreach ($criteriaKeys as $key) {
                if(isset($kriteriaData[$key][$index])) {
                    $dataKriteria[$key] = $kriteriaData[$key][$index];
                } else {
                    $dataKriteria[$key] = null; // atau nilai default lainnya
                }
            }
            $dataKriteria['id_user'] = $karyawanId;
            $this->poinKriteriaModel->insert($dataKriteria);
        }

        // Gabungkan poin kriteria untuk setiap karyawan
        $dataKaryawan = [];
        foreach ($karyawan as $index => $karyawanId) {
            foreach ($criteriaKeys as $key) {
                $dataKaryawan[$karyawanId][] = $kriteriaData[$key][$index];
            }
        }

        // Langkah-langkah perhitungan TOPSIS

        // 1. Normalisasi Matriks
        $normalisasi = [];
        foreach ($dataKaryawan as $id => $nilaiKriteria) {
            foreach ($nilaiKriteria as $i => $nilai) {
                if (!isset($normalisasi[$i])) {
                    $normalisasi[$i] = 0;
                }
                $normalisasi[$i] += pow($nilai, 2);
            }
        }

        foreach ($normalisasi as $i => $nilai) {
            $normalisasi[$i] = sqrt($nilai);
        }

        $matriksNormalisasi = [];
        foreach ($dataKaryawan as $id => $nilaiKriteria) {
            foreach ($nilaiKriteria as $i => $nilai) {
                $matriksNormalisasi[$id][$i] = $nilai / $normalisasi[$i];
            }
        }

        // 2. Normalisasi Ternormalisasi Terbobot
        $matriksTernormalisasiBerbobot = [];
        foreach ($matriksNormalisasi as $id => $nilaiKriteria) {
            foreach ($nilaiKriteria as $i => $nilai) {
                $matriksTernormalisasiBerbobot[$id][$i] = $nilai * $bobot[$i];
            }
        }

        // 3. Solusi Ideal Positif dan Negatif
        $solusiIdealPositif = [];
        $solusiIdealNegatif = [];
        foreach ($matriksTernormalisasiBerbobot as $nilaiKriteria) {
            foreach ($nilaiKriteria as $i => $nilai) {
                if (!isset($solusiIdealPositif[$i]) || $nilai > $solusiIdealPositif[$i]) {
                    $solusiIdealPositif[$i] = $nilai;
                }
                if (!isset($solusiIdealNegatif[$i]) || $nilai < $solusiIdealNegatif[$i]) {
                    $solusiIdealNegatif[$i] = $nilai;
                }
            }
        }

        // 4. Hitung Jarak ke Solusi Ideal Positif dan Negatif
        $jarakPositif = [];
        $jarakNegatif = [];
        foreach ($matriksTernormalisasiBerbobot as $id => $nilaiKriteria) {
            $jarakPositif[$id] = 0;
            $jarakNegatif[$id] = 0;
            foreach ($nilaiKriteria as $i => $nilai) {
                $jarakPositif[$id] += pow($nilai - $solusiIdealPositif[$i], 2);
                $jarakNegatif[$id] += pow($nilai - $solusiIdealNegatif[$i], 2);
            }
            $jarakPositif[$id] = sqrt($jarakPositif[$id]);
            $jarakNegatif[$id] = sqrt($jarakNegatif[$id]);
        }

        // 5. Hitung Nilai Preferensi Relatif
        $nilaiPreferensi = [];
        foreach ($dataKaryawan as $id => $nilaiKriteria) {
            $totalJarak = $jarakPositif[$id] + $jarakNegatif[$id];
            if ($totalJarak == 0) {
                $nilaiPreferensi[$id] = 0; // Atau Anda bisa menangani kasus ini dengan cara lain
            } else {
                $nilaiPreferensi[$id] = $jarakNegatif[$id] / $totalJarak;
            }
        }

        // Simpan hasil perhitungan ke database
        foreach ($nilaiPreferensi as $id => $nilai) {
            $this->poinHasilModel->insert(['poin_spk' => $nilai, 'id_user' => $id]);
        }

        // Pilih karyawan dengan nilai preferensi tertinggi
        $karyawanTerpilih = array_search(max($nilaiPreferensi), $nilaiPreferensi);
        $hasilPoinKalkulasi = $nilaiPreferensi[$karyawanTerpilih];

        // Kirim hasil ke view topsis_result.php
        $data = [
            'title' => 'Hasil TOPSIS',
            'nama_karyawan_terpilih' => $karyawanTerpilih,
            'hasil_poin_kalkulasi' => $hasilPoinKalkulasi
        ];

        return view('admin/topsis_result', $data);
    }

    public function hasilTopsis()
    {
        $this->builder->select('users.username, profil_karyawan.nama_lengkap, poin_hasil.poin_spk');
        $this->builder->join('profil_karyawan', 'profil_karyawan.id_user = users.id');
        $this->builder->join('poin_hasil', 'poin_hasil.id_user = users.id');
        $query = $this->builder->get();

        $data = [
            'title' => 'Tabel Hasil Rangking',
            'hasil' => $query->getResult()
        ];

        return view('admin/topsis_result_table', $data);
    }
}
