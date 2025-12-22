<?php
require_once __DIR__ . "/../../core/Database.php";

class OrangTua {

    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    private function insert($jenis, $id, $data){

        $sql = "INSERT INTO orang_tua
        (id_pendaftar, jenis, nama_orang_tua, pendidikan,
        pekerjaan, penghasilan, nomor_hp)
        VALUES (?,?,?,?,?,?,?)";

        $stmt = $this->db->conn->prepare($sql);

        $stmt->bind_param(
            "issssss",
            $id,
            $jenis,
            $data['nama_'. strtolower($jenis)],
            $data['pendidikan_'. strtolower($jenis)],
            $data['pekerjaan_'. strtolower($jenis)],
            $data['penghasilan_'. strtolower($jenis)],
            $data['hp_'. strtolower($jenis)]
        );

        $stmt->execute();
    }

    public function insertAyah($id,$d){ $this->insert("Ayah",$id,$d); }
    public function insertIbu($id,$d){ $this->insert("Ibu",$id,$d); }
    public function insertWali($id,$d){ $this->insert("Wali",$id,$d); }
}
