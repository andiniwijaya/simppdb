<?php

require_once __DIR__ . '/../models/Pendaftar.php';
require_once __DIR__ . '/../models/Upload.php';
require_once __DIR__ . '/../models/Payment.php';

class DashboardController {

    public function index()
    {
        // CEK LOGIN
        if(!isset($_SESSION["user_id"])){
            header("Location: /login");
            exit;
        }

        $role = $_SESSION["role"];

        // ================= DASHBOARD SISWA =================
        if($role === "siswa"){

            $id_pengguna = $_SESSION["user_id"];

            $pendaftar = new Pendaftar;
            $upload    = new Upload;
            $payment   = new Payment;

            $siswa = $pendaftar->getFormDataByUserId($id_pengguna);

            if(!$siswa){
                $siswa = [
                    "id_pendaftar"   => 0,
                    "nisn"           => "",
                    "nama_lengkap"   => "",
                    "jenis_kelamin"  => "",
                    "tempat_lahir"   => "",
                    "tanggal_lahir"  => "",
                    "agama"          => "",
                    "alamat"         => "",
                    "asal_sekolah"   => "",
                    "nomor_hp"       => "",
                    "status_data"    => "belum_lengkap"
                ];
            }

            $id_pendaftar = (int)$siswa["id_pendaftar"];

            // STATUS UPLOAD
            if($id_pendaftar > 0){
                $latest_upload = $upload->lastUpload($id_pendaftar);
                if(!$latest_upload){
                    $latest_upload = ["status_berkas" => "Belum Upload"];
                }
            } else {
                $latest_upload = ["status_berkas" => "Belum Upload"];
            }

            // STATUS BAYAR
            if($id_pendaftar > 0){
                $bayar = $payment->lastPayment($id_pendaftar);
                if(!$bayar){
                    $bayar = ["status_bayar" => "belum"];
                }
            } else {
                $bayar = ["status_bayar" => "belum"];
            }

            // PROGRESS
            $progress = 0;
            if(!empty($siswa["nama_lengkap"]))                     $progress += 40;
            if($latest_upload["status_berkas"] != "Belum Upload") $progress += 30;
            if($bayar["status_bayar"] === "lunas")               $progress += 30;

            extract([
                "siswa"         => $siswa,
                "latest_upload" => $latest_upload,
                "payment"       => $bayar,
                "progress"      => $progress
            ]);

            ob_start();
            require __DIR__ . '/../views/siswa/dashboard.php';
            $content = ob_get_clean();

            require __DIR__ . '/../views/siswa/layout_siswa.php';
            return;
        }

        // ================= DASHBOARD ADMIN =================
        if($role === "admin"){

            $pendaftar = new Pendaftar;
            $upload    = new Upload;
            $payment   = new Payment;

            $total_pendaftar = $pendaftar->countAll();

            $jumlah   = $pendaftar->countAll();
            $menunggu = $pendaftar->getFormDataByUserId('baru');
            $valid    = $pendaftar->getFormDataByUserId('lengkap');
            $tolak    = $pendaftar->getFormDataByUserId('ditolak');

            $total_upload = $upload->countUploaded();
            $total_bayar  = $payment->countPaid();

            $latest = $pendaftar->getFormDataByUserId(10);

            extract([
                "total_pendaftar" => $total_pendaftar,
                "total_upload"    => $total_upload,
                "total_bayar"     => $total_bayar,
                "latest"          => $latest,
                "jumlah"          => $jumlah,
                "menunggu"        => $menunggu,
                "valid"           => $valid,
                "tolak"           => $tolak
            ]);

            require __DIR__ . '/../views/admin/dashboard.php';
            return;
        }

        echo "Role tidak dikenali.";
    }

    // ================= MENU ADMIN =================

    public function kelembagaan()
    {
        if(!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin"){
            header("Location: /login");
            exit;
        }

        $content = __DIR__ . '/../views/admin/kelembagaan.php';
        require __DIR__ . '/../views/admin/layout_admin.php';
    }

    public function dataPPDB()
    {
        if(!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin"){
            header("Location: /login");
            exit;
        }

        $pendaftar = new Pendaftar;
        $list = $pendaftar->getLatest();

        extract(["list" => $list]);

        $content = __DIR__ . '/../views/admin/data_ppdb.php';
        require __DIR__ . '/../views/admin/layout_admin.php';
    }

    public function administrasi()
    {
        if(!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin"){
            header("Location: /login");
            exit;
        }

        $payment = new Payment;
        $list    = $payment->getAllPayments();

        extract(["list" => $list]);

        $content = __DIR__ . '/../views/admin/administrasi.php';
        require __DIR__ . '/../views/admin/layout_admin.php';
    }

    public function pengaturan()
    {
        if(!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin"){
            header("Location: /login");
            exit;
        }

        $content = __DIR__ . '/../views/admin/pengaturan.php';
        require __DIR__ . '/../views/admin/layout_admin.php';
    }
}
