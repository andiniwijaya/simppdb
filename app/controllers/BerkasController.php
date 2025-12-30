<?php

require_once __DIR__ . '/../models/Berkas.php';
require_once __DIR__ . '/../models/Pendaftar.php';

class BerkasController {

    // ================= HALAMAN BERKAS =================
    public function index(){

        if(!isset($_SESSION["user_id"])){
            header("Location: /login");
            exit;
        }

        $m = new Berkas();
        $p = new Pendaftar();

        $id_pengguna = $_SESSION["user_id"];
        $pendaftar   = $p->getFormDataByUserId($id_pengguna);

        if(!$pendaftar){
            die("Lengkapi formulir siswa terlebih dahulu.");
        }

        $id_pendaftar = $pendaftar["id_pendaftar"];

        // DATA BERKAS
        $list = $m->getAll($id_pendaftar);

        // STATUS & PROGRESS
        $statusBerkas   = $m->getStatusLengkap($id_pendaftar);
        $progressBerkas = $m->getProgress($id_pendaftar);

        ob_start();
        require __DIR__ . "/../views/siswa/berkas.php";
        $content = ob_get_clean();

        require __DIR__ . "/../views/siswa/layout_siswa.php";
    }

    // ================= UPLOAD BERKAS =================
    public function upload(){

        if(!isset($_SESSION["user_id"])){
            header("Location: /login");
            exit;
        }

        if(!isset($_POST["jenis_berkas"]) || empty($_FILES["file"]["name"])){
            die("Data upload tidak valid");
        }

        $jenis = $_POST["jenis_berkas"];

        $p = new Pendaftar();
        $m = new Berkas();

        $pendaftar = $p->getFormDataByUserId($_SESSION["user_id"]);

        if(!$pendaftar){
            die("Data pendaftar tidak ditemukan");
        }

        $id_pendaftar = $pendaftar["id_pendaftar"];

        // ❌ CEK DUPLIKASI
        if($m->getByJenis($id_pendaftar, $jenis)){
            $_SESSION["error"] = "Berkas ini sudah diunggah.";
            header("Location: /siswa/berkas_pendaftar");
            exit;
        }

        // ================= FOLDER =================
        $uploadDir = __DIR__ . "/../../public/uploads/berkas/";

        if(!is_dir($uploadDir)){
            mkdir($uploadDir, 0777, true);
        }

        // ================= NAMA FILE =================
        $ext  = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
        $nama = $jenis . "_" . $id_pendaftar . "_" . time() . "." . $ext;

        $pathServer = $uploadDir . $nama;
        $pathDB     = "/public/uploads/berkas/" . $nama;

        if(move_uploaded_file($_FILES["file"]["tmp_name"], $pathServer)){

            $m->insert(
                $id_pendaftar,
                $jenis,
                $pathDB
            );

            $_SESSION["success"] = "Berkas berhasil diunggah.";
            header("Location: /siswa/berkas_pendaftar");
            exit;
        }

        $_SESSION["error"] = "Gagal mengunggah berkas.";
        header("Location: /siswa/berkas_pendaftar");
        exit;
    }
}
