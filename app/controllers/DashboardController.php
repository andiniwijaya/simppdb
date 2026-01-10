<?php

require_once __DIR__ . '/../models/Pendaftar.php';
require_once __DIR__ . '/../models/Upload.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Payment.php';
require_once __DIR__ . '/../models/Berkas.php';
require_once __DIR__ . '/../models/Pengumuman.php';

class DashboardController {

    public function index() {
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
            $status_upload = "belum";

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

            if (!empty($siswa["nama_lengkap"])) {
                $progress += 40;
            }

            if ($status_upload === "lengkap") {
                $progress += 30;
            }

            if ($paymentData["status_bayar"] === "lunas") {
                $progress += 30;
            }

            // PENGUMUMAN
            $pengumuman = new Pengumuman();

            $status_pengumuman = "menunggu";

            if($id_pendaftar > 0){
                $pengumuman->createIfNotExists($id_pendaftar);
                $status_pengumuman = $pengumuman->getStatusByPendaftar($id_pendaftar);
            }

            // ===== KIRIM KE VIEW =====
            $data = [
                "siswa"         => $siswa,
                "status_upload" => $status_upload,
                "payment"       => $paymentData,
                "progress"      => $progress,
                "status_pengumuman" => $status_pengumuman
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
            $total_bayar  = $payment->count();

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
    public function kelembagaan() {
        if(!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin"){
            header("Location: /login");
            exit;
        }

        $content = __DIR__ . '/../views/admin/kelembagaan.php';

        require __DIR__ . '/../views/admin/layout_admin.php';
        return;
    }

    public function dataPPDB() {
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
    // ===============================
// BIOGRAFI SEKOLAH (ADMIN)
// ===============================
public function biografi()
{
    if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin") {
        header("Location: /login");
        exit;
    }

    $content = __DIR__ . '/../views/admin/biografi.php';
    require __DIR__ . '/../views/admin/layout_admin.php';
}


    //Administrasi Admin
    public function administrasi() {
        if(!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin"){
            header("Location: /login");
            exit;
        }

        $payment = new Payment;
        $list    = $payment->getAllPayments(); // ← ambil seluruh pembayaran

        $content = __DIR__ . '/../views/admin/administrasi.php';

        require __DIR__ . '/../views/admin/layout_admin.php';
    }

    public function verifikasibayar()
    {
        if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin") {
            header("Location: /login");
            exit;
        }

        $aksi = $_GET['aksi'] ?? null;
        $id   = $_GET['id'] ?? null;

        if (!$aksi || !$id) {
            header("Location: /dashboard/administrasi");
            exit;
        }

        $payment    = new Payment();
        $pendaftar  = new Pendaftar();
        $berkas     = new Berkas();
        $pengumuman = new Pengumuman();

        if ($aksi === "lunas") {

            // 1. lunaskan pembayaran
            $payment->updateStatus($id, "lunas");

            // 2. ambil id pendaftar
            $id_pendaftar = $payment->getPendaftarId($id);

            // 3. cek SYARAT KELULUSAN
            if (
                $berkas->isSemuaBerkasValid($id_pendaftar) &&
                $payment->isLunas($id_pendaftar)
            ) {
                // DITERIMA
                $pendaftar->updateStatusData($id_pendaftar, "diterima");
                $pengumuman->setStatus($id_pendaftar, "diterima");
            } else {
                // belum lengkap
                $pendaftar->updateStatusData($id_pendaftar, "lengkap");
            }

        } elseif ($aksi === "tolak") {
            $payment->updateStatus($id, "ditolak");
        }

        header("Location: /dashboard/administrasi");
        exit;
    }

    // ===============================
    // VERIFIKASI BERKAS SISWA (ADMIN)
    // ===============================
    public function verifikasiBerkas()
    {
        if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin") {
            header("Location: /login");
            exit;
        }

        $berkas = new Berkas();

        // ambil SEMUA berkas siswa (semua pendaftar)
      $list = $berkas->getAllForAdmin();

    extract(["list" => $list]);

    $content = __DIR__ . '/../views/admin/verifikasi_berkas.php';
    require __DIR__ . '/../views/admin/layout_admin.php';

    }
    // VALIDASI BERKAS (ADMIN)
    public function validBerkas()
    {
        if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin") {
            header("Location: /login");
            exit;
        }

        $id = $_GET['id'] ?? null;
        if (!$id) {
            header("Location: /dashboard/verifikasiBerkas");
            exit;
        }

        $berkas     = new Berkas();
        $pendaftar  = new Pendaftar();
        $payment    = new Payment();
        $pengumuman = new Pengumuman();

        // set berkas valid
        $berkas->updateStatus($id, 'valid');

        // ambil id pendaftar
        $id_pendaftar = $berkas->getPendaftarId($id);

        // cek kelulusan
        if (
            $berkas->isSemuaBerkasValid($id_pendaftar) &&
            $payment->isLunas($id_pendaftar)
        ) {
            $pendaftar->updateStatusData($id_pendaftar, "diterima");
            $pengumuman->setStatus($id_pendaftar, "diterima");
        } else {
            $pendaftar->updateStatusData($id_pendaftar, "terverifikasi");
        }

