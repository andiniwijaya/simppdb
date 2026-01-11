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
    public function getAll()
{
    $sql = "
        SELECT 
            p.id_pendaftar,
            p.nama_lengkap,
            MAX(pg.status_penerimaan) AS status_penerimaan
        FROM pengumuman pg
        JOIN pendaftar p 
            ON p.id_pendaftar = pg.id_pendaftar
        GROUP BY p.id_pendaftar, p.nama_lengkap
    ";

    $stmt = $this->conn->prepare($sql);
    $stmt->execute();

    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}
public function setStatus($id_pendaftar, $status)
{
    $sql = "
        UPDATE pengumuman
        SET status_penerimaan = ?
        WHERE id_pendaftar = ?
    ";

    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("si", $status, $id_pendaftar);
    return $stmt->execute();
}


}
