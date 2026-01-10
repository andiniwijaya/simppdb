<?php

require_once __DIR__ . '/../models/Pendaftar.php';
require_once __DIR__ . '/../models/Upload.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Payment.php';
require_once __DIR__ . '/../models/Berkas.php';
require_once __DIR__ . '/../models/Pengumuman.php';

class DashboardController {

    public function index() {
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

            $status_upload = "belum";
            if ($id_pendaftar > 0) {
                $status_upload = $berkas->getStatusLengkap($id_pendaftar);
            }

            $paymentData = ["status_bayar" => "belum"];
            if ($id_pendaftar > 0) {
                $pm = $payment->lastPayment($id_pendaftar);
                if ($pm) $paymentData = $pm;
            }

            $progress = 0;
            if (!empty($siswa["nama_lengkap"])) $progress += 40;
            if ($status_upload === "lengkap") $progress += 30;
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
            $total_bayar  = $payment->count();

            $latest = $pendaftar->getLatest();

            extract([
                "total_pendaftar" => $total_pendaftar,
                "total_upload" => $total_upload,
                "total_bayar" => $total_bayar,
                "latest" => $latest,
                "jumlah" => $jumlah,
                "menunggu" => $menunggu,
                "valid" => $valid,
                "tolak" => $tolak
            ]);

            require __DIR__ . '/../views/admin/dashboard.php';
            return;
        }

        echo "Role tidak dikenali.";
    }

    // ===============================
    // KELEMBAGAAN ADMIN
    // ===============================
    public function kelembagaan() {
        if(!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin"){
            header("Location: /login");
            exit;
        }

        $content = __DIR__ . '/../views/admin/kelembagaan.php';
        require __DIR__ . '/../views/admin/layout_admin.php';
    }

    // ===============================
    // DATA PPDB
    // ===============================
    public function dataPPDB() {
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

    // ===============================
    // BIOGRAFI
    // ===============================
    public function biografi() {
        if(!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin"){
            header("Location: /login");
            exit;
        }

        $content = __DIR__ . '/../views/admin/biografi.php';
        require __DIR__ . '/../views/admin/layout_admin.php';
    }

    // ===============================
    // ADMINISTRASI
    // ===============================
    public function administrasi() {
        if(!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin"){
            header("Location: /login");
            exit;
        }

        $payment = new Payment;
        $list = $payment->getAllPayments();

        $content = __DIR__ . '/../views/admin/administrasi.php';
        require __DIR__ . '/../views/admin/layout_admin.php';
    }

    // ===============================
    // USERS
    // ===============================
    public function users() {
        if(!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin"){
            header("Location: /login");
            exit;
        }

        $user = new User();
        $users = $user->getAll();

        extract(['users' => $users]);

        $content = __DIR__ . '/../views/admin/user.php';
        require __DIR__ . '/../views/admin/layout_admin.php';
    }

    // ===============================
    // ✅ CREATE USER (FIX ERROR)
    // ===============================
    public function createUser() {
        if(!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin"){
            header("Location: /login");
            exit;
        }

        if($_SERVER["REQUEST_METHOD"] !== "POST"){
            header("Location: /dashboard/users");
            exit;
        }

        $user = new User();
        $user->create([
            'nama'       => $_POST['nama'],
            'email'      => $_POST['email'],
            'kata_sandi' => password_hash($_POST['kata_sandi'], PASSWORD_DEFAULT),
            'role'       => $_POST['role']
        ]);

        header("Location: /dashboard/users");
        exit;
    }

    // ===============================
    // DELETE USER
    // ===============================
    public function deleteUser() {
        if(!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin"){
            header("Location: /login");
            exit;
        }

        if(!isset($_GET['id'])){
            header("Location: /dashboard/users");
            exit;
        }

        $user = new User();
        $user->delete((int)$_GET['id']);

        header("Location: /dashboard/users");
        exit;
    }
}
