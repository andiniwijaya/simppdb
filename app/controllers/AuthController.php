<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../../core/Database.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Pendaftar.php';

class AuthController {

    /* =========================
       VIEW
    ========================== */

    public function homepage(){
        require __DIR__ . '/../views/home.php';
    }

    public function login(){
        require __DIR__ . '/../views/login.php';
    }

    public function register(){
        require __DIR__ . '/../views/register.php';
    }

    public function forgot(){
        require __DIR__ . '/../views/forgot_password.php';
    }

    public function resetForm(){
        if(!isset($_SESSION["reset_id"])){
            header("Location: /forgot");
            exit;
        }
        require __DIR__ . '/../views/reset_password.php';
    }

    /* =========================
       REGISTER PROCESS
    ========================== */
    public function processRegister(){

        $db        = new Database();
        $user      = new User();
        $pendaftar = new Pendaftar();

        $username = trim($_POST["username"]);
        $nisn     = trim($_POST["nisn"]);
        $email    = trim($_POST["email"]);
        $pass     = trim($_POST["password"]);
        $confirm  = trim($_POST["confirm_password"]);

        // VALIDASI
        if(strlen($username) < 3){
            header("Location: /register?error=username_length");
            exit;
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header("Location: /register?error=email_invalid");
            exit;
        }

        if($pass !== $confirm){
            header("Location: /register?error=password_mismatch");
            exit;
        }

        if(strlen($pass) < 8){
            header("Location: /register?error=password_short");
            exit;
        }

        // username sudah dipakai
        if($user->findByUsername($username)->num_rows > 0){
            header("Location: /register?error=username_used");
            exit;
        }

        // email sudah dipakai
        $stmt = $db->conn->prepare(
            "SELECT id_pengguna FROM pengguna WHERE email = ? LIMIT 1"
        );
        $stmt->bind_param("s", $email);
        $stmt->execute();
        if($stmt->get_result()->num_rows > 0){
            header("Location: /register?error=email_used");
            exit;
        }

        // nisn sudah dipakai
        if($pendaftar->nisnExists($nisn)){
            header("Location: /register?error=nisn_used");
            exit;
        }

        // 1. insert ke tabel pengguna
        $user_id = $user->insert($nisn, $username, $email, $pass);

        // 2. insert NISN ke tabel pendaftar
        $pendaftar->insertBasic($user_id, $nisn);

        // Set session user_id untuk konteks verifikasi NISN (meskipun ini mungkin tidak diperlukan di register, tapi dibiarkan sesuai instruksi)
        $_SESSION['user_id'] = $user_id;

        // Kode verifikasi NISN ini tampaknya salah tempat (mungkin dari metode lain seperti verifikasi formulir siswa), tapi dibiarkan tanpa dihapus sesuai instruksi. Perbaikan: tambahkan set session di atas agar tidak error.
        $nisn_input = trim($_POST['nisn']);
        $nisn_db    = $pendaftar->getFormDataByUserId($_SESSION['user_id']);

        if ($nisn_input !== $nisn_db) {
            header("Location: /siswa/formulir?error=nisn_tidak_sesuai");
            exit;
        }

        // =========================

        $_SESSION['success'] = 'Registrasi berhasil, silakan login';
        header("Location: /login");
        exit;
    }

    /* =========================
       LOGIN PROCESS
    ========================== */

    public function processLogin(){

        $db = new Database;
        $login_id = trim($_POST["login_id"]);
        $password = trim($_POST["password"]);

        // login via username
        $sql = "SELECT * FROM pengguna WHERE nama_pengguna = ? LIMIT 1";
        $stmt = $db->conn->prepare($sql);
        $stmt->bind_param("s", $login_id);
        $stmt->execute();
        $result = $stmt->get_result();

        // login via NISN
        if($result->num_rows == 0){
            $sql = "
                SELECT u.*
                FROM pendaftar p
                JOIN pengguna u ON u.id_pengguna = p.id_pengguna
                WHERE p.nisn = ?
                LIMIT 1
            ";
            $stmt = $db->conn->prepare($sql);
            $stmt->bind_param("s", $login_id);
            $stmt->execute();
            $result = $stmt->get_result();
        }

        if($result->num_rows == 0){
            header("Location: /login?error=username");
            exit;
        }

        $row = $result->fetch_assoc();

        if(!password_verify($password, $row["kata_sandi"])){
            header("Location: /login?error=password");
            exit;
        }

        $_SESSION["user_id"]       = $row["id_pengguna"];
        $_SESSION["nama_pengguna"] = $row["nama_pengguna"];
        $_SESSION["role"]          = $row["peran"];

        $_SESSION["login_success"] = true;

        // Perbaikan: Redirect berdasarkan role setelah login sukses, bukan kembali ke /login (yang akan loop).
        if ($_SESSION["role"] === 'admin') {
            header("Location: /admin/dashboard");
        } else {
            header("Location: /siswa/dashboard");
        }
        exit;
    }

    /* =========================
       FORGOT PASSWORD
    ========================== */

    public function processForgot(){

        $db = new Database;
        $email = trim($_POST["email"]);

        $sql = "SELECT id_pengguna FROM pengguna WHERE email=? LIMIT 1";
        $stmt = $db->conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $res = $stmt->get_result();

        if($res->num_rows == 0){
            header("Location: /forgot?error=email");
            exit;
        }

        $row = $res->fetch_assoc();
        $_SESSION["reset_id"] = $row["id_pengguna"];

        header("Location: /reset");
        exit;
    }

    /* =========================
       RESET PASSWORD
    ========================== */

    public function processReset(){

        if(!isset($_SESSION["reset_id"])){
            header("Location: /forgot");
            exit;
        }

        $db = new Database;
        $id = $_SESSION["reset_id"];

        $p1 = $_POST["password"];
        $p2 = $_POST["confirm"];

        if($p1 !== $p2){
            header("Location: /reset?error=password_mismatch");
            exit;
        }

        $hash = password_hash($p1, PASSWORD_DEFAULT);

        // Perbaikan: Gunakan prepared statement untuk keamanan, hindari SQL injection meskipun $id dari session.
        $stmt = $db->conn->prepare("UPDATE pengguna SET kata_sandi = ? WHERE id_pengguna = ?");
        $stmt->bind_param("si", $hash, $id);
        $stmt->execute();

        unset($_SESSION["reset_id"]);

        header("Location: /login?reset_ok");
        exit;
    }
}