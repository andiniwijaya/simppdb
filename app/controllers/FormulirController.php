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

        if(!isset($_SESSION["id_pengguna"])) {
            header("Location: /login");
            exit;
        }

        $user_id = $_SESSION["id_pengguna"];
        $pendaftar = new Pendaftar;
        $ortu = new OrangTua;

        if($_POST["save"] == "siswa"){

            $pendaftar->insert($user_id,$_POST);

            header("Location: /siswa/formulir?tab=siswa&saved=1");
            exit;
        }


        if($_POST["save"] == "ortu"){

            $id = $pendaftar->getId($user_id);

            $ortu->insertAyah($id,$_POST);
            $ortu->insertIbu($id,$_POST);

            header("Location: /siswa/formulir?tab=ortu&saved=1");
            exit;
        }


        if($_POST["save"] == "wali"){

            $id = $pendaftar->getId($user_id);

            if(!empty($_POST["nama_wali"])){
                $ortu->insertWali($id,$_POST);
            }

            header("Location: /siswa/formulir?tab=wali&saved=1");
            exit;
        }

    }

}
