<?php

require_once __DIR__ . '/../../core/Database.php';

class User {

    private $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->conn; // MYSQLI
    }
    // INSERT USER BARU
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
    // CARI USERNAME
    public function findByUsername($username)
    {
        $sql = "SELECT * FROM pengguna WHERE nama_pengguna = ? LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        return $stmt->get_result();
    }
    // AMBIL SEMUA USER
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
    // AMBIL USER BY ID (EDIT)
    public function getById($id)
    {
        $sql = "SELECT * FROM pengguna WHERE id_pengguna = ? LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }
    // UPDATE USER
    public function update($id, $data)
    {
        $fields = [];
        $values = [];
        $types  = "";

        foreach ($data as $key => $value) {
            $fields[] = "$key = ?";
            $values[] = $value;
            $types   .= "s";
        }

        $types .= "i";
        $values[] = $id;

        $sql = "
            UPDATE pengguna
            SET " . implode(", ", $fields) . "
            WHERE id_pengguna = ?
        ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param($types, ...$values);
        return $stmt->execute();
    }
    // HAPUS USER
    public function delete($id)
    {
        $stmt = $this->conn->prepare(
            "DELETE FROM pengguna WHERE id_pengguna = ?"
        );
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
}
