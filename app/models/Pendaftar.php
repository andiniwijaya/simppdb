<?php

require_once __DIR__ . "/../../core/Database.php";

class Pendaftar extends Database {

    /* ===============================
     * ENUM SANITIZER (WAJIB AMAN)
     * =============================== */
    private function sanitizeEnum(&$d)
    {
        // status_anak
        $enum_status_anak = ['kandung','tiri','angkat'];
        if (empty($d['status_anak']) || !in_array(trim($d['status_anak']), $enum_status_anak)) {
            $d['status_anak'] = 'kandung';
        }

        // yatim_status
        $enum_yatim = ['bukan','yatim','piatu','yatim_piatu'];
        if (empty($d['yatim_status']) || !in_array(trim($d['yatim_status']), $enum_yatim)) {
            $d['yatim_status'] = 'bukan';
        }

        // jenis_kelamin
        $enum_jk = ['Laki-laki','Perempuan'];
        if (empty($d['jenis_kelamin']) || !in_array(trim($d['jenis_kelamin']), $enum_jk)) {
            $d['jenis_kelamin'] = 'Laki-laki';
        }

        // status_tinggal
        $enum_tinggal = ['bersama_ortu','wali','kost','asrama','lainnya'];
        if (empty($d['status_tinggal']) || !in_array(trim($d['status_tinggal']), $enum_tinggal)) {
            $d['status_tinggal'] = 'bersama_ortu';
        }
    }

    /* ===============================
     * GET ID PENDAFTAR
     * =============================== */
    public function getId($id_pengguna)
    {
        $stmt = $this->conn->prepare(
            "SELECT id_pendaftar FROM pendaftar WHERE id_pengguna=? LIMIT 1"
        );
        $stmt->bind_param("i", $id_pengguna);
        $stmt->execute();

        $r = $stmt->get_result()->fetch_assoc();
        return $r ? (int)$r['id_pendaftar'] : 0;
    }

    public function getFormDataByUserId($id_pengguna)
    {
        $stmt = $this->conn->prepare(
            "SELECT * FROM pendaftar WHERE id_pengguna=? LIMIT 1"
        );
        $stmt->bind_param("i", $id_pengguna);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }

    /* ===============================
     * SIMPAN / UPDATE DATA SISWA
     * =============================== */
    public function saveSiswa($id_pengguna, $d)
    {
        $this->sanitizeEnum($d);

        $existId = $this->getId($id_pengguna);
        if ($existId > 0) {
            return $this->update($existId, $d);
        }

        return $this->insert($id_pengguna, $d);
    }

    /* ===============================
     * INSERT DATA
     * =============================== */
    private function insert($id_pengguna, $d)
    {
        $this->sanitizeEnum($d);

        $sql = "INSERT INTO pendaftar (
            id_pengguna, nik, nisn, nama_lengkap, jenis_kelamin,
            tempat_lahir, tanggal_lahir, agama, alamat, status_tinggal,
            asal_sekolah, anak_ke, jumlah_saudara, status_anak, yatim_status,
            bahasa_rumah, tinggi_badan, berat_badan, penyakit, tahun_lulus,
            nomor_hp, email
        ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param(
            "issssssssssiiissiiisss",
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
            (int)$d['anak_ke'],
            (int)$d['jumlah_saudara'],
            $d['status_anak'],
            $d['yatim_status'],
            $d['bahasa_rumah'],
            (int)$d['tinggi_badan'],
            (int)$d['berat_badan'],
            $d['penyakit'],
            (int)$d['tahun_lulus'],
            $d['nomor_hp'],
            $d['email']
        );

        return $stmt->execute();
    }

    /* ===============================
     * UPDATE DATA
     * =============================== */
    private function update($id, $d)
    {
        $this->sanitizeEnum($d);

        $sql = "UPDATE pendaftar SET
            nik=?, nisn=?, nama_lengkap=?, jenis_kelamin=?, tempat_lahir=?,
            tanggal_lahir=?, agama=?, alamat=?, status_tinggal=?, asal_sekolah=?,
            anak_ke=?, jumlah_saudara=?, status_anak=?, yatim_status=?, bahasa_rumah=?,
            tinggi_badan=?, berat_badan=?, penyakit=?, tahun_lulus=?, nomor_hp=?, email=?
            WHERE id_pendaftar=?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param(
            "ssssssssssiiissiiisssi",
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
            (int)$d['anak_ke'],
            (int)$d['jumlah_saudara'],
            $d['status_anak'],
            $d['yatim_status'],
            $d['bahasa_rumah'],
            (int)$d['tinggi_badan'],
            (int)$d['berat_badan'],
            $d['penyakit'],
            (int)$d['tahun_lulus'],
            $d['nomor_hp'],
            $d['email'],
            (int)$id
        );

        return $stmt->execute();
    }

    /* ===============================
     * STATUS DATA SISWA
     * =============================== */
    public function updateStatusData($id_pendaftar, $status)
    {
        $sql = "UPDATE pendaftar SET status_data=? WHERE id_pendaftar=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("si", $status, $id_pendaftar);
        return $stmt->execute();
    }

    /* ===============================
     * UTIL ADMIN
     * =============================== */
    public function countAll()
    {
        $r = $this->conn->query("SELECT COUNT(*) total FROM pendaftar")->fetch_assoc();
        return (int)$r['total'];
    }

    public function getLatest($limit = 5)
    {
        $limit = (int)$limit;
        return $this->conn
            ->query("SELECT * FROM pendaftar ORDER BY tanggal_daftar DESC LIMIT $limit")
            ->fetch_all(MYSQLI_ASSOC);
    }

    public function updateByAdmin($id, $data)
    {
        $sql = "UPDATE pendaftar SET nama_lengkap=?, nisn=?, asal_sekolah=?, status_data=? WHERE id_pendaftar=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param(
            "ssssi",
            $data['nama_lengkap'],
            $data['nisn'],
            $data['asal_sekolah'],
            $data['status_data'],
            $id
        );
        return $stmt->execute();
    }

    public function nisnExists($nisn)
    {
        $stmt = $this->conn->prepare("SELECT id_pendaftar FROM pendaftar WHERE nisn=?");
        $stmt->bind_param("s", $nisn);
        $stmt->execute();
        $stmt->store_result();
        return $stmt->num_rows > 0;
    }
}
