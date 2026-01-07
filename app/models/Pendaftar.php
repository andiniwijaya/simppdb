<?php

require_once __DIR__ . "/../../core/Database.php";

class Pendaftar extends Database {

    // GET ID PENDAFTAR BY USER
    public function getId($id_pengguna)
    {
        $sql = "SELECT id_pendaftar FROM pendaftar WHERE id_pengguna = ? LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id_pengguna);
        $stmt->execute();

        $r = $stmt->get_result()->fetch_assoc();
        return $r ? (int)$r["id_pendaftar"] : 0;
    }

    // GET DATA FORM SISWA
    public function getFormDataByUserId($id_pengguna)
    {
        $sql = "SELECT * FROM pendaftar WHERE id_pengguna = ? LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id_pengguna);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }

    // COUNT ALL PENDAFTAR
    public function countAll()
    {
        $sql = "SELECT COUNT(*) AS total FROM pendaftar";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        return (int)$row['total'];
    }

    // GET DATA TERBARU
    public function getLatest()
    {
        $sql = "SELECT * FROM pendaftar ORDER BY id_pendaftar DESC";
        $result = $this->conn->query($sql);

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

    // SIMPAN DATA SISWA (AUTO INSERT / UPDATE)
    public function saveSiswa($id_pengguna, $d)
    {
        $existId = $this->getId($id_pengguna);

        if ($existId > 0) {
            return $this->update($existId, $d);
        }

        return $this->insert($id_pengguna, $d);
    }

    // INSERT DATA
    private function insert($id_pengguna, $d)
    {
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

    // UPDATE DATA
    private function update($id, $d)
    {
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

    // CEK NISN EXIST
    public function nisnExists($nisn)
    {
        $sql = "SELECT id_pendaftar FROM pendaftar WHERE nisn = ? LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $nisn);
        $stmt->execute();

        return $stmt->get_result()->num_rows > 0;
    }

    // GET BY ID (ADMIN)
    public function getById($id)
    {
        $sql = "SELECT * FROM pendaftar WHERE id_pendaftar = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }

    // UPDATE BY ADMIN
    public function updateByAdmin($id, $data)
    {
        $sql = "UPDATE pendaftar SET
                nama_lengkap = ?,
                nisn = ?,
                asal_sekolah = ?,
                status_data = ?
                WHERE id_pendaftar = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param(
            "ssssi",
            $data["nama_lengkap"],
            $data["nisn"],
            $data["asal_sekolah"],
            $data["status_data"],
            $id
        );

        return $stmt->execute();
    }

    // DELETE DATA
    public function delete($id)
    {
        $sql = "DELETE FROM pendaftar WHERE id_pendaftar = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    // ======================
    // GET DATA PPDB LENGKAP (EXPORT)
    // ======================
    public function getAllLengkap()
    {
        $sql = "
            SELECT 
                p.id_pendaftar,
                p.nama_lengkap,
                p.nisn,
                p.asal_sekolah,
                p.status_data,
                p.tanggal_daftar,

                ayah.nama_orang_tua AS nama_ayah,
                ayah.nomor_hp       AS hp_ayah,

                ibu.nama_orang_tua  AS nama_ibu,
                ibu.nomor_hp        AS hp_ibu,

                wali.nama_orang_tua AS nama_wali,
                wali.nomor_hp       AS hp_wali

            FROM pendaftar p
            LEFT JOIN orang_tua ayah 
                ON p.id_pendaftar = ayah.id_pendaftar AND ayah.jenis='Ayah'
            LEFT JOIN orang_tua ibu  
                ON p.id_pendaftar = ibu.id_pendaftar AND ibu.jenis='Ibu'
            LEFT JOIN orang_tua wali 
                ON p.id_pendaftar = wali.id_pendaftar AND wali.jenis='Wali'
            ORDER BY p.id_pendaftar DESC
        ";

        $result = $this->conn->query($sql);

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

    // ======================
    // UPDATE STATUS DATA SISWA (SETELAH PEMBAYARAN LUNAS)
    // ======================
    public function updateStatusData($id_pendaftar, $status)
    {
        $sql = "UPDATE pendaftar SET status_data = ? WHERE id_pendaftar = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("si", $status, $id_pendaftar);
        return $stmt->execute();
    }
}
