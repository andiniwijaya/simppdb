<?php

require_once __DIR__ . '/../../core/Database.php';

class User {

    public $conn;

    public function __construct(){
        $db = new Database;
        $this->conn = $db->conn;
    }

    // INSERT USER BARU (DEFAULT siswa)
    public function insert($username, $email, $password){

        $hash = hashPassword($password);

        // peran tidak perlu di bind, default siswa
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
    public function findByUsername($username){

        $sql = "SELECT * FROM pengguna WHERE nama_pengguna = ? LIMIT 1";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();

        return $stmt->get_result();
    }
      public function getAll()
    {
        $sql = "SELECT id, username, nisn, email, role, created_at
                FROM pengguna
                ORDER BY created_at DESC";
        return $this->conn->query($sql);
    }

}
