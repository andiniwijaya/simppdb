<?php

require_once __DIR__ . '/../models/Pendaftar.php';
require_once __DIR__ . '/../models/Upload.php';
require_once __DIR__ . '/../models/Payment.php';
require_once __DIR__ . '/../models/Berkas.php';
require_once __DIR__ . '/../models/Pengumuman.php';

class DashboardController {

    // ===============================
    // DASHBOARD
    // ===============================
    public function index()
    {
        if(!isset($_SESSION["user_id"])){
            header("Location: /login");
            exit;
        }

        $role = $_SESSION["role"];

        // ===============================
        // DASHBOARD SISWA
        // ===============================
        if ($role === "siswa") {

            $id_pengguna = $_SESSION["user_id"];

            $pendaftar = new Pendaftar();
            $berkas    = new Berkas();
            $payment   = new Payment();

            $siswa = $pendaftar->getFormDataByUserId($id_pengguna);

            if (!$siswa) {
                $siswa = [
                    "id_pendaftar" => 0,
                    "nama_lengkap" => "",
                    "status_data"  => "belum_lengkap"
                ];
            }

            $id_pendaftar = (int)$siswa["id_pendaftar"];

            $status_upload = ($id_pendaftar > 0)
                ? $berkas->getStatusLengkap($id_pendaftar)
                : "belum";

            $paymentData = ["status_bayar" => "belum"];
            if ($id_pendaftar > 0) {
                $pm = $payment->lastPayment($id_pendaftar);
                if ($pm) $paymentData = $pm;
            }

            $progress = 0;
            if (!empty($siswa["nama_lengkap"])) $progress += 40;
            if ($status_upload === "lengkap")   $progress += 30;
            if ($paymentData["status_bayar"] === "lunas") $progress += 30;

            $pengumuman = new Pengumuman();
            $status_pengumuman = "menunggu";
            if ($id_pendaftar > 0) {
                $pengumuman->createIfNotExists($id_pendaftar);
                $status_pengumuman = $pengumuman->getStatusByPendaftar($id_pendaftar);
            }

            extract([
                "siswa" => $siswa,
                "status_upload" => $status_upload,
                "payment" => $paymentData,
                "progress" => $progress,
                "status_pengumuman" => $status_pengumuman
            ]);

            ob_start();
            require __DIR__ . '/../views/siswa/dashboard.php';
            $content = ob_get_clean();

            require __DIR__ . '/../views/siswa/layout_siswa.php';
            return;
        }

        // ===============================
        // DASHBOARD ADMIN
        // ===============================
        if ($role === "admin") {

            $pendaftar = new Pendaftar();
            $upload    = new Upload();
            $payment   = new Payment();

            extract([
                "total_pendaftar" => $pendaftar->countAll(),
                "total_upload"    => $upload->countUploaded(),
                "total_bayar"     => $payment->count(),
                "latest"          => $pendaftar->getLatest()
            ]);

            require __DIR__ . '/../views/admin/dashboard.php';
            return;
        }

        echo "Role tidak dikenali";
    }

    // ===============================
    // ADMINISTRASI (LIST PEMBAYARAN)
    // ===============================
    public function administrasi()
    {
        if(!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin"){
            header("Location: /login");
            exit;
        }

        $payment = new Payment();
        $list    = $payment->getAllPayments();

        require __DIR__ . '/../views/admin/administrasi.php';
    }

    // ===============================
    // VERIFIKASI PEMBAYARAN (FIX 404)
    // ===============================
    public function verifikasibayar()
    {
        if(!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin"){
            header("Location: /login");
            exit;
        }

        $aksi = $_GET['aksi'] ?? null;
        $id   = $_GET['id'] ?? null;

        if (!$aksi || !$id) {
            header("Location: /dashboard/administrasi");
            exit;
        }

        $payment   = new Payment();
        $pendaftar = new Pendaftar();

        if ($aksi === "lunas") {
            $payment->updateStatus($id, "lunas");

            $id_pendaftar = $payment->getPendaftarId($id);
            if ($id_pendaftar) {
                $pendaftar->updateStatusData($id_pendaftar, "lengkap");
            }
        }

        if ($aksi === "tolak") {
            $payment->updateStatus($id, "ditolak");
        }

        header("Location: /dashboard/administrasi");
        exit;
    }
}
