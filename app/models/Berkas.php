<?php

require_once __DIR__ . "/../../core/Database.php";

class Berkas extends Database {

    //  AMBIL SEMUA BERKAS SISWA 
    public function getAll($id_pendaftar){
        $sql = "SELECT * FROM berkas_pendaftar
                WHERE id_pendaftar = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id_pendaftar);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    //  CEK DUPLIKASI JENIS BERKAS 
    public function getByJenis($id_pendaftar, $jenis){
        $sql = "SELECT id_berkas FROM berkas_pendaftar
                WHERE id_pendaftar = ? AND jenis_berkas = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("is", $id_pendaftar, $jenis);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    //  INSERT BERKAS 
    public function insert($id_pendaftar, $jenis, $lokasi){

        $sql = "INSERT INTO berkas_pendaftar
                (id_pendaftar, jenis_berkas, lokasi_berkas)
                VALUES (?, ?, ?)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iss", $id_pendaftar, $jenis, $lokasi);
        return $stmt->execute();
    }

    //  CEK STATUS LENGKAP BERKAS
    public function getStatusLengkap($id_pendaftar) {

        /**
         *  KIP TIDAK WAJIB
         *  KTP HARUS AYAH + IBU
         */
        $wajib = [
            'kartu_keluarga',
            'ktp_ayah',
            'ktp_ibu',
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

        // mapping: jenis_berkas => status_berkas
        $map = [];
        foreach ($rows as $r) {
            $map[$r['jenis_berkas']] = $r['status_berkas'];
        }

        // ❌ CEK SEMUA BERKAS WAJIB
        foreach ($wajib as $jenis) {

            // belum diupload
            if (!isset($map[$jenis])) {
                return "menunggu";
            }

            // sudah ada tapi invalid
            if ($map[$jenis] === 'invalid') {
                return "menunggu";
            }
        }

        // ✅ SEMUA WAJIB ADA & VALID / MENUNGGU VALIDASI
        return "lengkap";
    }
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

    $sql = "
        SELECT jenis_berkas, status_berkas
        FROM berkas_pendaftar
        WHERE id_pendaftar = ?
    ";

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
    public function getProgress($id_pendaftar){

        $wajib = [
            'kartu_keluarga',
            'ktp_ayah',
            'ktp_ibu',
            'ijazah_sd',
            'surat_keterangan_lulus',
            'akta_kelahiran',
            'pas_foto'
        ];

        $sql = "
            SELECT jenis_berkas
            FROM berkas_pendaftar
            WHERE id_pendaftar = ?
        ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id_pendaftar);
        $stmt->execute();
        $rows = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        $uploaded = array_column($rows, 'jenis_berkas');

        $done = count(array_intersect($wajib, $uploaded));
        $total = count($wajib);

        return round(($done / $total) * 100);
    }

    // AMBIL SEMUA BERKAS UNTUK ADMIN
public function getAllForAdmin()
{
    $sql = "
        SELECT 
            b.*, 
            p.nama_lengkap
        FROM berkas_pendaftar b
        JOIN pendaftar p 
            ON b.id_pendaftar = p.id_pendaftar
        ORDER BY b.uploaded_at DESC
    ";

    return $this->conn->query($sql)->fetch_all(MYSQLI_ASSOC);
}

}
