<?php

require_once __DIR__ . '/../../core/Database.php';

class Payment {

    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    // siswa upload bukti pembayaran → menunggu verifikasi
    public function insertPembayaran($data){
        
        $sql = "INSERT INTO pembayaran
                (id_pendaftar, jenis_pembayaran, nama_rekening, bukti, status_bayar, tanggal)
                VALUES (?,?,?,?, 'menunggu', NOW())
                ON DUPLICATE KEY UPDATE 
                    nama_rekening = VALUES(nama_rekening),
                    bukti = VALUES(bukti),
                    status_bayar = 'menunggu',
                    tanggal = NOW()";

        $stmt = $this->db->conn->prepare($sql);
        
        $stmt->bind_param(
            "isss",
            $data['id_pendaftar'],
            $data['jenis'],
            $data['rekening'],
            $data['file']
        );

        return $stmt->execute();
    }

    // status lunas dihitung admin
    public function countPaid(){
        $sql = "SELECT COUNT(*) total FROM pembayaran WHERE status_bayar='lunas'";
        return $this->db->conn->query($sql)->fetch_assoc()["total"];
    }

    // last payment siswa
    public function lastPayment($id_pendaftar){

        $id_pendaftar = intval($id_pendaftar);

        $sql = "SELECT *
                FROM pembayaran
                WHERE id_pendaftar = $id_pendaftar
                ORDER BY id_pembayaran DESC
                LIMIT 1";

        $result = $this->db->conn->query($sql);

        if(!$result || !$result->num_rows){
            return null;
        }

        return $result->fetch_assoc();
    }

    // ambil semua pembayaran untuk admin
    public function getAllPayments(){

        $sql = "SELECT pembayaran.*, pendaftar.nama_lengkap 
                FROM pembayaran
                JOIN pendaftar ON pendaftar.id_pendaftar = pembayaran.id_pendaftar
                ORDER BY id_pembayaran DESC";

        return $this->db->conn->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    // verifikasi status
    public function updateStatus($id_payment, $status){

        $stmt = $this->db->conn->prepare(
            "UPDATE pembayaran SET status_bayar=? WHERE id_pembayaran=?"
        );

        $stmt->bind_param("si", $status, $id_payment);
        return $stmt->execute();
    }

}
