<?php

require_once __DIR__ . '/../models/Berkas.php';
require_once __DIR__ . '/../models/Pendaftar.php';

class BerkasController
{
    /* ===============================
       HALAMAN BERKAS SISWA
    =============================== */
    public function index()
    {
        // CEK LOGIN
        if (!isset($_SESSION["user_id"])) {
            header("Location: /login");
            exit;
        }

        $id_pengguna = $_SESSION["user_id"];

        $berkasModel    = new Berkas();
        $pendaftarModel = new Pendaftar();

        // AMBIL DATA PENDAFTAR
        $pendaftar = $pendaftarModel->getFormDataByUserId($id_pengguna);

        if (!$pendaftar || empty($pendaftar['id_pendaftar'])) {
            die("Lengkapi formulir siswa terlebih dahulu.");
        }

        $id_pendaftar = (int) $pendaftar['id_pendaftar'];

        // DATA BERKAS SISWA
        $list = $berkasModel->getAll($id_pendaftar);

        // STATUS & PROGRESS
        $statusBerkas   = $berkasModel->getStatusLengkap($id_pendaftar);
        $progressBerkas = $berkasModel->getProgress($id_pendaftar);

        // TAMPILKAN VIEW
        ob_start();
        require __DIR__ . '/../views/siswa/berkas.php';
        $content = ob_get_clean();

        require __DIR__ . '/../views/siswa/layout_siswa.php';
    }

    /* ===============================
       UPLOAD BERKAS SISWA
    =============================== */
    public function upload()
    {
        // CEK LOGIN
        if (!isset($_SESSION["user_id"])) {
            header("Location: /login");
            exit;
        }

        // VALIDASI INPUT
        if (!isset($_POST["jenis_berkas"]) || empty($_FILES["file"]["name"])) {
            $_SESSION["error"] = "Data upload tidak valid.";
            header("Location: /siswa/berkas_pendaftar");
            exit;
        }

        $jenis = $_POST["jenis_berkas"];

        $berkasModel    = new Berkas();
        $pendaftarModel = new Pendaftar();

        // AMBIL DATA PENDAFTAR
        $pendaftar = $pendaftarModel->getFormDataByUserId($_SESSION["user_id"]);

        if (!$pendaftar || empty($pendaftar['id_pendaftar'])) {
            $_SESSION["error"] = "Lengkapi formulir siswa terlebih dahulu.";
            header("Location: /siswa/formulir");
            exit;
        }

        $id_pendaftar = (int) $pendaftar['id_pendaftar'];

        // CEK DUPLIKASI BERKAS
        if ($berkasModel->getByJenis($id_pendaftar, $jenis)) {
            $_SESSION["error"] = "Berkas ini sudah diunggah.";
            header("Location: /siswa/berkas_pendaftar");
            exit;
        }

        /* ===============================
           SETTING UPLOAD
        =============================== */

        // FOLDER SERVER
        $uploadDir = __DIR__ . "/../../public/uploads/berkas/";

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // VALIDASI EXTENSION
        $allowedExt = ['jpg', 'jpeg', 'png', 'pdf'];
        $ext = strtolower(pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION));

        if (!in_array($ext, $allowedExt)) {
            $_SESSION["error"] = "Format file tidak diizinkan (jpg, png, pdf).";
            header("Location: /siswa/berkas_pendaftar");
            exit;
        }

        // BATAS UKURAN (2MB)
        if ($_FILES["file"]["size"] > 2 * 1024 * 1024) {
            $_SESSION["error"] = "Ukuran file maksimal 2MB.";
            header("Location: /siswa/berkas_pendaftar");
            exit;
        }

        // NAMA FILE
        $namaFile = $jenis . "_" . $id_pendaftar . "_" . time() . "." . $ext;

        // PATH SERVER & DB
        $pathServer = $uploadDir . $namaFile;
        $pathDB     = "public/uploads/berkas/" . $namaFile;

        /* ===============================
           PROSES UPLOAD
        =============================== */
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $pathServer)) {

            $berkasModel->insert(
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
