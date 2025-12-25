<?php
require_once __DIR__ . "/../../core/Database.php";

class Payment extends Database {

    public function count()
{
    $sql = "SELECT COUNT(*) AS total FROM pembayaran";
    $result = $this->conn->query($sql);
    $row = $result->fetch_assoc();

    return (int) $row['total'];

}

public function getTotalBayar($id_pendaftar)
{
    $sql = "
        SELECT IFNULL(SUM(jumlah), 0) AS total
        FROM pembayaran
        WHERE id_pendaftar = ?
        AND status_bayar = 'lunas'
    ";

    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $id_pendaftar);
    $stmt->execute();

    $row = $stmt->get_result()->fetch_assoc();
    return (int) $row['total'];
}
public function getStatus($id_pendaftar)
{
    $sql = "
        SELECT status_bayar
        FROM pembayaran
        WHERE id_pendaftar = ?
        ORDER BY tanggal_bayar DESC
        LIMIT 1
    ";

    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $id_pendaftar);
    $stmt->execute();

    $row = $stmt->get_result()->fetch_assoc();

    // kalau belum pernah bayar
    if (!$row) {
        return "belum";
    }

    return $row["status_bayar"];
}
public function getAllPayments()
{
    $sql = "
        SELECT *
        FROM pembayaran
        ORDER BY tanggal_bayar DESC
    ";

    $result = $this->conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}



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
