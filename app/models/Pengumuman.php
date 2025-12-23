<?php
require_once __DIR__ . "/../../core/Database.php";

class Pengumuman extends Database {

    // Ambil status penerimaan berdasarkan pendaftar
    public function getStatusByPendaftar($id_pendaftar){

        $sql = "
            SELECT status_penerimaan
            FROM pengumuman
            WHERE id_pendaftar = ?
            LIMIT 1
        ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id_pendaftar);
        $stmt->execute();

        $row = $stmt->get_result()->fetch_assoc();

        return $row["status_penerimaan"] ?? "menunggu";
    }

    // Buat data pengumuman default jika belum ada
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
