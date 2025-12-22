<?php

require_once __DIR__ . '/../models/Pendaftar.php';
require_once __DIR__ . '/../models/OrangTua.php';

class FormulirController
{
    public function index() {

        if(!isset($_SESSION["user_id"])) {
            header("Location: /login");
            exit;
        }

        ob_start();
        require __DIR__ . '/../views/siswa/formulir.php';
        $content = ob_get_clean();

        require __DIR__ . '/../views/siswa/layout_siswa.php';
    }

    public function simpan() {

        session_start();
        if (!isset($_SESSION["id_pengguna"])) {
            header("Location: /login");
            exit;
        }

        $pendaftar = new Pendaftar();
        $orangtua = new OrangTua();

        $id_pendaftar = $pendaftar->insert($_SESSION["id_pengguna"], $_POST);

        $orangtua->insertAyah($id_pendaftar, $_POST);
        $orangtua->insertIbu($id_pendaftar, $_POST);

        if (!empty($_POST["nama_wali"])) {
            $orangtua->insertWali($id_pendaftar, $_POST);
        }

        header("Location: /siswa/dashboard");
        exit;
    }
}
