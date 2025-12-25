<?php
require_once __DIR__ . "/../../core/Database.php";

class Payment extends Database
{
    /**
     * Total infaq yang harus dibayar siswa
     */
    const TOTAL_INFAQ = 500000;

    // ==================================================
    // DASHBOARD ADMIN
    // ==================================================

    // Hitung total data pembayaran
    public function count()
    {
        $sql = "SELECT COUNT(*) AS total FROM pembayaran";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();

        return (int) $row['total'];
    }

    // Ambil semua pembayaran (administrasi admin)
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

    // ==================================================
    // PEMBAYARAN SISWA
    // ==================================================

    // Total nominal yang sudah dibayar (lunas saja)
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

    // Status pembayaran terakhir siswa
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

        // Jika belum pernah melakukan pembayaran
        if (!$row) {
            return "belum";
        }

        return $row["status_bayar"];
    }

    // Riwayat pembayaran siswa
    public function getRiwayat($id_pendaftar)
    {
        $sql = "
            SELECT tanggal_bayar, jumlah, bukti_transfer, status_bayar
            FROM pembayaran
            WHERE id_pendaftar = ?
            ORDER BY tanggal_bayar DESC
        ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id_pendaftar);
        $stmt->execute();

        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    // ==================================================
    // DASHBOARD SISWA (LEGACY / PENDUKUNG)
    // ==================================================

    // Ambil pembayaran terakhir
    public function lastPayment($id_pendaftar)
    {
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

    // Total lunas (alternatif / kompatibilitas)
    public function countPaid($id_pendaftar)
    {
        return $this->getTotalBayar($id_pendaftar);
    }

    // ==================================================
    // SIMPAN PEMBAYARAN
    // ==================================================

    // Simpan pembayaran (cicilan)
    public function insert($id_pendaftar, $jumlah, $bukti)
    {
        $sql = "
            INSERT INTO pembayaran
                (id_pendaftar, tanggal_bayar, jumlah, bukti_transfer, status_bayar)
            VALUES
                (?, NOW(), ?, ?, 'menunggu')
        ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iis", $id_pendaftar, $jumlah, $bukti);

        return $stmt->execute();
    }
}
