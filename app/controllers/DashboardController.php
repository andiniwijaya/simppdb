<?php

require_once __DIR__ . '/../models/Pendaftar.php';
require_once __DIR__ . '/../models/Upload.php';
require_once __DIR__ . '/../models/Payment.php';
require_once __DIR__ . '/../models/Pengumuman.php';


class DashboardController {

    public function index()
    {
        // CEK LOGIN
        if (!isset($_SESSION["user_id"])) {
            header("Location: /login");
            exit;
        }

        $role = $_SESSION["role"];

<<<<<<< HEAD
        // DASHBOARD SISWA
        if ($role === "siswa") {

            if (!isset($_SESSION["user_id"])) {
                header("Location: /login");
                exit;
            }

        // DASHBOARD SISWA 
        if ($role === "siswa") {
>>>>>>> 90f78abe0d631899ae908decc2787dd736c4aa0e

            $id_pengguna = $_SESSION["user_id"];

            $pendaftar = new Pendaftar();
            $berkas    = new Berkas();
            $payment   = new Payment();

<<<<<<< HEAD
            //DATA SISWA 
            // DATA SISWA
>>>>>>> 90f78abe0d631899ae908decc2787dd736c4aa0e
            $siswa = $pendaftar->getFormDataByUserId($id_pengguna);

            if (!$siswa) {
                $siswa = [
                    "id_pendaftar"  => 0,
                    "nama_lengkap"  => "",
                    "status_data"   => "belum_lengkap"
                ];
            }

<<<<<<< HEAD
            $id_pendaftar = (int) $siswa["id_pendaftar"];

            $id_pendaftar = (int)$siswa["id_pendaftar"];

            // STATUS UPLOAD BERKAS
            $berkas_wajib = [
                'kartu_keluarga',
                'ktp_orang_tua',
                'kip',
                'ijazah_sd',
                'surat_keterangan_lulus',
                'akta_kelahiran',
                'pas_foto'
            ];
>>>>>>> 90f78abe0d631899ae908decc2787dd736c4aa0e

            // STATUS UPLOAD
            $status_upload = "Belum Upload";

            if ($id_pendaftar > 0) {
<<<<<<< HEAD
                $status_upload = $berkas->getStatusLengkap($id_pendaftar);
            }

            // STATUS PEMBAYARAN 
            $paymentData = ["status_bayar" => "belum"];

            if ($id_pendaftar > 0) {
                $pm = $payment->lastPayment($id_pendaftar);
                if ($pm) {
                    $paymentData = $pm;
                }
            }

            // PROGRESS
                $uploaded = $upload->getStatusLengkap($id_pendaftar);

                if ($uploaded) {
                    $map = [];
                    foreach ($uploaded as $u) {
                        $map[$u['jenis_berkas']] = $u['status_berkas'];
                    }

                    $lengkap = true;
                    foreach ($berkas_wajib as $w) {
                        if (!isset($map[$w]) || $map[$w] === 'invalid') {
                            $lengkap = false;
                            break;
                        }
                    }

                    if ($lengkap) {
                        $status_upload = "lengkap";
                    } else {
                        $status_upload = "menunggu";
                    }
                }
            }

            // STATUS PEMBAYARAN
            $paymentData = ["status_bayar" => "belum"];
            if ($id_pendaftar > 0) {
                $pm = $payment->lastPayment($id_pendaftar);
                if ($pm) {
                    $paymentData = $pm;
                }
            }

            // PROGRESS 
>>>>>>> 90f78abe0d631899ae908decc2787dd736c4aa0e
            $progress = 0;
            if (!empty($siswa["nama_lengkap"]))        $progress += 40;
            if ($status_upload === "lengkap")          $progress += 30;
            if ($paymentData["status_bayar"] === "lunas") $progress += 30;

<<<<<<< HEAD
            if (!empty($siswa["nama_lengkap"])) $progress += 40;
            if ($status_upload === "lengkap")   $progress += 30;
            if ($paymentData["status_bayar"] === "lunas") $progress += 30;

            // PENGUMUMAN
            $pengumuman = new Pengumuman();

            $status_pengumuman = "menunggu";

            if($id_pendaftar > 0){
                $status_pengumuman = $pengumuman->getStatusByPendaftar($id_pendaftar);
            }

            // KIRIM KE VIEW
            $data = [
                "siswa"         => $siswa,
                "status_upload" => $status_upload,
                "payment"       => $paymentData,
                "progress"      => $progress,
                "status_pengumuman" => $status_pengumuman
            ];

            extract($data);

            extract([
                "siswa"         => $siswa,
                "status_upload" => $status_upload,
                "payment"       => $paymentData,
                "progress"      => $progress
            ]);
>>>>>>> 90f78abe0d631899ae908decc2787dd736c4aa0e

            ob_start();
            require __DIR__ . '/../views/siswa/dashboard.php';
            $content = ob_get_clean();

            require __DIR__ . '/../views/siswa/layout_siswa.php';
            return;
        }

<<<<<<< HEAD


        // DASHBOARD ADMIN
        if($role === "admin"){

        // ================= DASHBOARD ADMIN =================
        if ($role === "admin") {
>>>>>>> 90f78abe0d631899ae908decc2787dd736c4aa0e

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

            // NOTE: satu data saja
            $latest = $pendaftar->getFormDataByUserId(10);
            if (!$latest) {
                $latest = [];
            }

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
    // MENU ADMIN 

    public function kelembagaan()
    {
        if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin") {
            header("Location: /login");
            exit;
        }

        $content = __DIR__ . '/../views/admin/kelembagaan.php';
        require __DIR__ . '/../views/admin/layout_admin.php';
    }

    public function dataPPDB()
    {
        if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin") {
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
        if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin") {
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
        if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin") {
            header("Location: /login");
            exit;
        }

        $content = __DIR__ . '/../views/admin/pengaturan.php';
        require __DIR__ . '/../views/admin/layout_admin.php';
    }
}
