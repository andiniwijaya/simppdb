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

        if(!isset($_SESSION["user_id"])) {
            header("Location: /login");
            exit;
        }

        $user_id   = $_SESSION["user_id"];
        $pendaftar = new Pendaftar;
        $ortu      = new OrangTua;

        if($_POST["save"] == "siswa"){

            $pendaftar->saveSiswa($user_id,$_POST);

            header("Location: /siswa/formulir?tab=siswa&saved=1");
            exit;
        }

        if($_POST["save"] == "ortu"){

            $id = $pendaftar->getId($user_id);

            $ortu->saveAyah($id,$_POST);
            $ortu->saveIbu($id,$_POST);

            header("Location: /siswa/formulir?tab=ortu&saved=1");
            exit;
        }

        if($_POST["save"] == "wali"){

            $id = $pendaftar->getId($user_id);

            $ortu->saveWali($id,$_POST);

            header("Location: /siswa/formulir?tab=wali&saved=1");
            exit;
        }
    }

    /* ============================
       TAMBAHAN CETAK FORMULIR
       ============================ */
    public function cetak()
    {
        if(!isset($_SESSION["user_id"])) {
            header("Location: /login");
            exit;
        }

        $user_id = $_SESSION["user_id"];

        $pendaftar = new Pendaftar;
        $ortu      = new OrangTua;

        $id_pendaftar = $pendaftar->getId($user_id);

        $data = [
            "siswa" => $pendaftar->getFormDataByUserId($user_id),
            "ortu"  => $ortu->getOrtuByPendaftar($id_pendaftar),
            "wali"  => $ortu->getWaliByPendaftar($id_pendaftar)
        ];

        require __DIR__ . '/../views/siswa/cetak_formulir.php';
    }
}
