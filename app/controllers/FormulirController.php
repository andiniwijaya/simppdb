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
        $pendaftar = new Pendaftar;
        $ortu      = new OrangTua;

        // ambil data untuk mode EDIT
        $siswa = $pendaftar->getFormDataByUserId($user_id);

        $id_pendaftar = $siswa ? $siswa['id_pendaftar'] : 0;

        $data = [
            "siswa" => $siswa,
            "ortu"  => $id_pendaftar ? $ortu->getOrtuByPendaftar($id_pendaftar) : null,
            "wali"  => $id_pendaftar ? $ortu->getWaliByPendaftar($id_pendaftar) : null
        ];

        extract($data);

        ob_start();
        require __DIR__ . '/../views/siswa/formulir.php';
        $content = ob_get_clean();

        require __DIR__ . '/../views/siswa/layout_siswa.php';
    }

    // SIMPAN FORMULIR
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
        $pendaftar = new Pendaftar;
        $ortu      = new OrangTua;

        // SIMPAN DATA SISWA
        if ($_POST["save"] === "siswa") {

            $pendaftar->saveSiswa($user_id, $_POST);

            header("Location: /siswa/formulir?tab=siswa&saved=1");
            exit;
        }

        // SIMPAN DATA ORANG TUA
        if ($_POST["save"] === "ortu") {

            $id_pendaftar = $pendaftar->getId($user_id);

            // proteksi: siswa harus ada dulu
            if ($id_pendaftar == 0) {
                header("Location: /siswa/formulir?tab=siswa&error=lengkapi_siswa");
                exit;
            }

            $ortu->saveAyah($id_pendaftar, $_POST);
            $ortu->saveIbu($id_pendaftar, $_POST);

            header("Location: /siswa/formulir?tab=ortu&saved=1");
            exit;
        }

        // SIMPAN DATA WALI
        if ($_POST["save"] === "wali") {

            $id_pendaftar = $pendaftar->getId($user_id);

            if ($id_pendaftar == 0) {
                header("Location: /siswa/formulir?tab=siswa&error=lengkapi_siswa");
                exit;
            }

            $ortu->saveWali($id_pendaftar, $_POST);

            header("Location: /siswa/formulir?tab=wali&saved=1");
            exit;
        }

        // fallback
        header("Location: /siswa/formulir");
        exit;
    }

    // CETAK FORMULIR
    public function cetak() {
        if (!isset($_SESSION["user_id"])) {
            header("Location: /login");
            exit;
        }

        $user_id   = $_SESSION["user_id"];
        $pendaftar = new Pendaftar;
        $ortu      = new OrangTua;

        $id_pendaftar = $pendaftar->getId($user_id);

        if ($id_pendaftar == 0) {
            header("Location: /siswa/formulir");
            exit;
        }

        $data = [
            "siswa" => $pendaftar->getFormDataByUserId($user_id),
            "ortu"  => $ortu->getOrtuByPendaftar($id_pendaftar),
            "wali"  => $ortu->getWaliByPendaftar($id_pendaftar)
        ];

        extract($data);

        require __DIR__ . '/../views/siswa/cetak_formulir.php';
    }
}
