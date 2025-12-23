<?php

require __DIR__ . "/../../core/Database.php";

class Berkas extends Database {

    public function getAll($id_pendaftar){
        $sql = "SELECT * FROM berkas_pendaftar
                WHERE id_pendaftar = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id_pendaftar);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }


    public function insert($id_pendaftar, $jenis, $lokasi){

        $sql = "INSERT INTO berkas_pendaftar(id_pendaftar, jenis_berkas, lokasi_berkas)
                VALUES(?, ?, ?)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iss", $id_pendaftar, $jenis, $lokasi);
        return $stmt->execute();
    }
}
