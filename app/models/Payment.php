<?php
require_once __DIR__ . "/../../core/Database.php";

class Payment extends Database {

    const TOTAL_INFAQ = 500000;

    public function insert($id_pendaftar, $jumlah, $bukti){

        $sql = "INSERT INTO pembayaran
                (id_pendaftar, jumlah, bukti_transfer)
                VALUES (?,?,?)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iis", $id_pendaftar, $jumlah, $bukti);
        return $stmt->execute();
    }

    public function getTotalBayar($id_pendaftar){

        $sql = "SELECT SUM(jumlah) as total
                FROM pembayaran
                WHERE id_pendaftar = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i",$id_pendaftar);
        $stmt->execute();

        return (int) ($stmt->get_result()->fetch_assoc()["total"] ?? 0);
    }

    public function getStatus($id_pendaftar){

        $total = $this->getTotalBayar($id_pendaftar);

        if($total <= 0){
            return "belum";
        }

        if($total >= self::TOTAL_INFAQ){
            return "lunas";
        }

        return "menunggu";
    }

    public function getRiwayat($id_pendaftar){
        $stmt = $this->conn->prepare(
            "SELECT * FROM pembayaran
             WHERE id_pendaftar=?
             ORDER BY tanggal_bayar DESC"
        );
        $stmt->bind_param("i",$id_pendaftar);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    // Ambil pembayaran terakhir siswa
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

    // Total pembayaran lunas
    public function totalLunas($id_pendaftar){

        $sql = "
            SELECT SUM(jumlah) total
            FROM pembayaran
            WHERE id_pendaftar = ?
              AND status_bayar = 'lunas'
        ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id_pendaftar);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc()["total"] ?? 0;
    }

}
