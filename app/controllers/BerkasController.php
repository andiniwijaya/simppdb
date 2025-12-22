<?php

require_once __DIR__ . '/../models/Berkas.php';
require_once __DIR__ . '/../models/Pendaftar.php';

class BerkasController {

    public function index(){

        if(!isset($_SESSION["user_id"])){
            header("Location: /login");
            exit;
        }

        $m = new Berkas();
        $p = new Pendaftar();

        $id_pengguna = $_SESSION["user_id"];

        $pendaftar = $p->getFormDataByUserId($id_pengguna);

        if(!$pendaftar){
            die("Lengkapi formulir siswa terlebih dahulu.");
        }

        $id_pendaftar = $pendaftar["id_pendaftar"];

        $list = $m->getAll($id_pendaftar);

        $content = __DIR__ . "/../views/siswa/berkas.php";
        require __DIR__ . "/../views/siswa/layout_siswa.php";
    }


    public function upload(){

        session_start();

        if(!isset($_SESSION["user_id"])){
            header("Location: /login");
            exit;
        }

        if(!isset($_POST["jenis_berkas"])){
            die("Jenis berkas tidak valid");
        }

        $uploadDir = __DIR__ . "/../../public/uploads/";

        if(!is_dir($uploadDir)){
            mkdir($uploadDir, 0777, true);
        }

        $fileName = time() . "_" . basename($_FILES["file"]["name"]);

        $path = $uploadDir . $fileName;

        if(move_uploaded_file($_FILES["file"]["tmp_name"], $path)){

            $p = new Pendaftar();
            $m = new Berkas();

            $id_pengguna = $_SESSION["user_id"];
            $pendaftar = $p->getFormDataByUserId($id_pengguna);

            $m->insert(
                $pendaftar["id_pendaftar"],
                $_POST["jenis_berkas"],
                "/public/uploads/" . $fileName
            );

            header("Location: /siswa/berkas_pendaftar");
            exit;
        }

        die("Gagal upload berkas");
    }
}
