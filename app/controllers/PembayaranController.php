<?php

require_once __DIR__ . '/../models/Payment.php';
require_once __DIR__ . '/../models/Pendaftar.php';

class PembayaranController {

    // HALAMAN PEMBAYARAN
    public function index(){

        if(!isset($_SESSION["user_id"])){
            header("Location: /login");
            exit;
        }

        $pendaftar = new Pendaftar();
        $payment   = new Payment();

        $dataSiswa = $pendaftar->getFormDataByUserId($_SESSION["user_id"]);

        if(!$dataSiswa){
            die("Lengkapi formulir terlebih dahulu");
        }

        $id = $dataSiswa["id_pendaftar"];

        $totalBayar = $payment->getTotalBayar($id);
        $status     = $payment->getStatus($id);
        $riwayat    = $payment->getRiwayat($id);

        $sisa = Payment::TOTAL_INFAQ - $totalBayar;

        ob_start();
        require __DIR__ . '/../views/siswa/pembayaran.php';
        $content = ob_get_clean();

        require __DIR__ . '/../views/siswa/layout_siswa.php';
    }

    //UPLOAD PEMBAYARAN 
    public function upload(){

        if(!isset($_SESSION["user_id"])){
            header("Location: /login");
            exit;
        }

        if(
            !isset($_POST["jumlah"]) ||
            !isset($_FILES["bukti"]) ||
            empty($_FILES["bukti"]["name"])
        ){
            die("Data pembayaran tidak lengkap");
        }

        $jumlah = (int) $_POST["jumlah"];
        if($jumlah <= 0){
            die("Nominal tidak valid");
        }

        $pendaftar = new Pendaftar();
        $payment   = new Payment();

        $data = $pendaftar->getFormDataByUserId($_SESSION["user_id"]);
        $id_pendaftar = $data["id_pendaftar"];

        // FOLDER KHUSUS PEMBAYARAN
        $uploadDir = __DIR__ . "/../../public/uploads/pembayaran/";

        if(!is_dir($uploadDir)){
            mkdir($uploadDir, 0777, true);
        }

        //  NAMA FILE AMAN
        $ext  = pathinfo($_FILES["bukti"]["name"], PATHINFO_EXTENSION);
        $nama = "bayar_" . $id_pendaftar . "_" . time() . "." . $ext;

        $pathServer = $uploadDir . $nama;
        $pathDB = $nama;

        // UPLOAD
        if(!move_uploaded_file($_FILES["bukti"]["tmp_name"], $pathServer)){
            die("Gagal mengunggah bukti pembayaran");
        }

        // SIMPAN DB \
        $payment->insert(
            $id_pendaftar,
            $jumlah,
            $pathDB
        );

        $_SESSION["success"] = "Pembayaran berhasil dikirim.";
        header("Location: /siswa/pembayaran");
        exit;
    }
}
