<?php
require_once __DIR__ . "/../../core/Database.php";

class Pengumuman extends Database {

    public function getByPendaftar($id_pendaftar){
        $stmt = $this->conn->prepare("
            SELECT status_penerimaan
            FROM pengumuman
            WHERE id_pendaftar = ?
            LIMIT 1
        ");
        $stmt->bind_param("i",$id_pendaftar);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function createIfNotExists($id_pendaftar){
        $stmt = $this->conn->prepare("
            INSERT IGNORE INTO pengumuman (id_pendaftar)
            VALUES (?)
        ");
        $stmt->bind_param("i",$id_pendaftar);
        return $stmt->execute();
    }
}
