<?php

require_once __DIR__ . '/../models/Pendaftar.php';
require_once __DIR__ . '/../models/OrangTua.php';

class FormulirController {

    // HALAMAN FORMULIR
    public function index() {
        if (!isset($_SESSION["user_id"])) {
            header("Location: /login");
            exit;
        }

        $user_id   = $_SESSION["user_id"];
        $pendaftar = new Pendaftar();
        $ortu      = new OrangTua();

        // ambil data siswa
        $siswa = $pendaftar->getFormDataByUserId($user_id);
        $id_pendaftar = $siswa['id_pendaftar'] ?? 0;

        // ambil data orang tua & wali
        $ortuData = $id_pendaftar ? $ortu->getOrtuByPendaftar($id_pendaftar) : [];
        $waliData = $id_pendaftar ? $ortu->getWaliByPendaftar($id_pendaftar) : null;

        $data = [
            "siswa" => $siswa,
            "ortu"  => $ortuData,
            "wali"  => $waliData
        ];

        extract($data);

        ob_start();
        require __DIR__ . '/../views/siswa/formulir.php';
        $content = ob_get_clean();

        require __DIR__ . '/../views/siswa/layout_siswa.php';
    }

    //  SIMPAN FORMULIR
    public function simpan() {
        if (!isset($_SESSION["user_id"])) {
            header("Location: /login");
            exit;
        }

        if (!isset($_POST["save"])) {
            header("Location: /siswa/formulir");
            exit;
        }

        $user_id   = $_SESSION["user_id"];
        $pendaftar = new Pendaftar();
        $ortu      = new OrangTua();

        //  SIMPAN DATA SISWA 
        if ($_POST["save"] === "siswa") {

            $data = [
    'nama_lengkap' => trim($_POST['nama_lengkap'] ?? ''),
    'nisn'         => trim($_POST['nisn'] ?? ''),
    'asal_sekolah' => trim($_POST['asal_sekolah'] ?? '')
];

// VALIDASI NISN
if (!preg_match('/^[0-9]{10}$/', $data['nisn'])) {
    die("NISN harus 10 digit angka");
}

$pendaftar->saveSiswa($user_id, $data);


            header("Location: /siswa/formulir?tab=siswa&saved=1");
            exit;
        }

        // AMBIL ID PENDAFTAR (WAJIB ANGKA) 
        $dataSiswa = $pendaftar->getFormDataByUserId($user_id);
        $id_pendaftar = $dataSiswa['id_pendaftar'] ?? 0;

        if ($id_pendaftar == 0) {
            header("Location: /siswa/formulir?tab=siswa&error=lengkapi_data_siswa");
            exit;
        }

        //  SIMPAN DATA ORANG TUA 
        if ($_POST["save"] === "ortu") {

            $ortu->saveAyah($id_pendaftar, $_POST);
            $ortu->saveIbu($id_pendaftar, $_POST);

            // status hanya LENGKAP, verifikasi oleh admin
            $pendaftar->updateStatusData($id_pendaftar, "lengkap");

            header("Location: /siswa/formulir?tab=ortu&saved=1");
            exit;
        }

        //  SIMPAN DATA WALI 
        if ($_POST["save"] === "wali") {

            $ortu->saveWali($id_pendaftar, $_POST);

            $pendaftar->updateStatusData($id_pendaftar, "lengkap");

            header("Location: /siswa/formulir?tab=wali&saved=1");
            exit;
        }

        // fallback
        header("Location: /siswa/formulir");
        exit;
    }

    //  CETAK FORMULIR 
    public function cetak() {
        if (!isset($_SESSION["user_id"])) {
            header("Location: /login");
            exit;
        }

        $user_id   = $_SESSION["user_id"];
        $pendaftar = new Pendaftar();
        $ortu      = new OrangTua();

        $siswa = $pendaftar->getFormDataByUserId($user_id);
        $id_pendaftar = $siswa['id_pendaftar'] ?? 0;

        if ($id_pendaftar == 0) {
            header("Location: /siswa/formulir");
            exit;
        }

        $data = [
            "siswa" => $siswa,
            "ortu"  => $ortu->getOrtuByPendaftar($id_pendaftar),
            "wali"  => $ortu->getWaliByPendaftar($id_pendaftar)
        ];

        extract($data);

        require __DIR__ . '/../views/siswa/cetak_formulir.php';
    }
}
