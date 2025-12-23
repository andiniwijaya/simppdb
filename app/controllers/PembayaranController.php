<?php

require_once __DIR__ . '/../models/Payment.php';
require_once __DIR__ . '/../models/Pendaftar.php';

class PembayaranController {

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

    public function upload(){

        if(!isset($_SESSION["user_id"])){
            header("Location: /login");
            exit;
        }

        $jumlah = (int) $_POST["jumlah"];

        if($jumlah <= 0){
            die("Nominal tidak valid");
        }

        $file = time()."_".$_FILES["bukti"]["name"];
        move_uploaded_file(
            $_FILES["bukti"]["tmp_name"],
            __DIR__."/../../public/uploads/".$file
        );

        $pendaftar = new Pendaftar();
        $payment   = new Payment();

        $data = $pendaftar->getFormDataByUserId($_SESSION["user_id"]);

        $payment->insert(
            $data["id_pendaftar"],
            $jumlah,
            "/public/uploads/".$file
        );

        header("Location: /siswa/pembayaran");
        exit;
    }
}
