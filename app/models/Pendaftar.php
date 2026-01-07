<?php

require_once __DIR__ . "/../../core/Database.php";

class Pendaftar extends Database {

    // UTIL VALIDASI ENUM
    private function sanitizeEnum(&$d) {
        // status_anak
        $enum_status_anak = ['kandung','tiri','angkat'];
        if (!isset($d['status_anak']) || !in_array($d['status_anak'], $enum_status_anak)) {
            $d['status_anak'] = 'kandung';
        }

        // yatim_status
        $enum_yatim = ['bukan','yatim','piatu','yatim_piatu'];
        if (!isset($d['yatim_status']) || !in_array($d['yatim_status'], $enum_yatim)) {
            $d['yatim_status'] = 'bukan';
        }

        // jenis_kelamin
        $enum_jk = ['Laki-laki','Perempuan'];
        if (!isset($d['jenis_kelamin']) || !in_array($d['jenis_kelamin'], $enum_jk)) {
            $d['jenis_kelamin'] = 'Laki-laki';
        }

        // status_tinggal
        $enum_tinggal = ['bersama_ortu','wali','kost','asrama','lainnya'];
        if (!isset($d['status_tinggal']) || !in_array($d['status_tinggal'], $enum_tinggal)) {
            $d['status_tinggal'] = 'bersama_ortu';
        }
    }

    // GET ID PENDAFTAR
    public function getId($id_pengguna) {
        $stmt = $this->conn->prepare(
            "SELECT id_pendaftar FROM pendaftar WHERE id_pengguna=? LIMIT 1"
        );
        $stmt->bind_param("i", $id_pengguna);
        $stmt->execute();

        $r = $stmt->get_result()->fetch_assoc();
        return $r ? (int)$r['id_pendaftar'] : 0;
    }

    public function getFormDataByUserId($id_pengguna) {
        $stmt = $this->conn->prepare(
            "SELECT * FROM pendaftar WHERE id_pengguna=? LIMIT 1"
        );
        $stmt->bind_param("i", $id_pengguna);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }

    // SIMPAN DATA SISWA
    public function saveSiswa($id_pengguna, $d) {
        $this->sanitizeEnum($d);

        $existId = $this->getId($id_pengguna);
        if ($existId > 0) {
            return $this->update($existId, $d);
        }

        return $this->insert($id_pengguna, $d);
    }

    // INSERT
    private function insert($id_pengguna, $d) {
        $this->sanitizeEnum($d);

        $sql = "INSERT INTO pendaftar (
            id_pengguna, nik, nisn, nama_lengkap, jenis_kelamin, tempat_lahir,
            tanggal_lahir, agama, alamat, status_tinggal, asal_sekolah,
            anak_ke, jumlah_saudara, status_anak, yatim_status, bahasa_rumah,
            tinggi_badan, berat_badan, penyakit, tahun_lulus, nomor_hp, email
        ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param(
            "issssssssssiiisssiisss",
            $id_pengguna,
            $d['nik'],
            $d['nisn'],
            $d['nama_lengkap'],
            $d['jenis_kelamin'],
            $d['tempat_lahir'],
            $d['tanggal_lahir'],
            $d['agama'],
            $d['alamat'],
            $d['status_tinggal'],
            $d['asal_sekolah'],
            $d['anak_ke'],
            $d['jumlah_saudara'],
            $d['status_anak'],
            $d['yatim_status'],
            $d['bahasa_rumah'],
            $d['tinggi_badan'],
            $d['berat_badan'],
            $d['penyakit'],
            $d['tahun_lulus'],
            $d['nomor_hp'],
            $d['email']
        );

        return $stmt->execute();
    }

    // UPDATE
    private function update($id, $d) {
        $this->sanitizeEnum($d);

        $sql = "UPDATE pendaftar SET
            nik=?, nisn=?, nama_lengkap=?, jenis_kelamin=?, tempat_lahir=?,
            tanggal_lahir=?, agama=?, alamat=?, status_tinggal=?, asal_sekolah=?,
            anak_ke=?, jumlah_saudara=?, status_anak=?, yatim_status=?, bahasa_rumah=?,
            tinggi_badan=?, berat_badan=?, penyakit=?, tahun_lulus=?, nomor_hp=?, email=?
            WHERE id_pendaftar=?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param(
            "ssssssssssiiisssiisssi",
            $d['nik'],
            $d['nisn'],
            $d['nama_lengkap'],
            $d['jenis_kelamin'],
            $d['tempat_lahir'],
            $d['tanggal_lahir'],
            $d['agama'],
            $d['alamat'],
            $d['status_tinggal'],
            $d['asal_sekolah'],
            $d['anak_ke'],
            $d['jumlah_saudara'],
            $d['status_anak'],
            $d['yatim_status'],
            $d['bahasa_rumah'],
            $d['tinggi_badan'],
            $d['berat_badan'],
            $d['penyakit'],
            $d['tahun_lulus'],
            $d['nomor_hp'],
            $d['email'],
            $id
        );

        return $stmt->execute();
    }
    // ===============================
// UPDATE STATUS DATA SISWA
// ===============================
public function updateStatusData($id_pendaftar, $status)
{
    $sql = "UPDATE pendaftar SET status_data = ? WHERE id_pendaftar = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("si", $status, $id_pendaftar);
    return $stmt->execute();
}

}
