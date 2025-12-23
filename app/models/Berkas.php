<?php

require_once __DIR__ . "/../../core/Database.php";

class Berkas extends Database {

    // ================= AMBIL SEMUA BERKAS SISWA =================
    public function getAll($id_pendaftar){
        $sql = "SELECT * FROM berkas_pendaftar
                WHERE id_pendaftar = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id_pendaftar);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    // ================= INSERT BERKAS =================
    public function insert($id_pendaftar, $jenis, $lokasi){

        $sql = "INSERT INTO berkas_pendaftar
                (id_pendaftar, jenis_berkas, lokasi_berkas)
                VALUES (?, ?, ?)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iss", $id_pendaftar, $jenis, $lokasi);
        return $stmt->execute();
    }

    // ================= CEK STATUS LENGKAP BERKAS =================
    public function getStatusLengkap($id_pendaftar) {

        // ❗ KIP TIDAK WAJIB
        $wajib = [
            'kartu_keluarga',
            'ktp_orang_tua',
            'ijazah_sd',
            'surat_keterangan_lulus',
            'akta_kelahiran',
            'pas_foto'
        ];

        $sql = "
            SELECT jenis_berkas, status_berkas
            FROM berkas_pendaftar
            WHERE id_pendaftar = ?
        ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id_pendaftar);
        $stmt->execute();
        $rows = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        // ❌ BELUM UPLOAD SAMA SEKALI
        if (count($rows) === 0) {
            return "belum";
        }

        // mapping: jenis_berkas => status
        $map = [];
        foreach ($rows as $r) {
            $map[$r['jenis_berkas']] = $r['status_berkas'];
        }

        // cek semua berkas wajib
        foreach ($wajib as $jenis) {
            // belum ada atau invalid
            if (
                !isset($map[$jenis]) ||
                $map[$jenis] === 'invalid'
            ) {
                return "menunggu";
            }
        }

        // ✅ SEMUA WAJIB ADA & VALID
        return "lengkap";
    }
}
