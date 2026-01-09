<?php

require_once __DIR__ . "/../../core/Database.php";

class Berkas extends Database {

    // ================= AMBIL SEMUA BERKAS SISWA =================
    public function getAll($id_pendaftar)
    {
        $sql = "SELECT * FROM berkas_pendaftar WHERE id_pendaftar = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id_pendaftar);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    // ================= CEK DUPLIKASI JENIS BERKAS =================
    public function getByJenis($id_pendaftar, $jenis)
    {
        $sql = "SELECT id_berkas FROM berkas_pendaftar 
                WHERE id_pendaftar = ? AND jenis_berkas = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("is", $id_pendaftar, $jenis);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // ================= INSERT BERKAS =================
    public function insert($id_pendaftar, $jenis, $lokasi)
    {
        $sql = "INSERT INTO berkas_pendaftar 
                (id_pendaftar, jenis_berkas, lokasi_berkas, status_berkas)
                VALUES (?, ?, ?, 'menunggu')";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iss", $id_pendaftar, $jenis, $lokasi);
        return $stmt->execute();
    }

    // ================= CEK STATUS KELENGKAPAN =================
    public function getStatusLengkap($id_pendaftar)
    {
        $wajib = [
            'kartu_keluarga',
            'ktp_ayah',
            'ktp_ibu',
            'ijazah_sd',
            'surat_keterangan_lulus',
            'akta_kelahiran',
            'pas_foto'
        ];

        $sql = "SELECT jenis_berkas, status_berkas 
                FROM berkas_pendaftar 
                WHERE id_pendaftar = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id_pendaftar);
        $stmt->execute();
        $rows = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        if (count($rows) === 0) return "belum";

        $map = [];
        foreach ($rows as $r) {
            $map[$r['jenis_berkas']] = $r['status_berkas'];
        }

        foreach ($wajib as $jenis) {
            if (!isset($map[$jenis])) return "menunggu";
            if ($map[$jenis] === 'invalid') return "menunggu";
        }

        return "lengkap";
    }

    // ================= CEK SEMUA VALID =================
    public function isSemuaBerkasValid($id_pendaftar)
    {
        $wajib = [
            'kartu_keluarga',
            'ktp_ayah',
            'ktp_ibu',
            'ijazah_sd',
            'surat_keterangan_lulus',
            'akta_kelahiran',
            'pas_foto'
        ];

        $sql = "SELECT jenis_berkas, status_berkas 
                FROM berkas_pendaftar 
                WHERE id_pendaftar = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id_pendaftar);
        $stmt->execute();
        $rows = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        $map = [];
        foreach ($rows as $r) {
            $map[$r['jenis_berkas']] = $r['status_berkas'];
        }

        foreach ($wajib as $jenis) {
            if (!isset($map[$jenis])) return false;
            if ($map[$jenis] !== 'valid') return false;
        }

        return true;
    }

    // ================= HITUNG PROGRESS (%) =================
    public function getProgress($id_pendaftar)
    {
        $wajib = [
            'kartu_keluarga',
            'ktp_ayah',
            'ktp_ibu',
            'ijazah_sd',
            'surat_keterangan_lulus',
            'akta_kelahiran',
            'pas_foto'
        ];

        $sql = "SELECT jenis_berkas FROM berkas_pendaftar WHERE id_pendaftar = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id_pendaftar);
        $stmt->execute();
        $rows = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        $uploaded = array_column($rows, 'jenis_berkas');
        $done = count(array_intersect($wajib, $uploaded));
        return round(($done / count($wajib)) * 100);
    }

    // ================= AMBIL SEMUA BERKAS (ADMIN) =================
  public function getAllForAdmin()
{
    $sql = "SELECT 
                b.id_berkas,
                b.id_pendaftar,
                b.nama_file,
                b.status,
                p.nama_lengkap
            FROM berkas b
            JOIN pendaftar p ON b.id_pendaftar = p.id_pendaftar
            ORDER BY b.id_berkas DESC";

    $result = $this->conn->query($sql);
    return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
}


    // ================= UPDATE STATUS BERKAS =================
    public function updateStatus($id_berkas, $status)
    {
        $sql = "UPDATE berkas_pendaftar SET status_berkas=? WHERE id_berkas=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("si", $status, $id_berkas);
        return $stmt->execute();
    }

    // ================= AMBIL ID PENDAFTAR DARI BERKAS =================
    public function getPendaftarId($id_berkas)
    {
        $sql = "SELECT id_pendaftar FROM berkas_pendaftar WHERE id_berkas=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id_berkas);
        $stmt->execute();
        $row = $stmt->get_result()->fetch_assoc();
        return $row ? $row['id_pendaftar'] : null;
    }
}
