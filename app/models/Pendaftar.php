<?php

require_once __DIR__ . "/../../core/Database.php";

class Pendaftar {

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function insert($id_pengguna, $d) {

        $sql = "INSERT INTO pendaftar
        (id_pengguna, nik, nisn, nama_lengkap, jenis_kelamin,
        tempat_lahir, tanggal_lahir, agama, alamat, status_tinggal,
        asal_sekolah, anak_ke, jumlah_saudara, tahun_lulus, nomor_hp)
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $stmt = $this->db->conn->prepare($sql);

        $stmt->bind_param(
            "issssssssssiiis",
            $id_pengguna,
            $d['nik'], $d['nisn'], $d['nama_lengkap'], $d['jenis_kelamin'],
            $d['tempat_lahir'], $d['tanggal_lahir'], $d['agama'], $d['alamat'],
            $d['status_tinggal'], $d['asal_sekolah'], $d['anak_ke'],
            $d['jumlah_saudara'], $d['tahun_lulus'], $d['nomor_hp']
        );

        $stmt->execute();
        return $this->db->conn->insert_id;
    }

    public function getFormDataByUserId($id_pengguna) {

        $sql = "SELECT * FROM pendaftar WHERE id_pengguna = ? LIMIT 1";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->bind_param("i", $id_pengguna);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }

    public function countAll()
    {
        $sql = "SELECT COUNT(*) AS total FROM pendaftar";
        $result = $this->db->conn->query($sql);
        $row = $result->fetch_assoc();
        return $row['total'];
    }

    // ⬇️ TAMBAHAN AGAR TIDAK ERROR (DIPANGGIL CONTROLLER)
    public function getLatest()
    {
        $sql = "SELECT * FROM pendaftar ORDER BY id_pendaftar DESC";
        $result = $this->db->conn->query($sql);

        $data = [];
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }

        return $data;
    }
}
