<?php
require_once __DIR__ . "/../../core/Database.php";

class Payment extends Database {

    // ambil pembayaran terakhir (dashboard lama)
    public function lastPayment($id_pendaftar){

        $sql = "
            SELECT *
            FROM pembayaran
            WHERE id_pendaftar = ?
            ORDER BY tanggal_bayar DESC
            LIMIT 1
        ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id_pendaftar);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }

    // TOTAL YANG SUDAH DIBAYAR
    public function countPaid($id_pendaftar) {

        $sql = "
            SELECT IFNULL(SUM(jumlah),0) AS total
            FROM pembayaran
            WHERE id_pendaftar = ?
            AND status_bayar = 'lunas'
        ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id_pendaftar);
        $stmt->execute();

        $row = $stmt->get_result()->fetch_assoc();
        return (int)$row["total"];
    }

    // simpan pembayaran (cicilan)
    public function insert($id_pendaftar, $jumlah, $bukti){

        $sql = "
            INSERT INTO pembayaran
            (id_pendaftar, tanggal_bayar, jumlah, bukti_transfer, status_bayar)
            VALUES (?, NOW(), ?, ?, 'menunggu')
        ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iis", $id_pendaftar, $jumlah, $bukti);
        return $stmt->execute();
    }
}
