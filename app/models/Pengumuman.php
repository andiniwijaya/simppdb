<?php
require_once __DIR__ . "/../../core/Database.php";

class Pengumuman extends Database {

    // ambil 1 baris pengumuman
    public function getByPendaftar($id_pendaftar){

        $sql = "
            SELECT *
            FROM pengumuman
            WHERE id_pendaftar = ?
            LIMIT 1
        ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id_pendaftar);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }

    // ambil hanya status (dipakai dashboard)
    public function getStatusByPendaftar($id_pendaftar){

        $row = $this->getByPendaftar($id_pendaftar);
        return $row["status_penerimaan"] ?? "menunggu";
    }

    // buat default pengumuman jika belum ada
    public function createIfNotExists($id_pendaftar){

        $sql = "
            INSERT IGNORE INTO pengumuman (id_pendaftar)
            VALUES (?)
        ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id_pendaftar);
        return $stmt->execute();
    }
}
