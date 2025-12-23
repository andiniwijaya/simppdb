<?php

require_once __DIR__ . '/../models/Pendaftar.php';
require_once __DIR__ . '/../models/Upload.php';
require_once __DIR__ . '/../models/Payment.php';
require_once __DIR__ . '/../models/Berkas.php';

class DashboardController {

    public function index()
    {
        // CEK LOGIN
        if(!isset($_SESSION["user_id"])){
            header("Location: /login");
            exit;
        }

        $role = $_SESSION["role"];

        // DASHBOARD SISWA
        if ($role === "siswa") {

            if (!isset($_SESSION["user_id"])) {
                header("Location: /login");
                exit;
            }

            $id_pengguna = $_SESSION["user_id"];

            $pendaftar = new Pendaftar();
            $berkas    = new Berkas();
            $payment   = new Payment();

            // ===== DATA SISWA =====
            $siswa = $pendaftar->getFormDataByUserId($id_pengguna);

            if (!$siswa) {
                $siswa = [
                    "id_pendaftar"  => 0,
                    "nama_lengkap"  => "",
                    "status_data"   => "belum_lengkap"
                ];
            }

            $id_pendaftar = (int) $siswa["id_pendaftar"];

            // ===== STATUS UPLOAD =====
            $status_upload = "Belum Upload";

            if ($id_pendaftar > 0) {
                $status_upload = $berkas->getStatusLengkap($id_pendaftar);
            }

            // ===== STATUS PEMBAYARAN =====
            $paymentData = ["status_bayar" => "belum"];

            if ($id_pendaftar > 0) {
                $pm = $payment->lastPayment($id_pendaftar);
                if ($pm) {
                    $paymentData = $pm;
                }
            }

            // ===== PROGRESS =====
            $progress = 0;

            if (!empty($siswa["nama_lengkap"])) $progress += 40;
            if ($status_upload === "lengkap")   $progress += 30;
            if ($paymentData["status_bayar"] === "lunas") $progress += 30;

            // ===== KIRIM KE VIEW =====
            $data = [
                "siswa"         => $siswa,
                "status_upload" => $status_upload,
                "payment"       => $paymentData,
                "progress"      => $progress
            ];

            extract($data);

            ob_start();
            require __DIR__ . '/../views/siswa/dashboard.php';
            $content = ob_get_clean();

            require __DIR__ . '/../views/siswa/layout_siswa.php';
            return;
        }



        // DASHBOARD ADMIN
        if($role === "admin"){

            $pendaftar = new Pendaftar;
            $upload    = new Upload;
            $payment   = new Payment();

            $total_pendaftar = $pendaftar->countAll();

            $jumlah   = $pendaftar->countAll();
            $menunggu = $pendaftar->getFormDataByUserId('baru');
            $valid    = $pendaftar->getFormDataByUserId('lengkap');
            $tolak    = $pendaftar->getFormDataByUserId('ditolak');

            $total_upload = $upload->countUploaded();
            $total_bayar  = $payment->countPaid();

            $latest = $pendaftar->getLatest();

            $data = [
                "total_pendaftar" => $total_pendaftar,
                "total_upload"    => $total_upload,
                "total_bayar"     => $total_bayar,
                "latest"          => $latest,
                "jumlah"          => $jumlah,
                "menunggu"        => $menunggu,
                "valid"           => $valid,
                "tolak"           => $tolak
            ];

            extract($data);

            require __DIR__ . '/../views/admin/dashboard.php';
            return;
        }

        echo "Role tidak dikenali.";
    }

    //KELEMBAGAAN ADMIN

    public function kelembagaan()
    {
        if(!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin"){
            header("Location: /login");
            exit;
        }

        $content = __DIR__ . '/../views/admin/kelembagaan.php';

        require __DIR__ . '/../views/admin/layout_admin.php';
        return;
    }
        public function dataPPDB()
    {
        if(!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin"){
            header("Location: /login");
            exit;
        }

        $pendaftar = new Pendaftar;
        $list = $pendaftar->getLatest(); // ambil seluruh data pendaftar

        extract(["list" => $list]);

        $content = __DIR__ . '/../views/admin/data_ppdb.php';

        require __DIR__ . '/../views/admin/layout_admin.php';
    }

        //Administrasi Admin
    public function administrasi()
    {
        if(!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin"){
            header("Location: /login");
            exit;
        }

        $payment = new Payment;
        $list    = $payment->getAllPayments(); // ← ambil seluruh pembayaran

        $content = __DIR__ . '/../views/admin/administrasi.php';

        require __DIR__ . '/../views/admin/layout_admin.php';
    }

    // PENGATURAN ADMIN

    public function pengaturan()
    {
        if(!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin"){
            header("Location: /login");
            exit;
        }

        $content = __DIR__ . '/../views/admin/pengaturan.php';

        require __DIR__ . '/../views/admin/layout_admin.php';
        return;
    }
}