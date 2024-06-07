<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\CriteriaPointModel;
use App\Models\ResultPointModel;
use CodeIgniter\HTTP\ResponseInterface;

class AdminController extends BaseController
{
    protected $db, $builder, $builderCrit, $builderProf;
    public $userModel, $poinKriteriaModel, $poinHasilModel;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->builderCrit = $this->db->table('kriteria');
        $this->builderProf = $this->db->table('profil_karyawan');
        $this->userModel = new UserModel();
        $this->poinKriteriaModel = new CriteriaPointModel();
        $this->poinHasilModel = new ResultPointModel();
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
        $this->builderProf->select();
        $query = $this->builderProf->get();

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
        $pengalamanKerja = $this->request->getPost('pengalaman_kerja');
        $pendidikan = $this->request->getPost('pendidikan');
        $keterampilanKomunikasi = $this->request->getPost('keterampilan_komunikasi');
        $keterampilanManajerial = $this->request->getPost('keterampilan_manajerial');
        $keterampilanTeknis = $this->request->getPost('keterampilan_teknis');
        $keterampilanAnalitis = $this->request->getPost('keterampilan_analitis');
        $ketepatanWaktu = $this->request->getPost('ketepatan_waktu');
        $kinerja = $this->request->getPost('kinerja');

        foreach ($karyawan as $index => $karyawanId) {
            $dataKriteria = [
                'id_user' => $karyawanId,
                'poin_pengalamankerja' => $pengalamanKerja[$index],
                'poin_pendidikan' => $pendidikan[$index],
                'poin_komunikasi' => $keterampilanKomunikasi[$index],
                'poin_manajerial' => $keterampilanManajerial[$index],
                'poin_teknis' => $keterampilanTeknis[$index],
                'poin_analitis' => $keterampilanAnalitis[$index],
                'poin_ketepatanwaktu' => $ketepatanWaktu[$index],
                'poin_kinerja' => $kinerja[$index],
            ];
            $this->poinKriteriaModel->insert($dataKriteria);
        }

        // Ambil bobot dari database
        $querycrit = $this->builderCrit->get();
        $bobot = [];
        foreach ($querycrit->getResult() as $criterion) {
            $bobot[] = $criterion->bobot;
        }

        // Ambil data poin kriteria dari database
        $poinKriteria = $this->poinKriteriaModel->findAll();
        $dataKaryawan = [];
        foreach ($poinKriteria as $poin) {
            $dataKaryawan[$poin['id_user']] = [
                $poin['poin_pengalamankerja'],
                $poin['poin_pendidikan'],
                $poin['poin_komunikasi'],
                $poin['poin_manajerial'],
                $poin['poin_teknis'],
                $poin['poin_analitis'],
                $poin['poin_ketepatanwaktu'],
                $poin['poin_kinerja']
            ];
        }

        // // Gabungkan poin kriteria untuk setiap karyawan
        // $dataKaryawan = [];
        // foreach ($karyawan as $index => $karyawanId) {
        //     foreach ($criteriaKeys as $key) {
        //         $dataKaryawan[$karyawanId][] = $kriteriaData[$key][$index];
        //     }
        // }

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

        // Pilih karyawan dengan nilai preferensi tertinggi
        $karyawanTerpilih = array_search(max($nilaiPreferensi), $nilaiPreferensi);
        $hasilPoinKalkulasi = $nilaiPreferensi[$karyawanTerpilih];

        // Simpan hasil ke tabel poin_hasil
        foreach ($nilaiPreferensi as $id_user => $poin_spk) {
            $dataHasil = [
                'id_user' => $id_user,
                'poin_spk' => $poin_spk
            ];
            $this->db->table('poin_hasil')->insert($dataHasil);
        }

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
