<?php

require_once __DIR__ . '/../models/Pembayaran.php';
require_once __DIR__ . '/../models/Pendaftar.php';

class PembayaranController {

    public function index()
    {
        session_start();

        if (!isset($_SESSION['nisn'])) {
            header("Location: /loginsiswa");
            exit;
        }

        $nisn = $_SESSION["nisn"];

        $pendaftar = (new Pendaftar)->getByNisn($nisn);

        if (!$pendaftar) {
            die("Data pendaftar tidak ditemukan.");
        }

        $rekening = [
            "bank" => "BNI",
            "nomor" => "0189257614",
            "nama" => "SMP Mandala"
        ];

        extract([
            "rekening" => $rekening,
            "pendaftar" => $pendaftar
        ]);

        require __DIR__ . '/../views/siswa/pembayaran.php';
    }


    public function upload()
    {
        session_start();

        if (!isset($_SESSION['nisn'])) {
            header("Location: /loginsiswa");
            exit;
        }

        $nisn = $_SESSION['nisn'];

        $pembayaran = new Payment();
        $proses = $pembayaran->upload($nisn, $_POST, $_FILES);

        if ($proses) {
            header("Location: /pembayaran");
            exit;
        }

        die("Gagal upload");
    }

}
