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

    // Ambil semua pembayaran (ADMINISTRASI ADMIN)
    // ✅ SUDAH JOIN ke tabel pendaftar
    public function getAllPayments()
    {
        $sql = "
            SELECT 
                pb.id_pembayaran,
                pb.id_pendaftar,
                pb.tanggal_bayar,
                pb.jumlah,
                pb.bukti_transfer,
                pb.status_bayar,
                pd.nama_lengkap
            FROM pembayaran pb
            LEFT JOIN pendaftar pd 
                ON pd.id_pendaftar = pb.id_pendaftar
            ORDER BY pb.tanggal_bayar DESC
        ";

        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // ==================================================
    // PEMBAYARAN SISWA
    // ==================================================

    // Total nominal yang sudah dibayar (status lunas)
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

        if (!$row) {
            return "belum";
        }

        return $row["status_bayar"];
    }

    // Riwayat pembayaran siswa
    public function getRiwayat($id_pendaftar)
    {
        $sql = "
            SELECT 
                tanggal_bayar,
                jumlah,
                bukti_transfer,
                status_bayar
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
    // DASHBOARD SISWA
    // ==================================================

    // Ambil pembayaran terakhir siswa
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

    // Alias total bayar (kompatibilitas)
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