        header("Location: /dashboard/verifikasiBerkas");
        exit;
    }

    // INVALID BERKAS (ADMIN) 
    public function invalidBerkas()
    {
        if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin") {
            header("Location: /login");
            exit;
        }

        $id = $_GET['id'] ?? null;
        if (!$id) {
            header("Location: /dashboard/verifikasiBerkas");
            exit;
        }

        $berkas    = new Berkas();
        $pendaftar = new Pendaftar();

        // 1. set berkas invalid
        $berkas->updateStatus($id, 'invalid');

        // 2. ambil id_pendaftar
        $id_pendaftar = $berkas->getPendaftarId($id);

        // 3. kembalikan ke status VALID ENUM
        $pendaftar->updateStatusData($id_pendaftar, "lengkap");

        header("Location: /dashboard/verifikasiBerkas");
        exit;
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

    // DETAIL DATA
    public function detail()
    {
        if (!isset($_GET['id'])) {
            header("Location: /admin/data_ppdb");
            exit;
        }

        $pendaftar = new Pendaftar();
        $data = $pendaftar->getById((int)$_GET['id']);

        require __DIR__ . '/../views/admin/ppdb_detail.php';
    }
    // FORM EDIT

    public function edit()
    {
        if (!isset($_GET['id'])) {
            header("Location: /admin/ppdb");
            exit;
        }

        $pendaftar = new Pendaftar();
        $data = $pendaftar->getById((int)$_GET['id']);

        require __DIR__ . '/../views/admin/ppdb_edit.php';
    }

    // UPDATE DATA (DARI ADMIN)
    public function update()
    {
        if (!isset($_POST['id_pendaftar'])) {
            header("Location: /admin/ppdb");
            exit;
        }

        $pendaftar = new Pendaftar();

        $pendaftar->updateByAdmin(
            (int)$_POST['id_pendaftar'],
            [
                'nama_lengkap' => $_POST['nama_lengkap'],
                'nisn'         => $_POST['nisn'],
                'asal_sekolah' => $_POST['asal_sekolah'],
                'status_data'  => $_POST['status_data']
            ]
        );

        header("Location: /admin/ppdb");
        exit;
    }
    // DELETE DATA PPDB (ADMIN)
    public function deletePPDB()
    {
        if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin") {
            header("Location: /login");
            exit;
        }

        if (!isset($_GET['id'])) {
            echo "ID tidak ditemukan";
            exit;
        }

        $id = (int) $_GET['id'];

        $pendaftar = new Pendaftar();
        $pendaftar->delete($id);

        header("Location: /dashboard/data_ppdb");
        exit;
    }

    // EXPORT EXCEL DATA PPDB LENGKAP
    public function exportPPDBLengkap()
    {
        if(!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin"){
            header("Location: /login");
            exit;
        }

        $pendaftar = new Pendaftar();
        $list = $pendaftar->getAllLengkap();

        extract(["list" => $list]);

        // view khusus excel (tanpa layout)
        require __DIR__ . '/../views/admin/cetak_ppdb_excel.php';
        exit;
    }

    // ===============================
    // CETAK / EXPORT DATA PPDB LENGKAP
    // ===============================
    public function cetakPPDB()
    {
        if(!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin"){
            header("Location: /login");
            exit;
        }

        $pendaftar = new Pendaftar();
        $list = $pendaftar->getAllLengkap();

        extract(["list" => $list]);

        // view khusus excel (tanpa layout)
        require __DIR__ . '/../views/admin/cetak_ppdb_excel.php';
        exit;
    }
    // ===============================
    // PENGUMUMAN ADMIN
    // ===============================
    public function pengumuman()
    {
        if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin") {
            header("Location: /login");
            exit;
        }

        $pengumuman = new Pengumuman();
        $list = $pengumuman->getAll(); // JOIN pendaftar

        extract(['list' => $list]);

        $content = __DIR__ . '/../views/admin/pengumuman.php';
        require __DIR__ . '/../views/admin/layout_admin.php';
    }
public function users()
{
    if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
        header("Location: /login");
        exit;
    }

    $user = new User();
    $users = $user->getAll();

    // kirim ke view
    extract(['users' => $users]);

    $content = __DIR__ . '/../views/admin/user.php';
    require __DIR__ . '/../views/admin/layout_admin.php';
}

public function user()
{
    if ($_SESSION['role'] !== 'admin') {
        header("Location: /dashboard");
        exit;
    }

    require_once __DIR__ . '/../models/User.php';
    $user = new User();

    $users = $user->getAll();

    $content = __DIR__ . '/../views/admin/user.php';
    require __DIR__ . '/../views/admin/layout_admin.php';
}
public function deleteUser()
{
    if ($_SESSION['role'] !== 'admin') {
        header("Location: /dashboard");
        exit;
    }

    if (!isset($_GET['id'])) {
        header("Location: /dashboard/users");
        exit;
    }

    require_once __DIR__ . '/../models/User.php';
    $user = new User();

    $user->delete((int)$_GET['id']);

    header("Location: /dashboard/users");
    exit;
}




}