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

        $sql = "
        SELECT *
        FROM pendaftar
        WHERE id_pengguna = ?
        LIMIT 1
        ";

        $stmt = $this->db->conn->prepare($sql);
        $stmt->bind_param("i", $id_pengguna);
        $stmt->execute();
        
        return $stmt->get_result()->fetch_assoc();
    }

    public function nisnExists($nisn) {

        $sql = "SELECT id_pendaftar FROM pendaftar WHERE nisn = ? LIMIT 1";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $nisn);
        $stmt->execute();

        $res = $stmt->get_result();

        return $res->num_rows > 0;
    }

}
