<?php

require_once __DIR__ . '/../../core/Database.php';

class User {

    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function insert($username,$email,$password){
        $hash  = hashPassword($password);

        $stmt = $this->db->conn->prepare("
            INSERT INTO pengguna (nama_pengguna,email,kata_sandi,peran,token)
            VALUES (?,?,?,'siswa',?)
        ");

        $stmt->bind_param("ssss", $username,$email,$hash,$token);
        $stmt->execute();

        return $this->db->conn->insert_id;
    }

    public function findByUsername($username){
        $username = mysqli_real_escape_string($this->db->conn,$username);

        $sql = "SELECT * FROM pengguna WHERE nama_pengguna='$username' LIMIT 1";
        return $this->db->conn->query($sql);
    }
}
