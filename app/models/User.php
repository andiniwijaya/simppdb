<?php

require_once __DIR__ . '/../../core/Database.php';

class User {

    private $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->conn;
    }

    // =============================
    // INSERT USER BARU
    // =============================
    public function insert($username, $email, $password)
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "
            INSERT INTO pengguna (nama_pengguna, email, kata_sandi)
            VALUES (?,?,?)
        ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sss", $username, $email, $hash);
        $stmt->execute();

        return $this->conn->insert_id;
    }

    // =============================
    // CARI USERNAME
    // =============================
    public function findByUsername($username)
    {
        $sql = "SELECT * FROM pengguna WHERE nama_pengguna = ? LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        return $stmt->get_result();
    }

    // =============================
    // AMBIL SEMUA USER (ADMIN)
    // =============================
public function getAll()
{
    $sql = "
        SELECT 
            id_pengguna,
            nama_pengguna,
            email,
            kata_sandi,
            dibuat_pada
        FROM pengguna
        ORDER BY dibuat_pada DESC
    ";

    return $this->conn
                ->query($sql)
                ->fetch_all(MYSQLI_ASSOC);
}


    // =============================
    // HAPUS USER
    // =============================
    public function delete($id)
    {
        $stmt = $this->conn->prepare(
            "DELETE FROM pengguna WHERE id_pengguna = ?"
        );
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
}
