<?php
require_once __DIR__ . "/../../core/Database.php";

class OrangTua extends Database {

    public function __construct(){
        parent::__construct();
    }

    private function exist($id,$jenis)
    {
        $q = "SELECT id_orang_tua 
              FROM orang_tua 
              WHERE id_pendaftar=? AND jenis=? 
              LIMIT 1";

        $stm = $this->conn->prepare($q);
        $stm->bind_param("is",$id,$jenis);
        $stm->execute();

        return $stm->get_result()->num_rows > 0;
    }


    private function insert($id, $jenis, $d)
    {
        $sql = "INSERT INTO orang_tua 
        (id_pendaftar, jenis, nama_orang_tua, pendidikan_terakhir, pekerjaan,
         penghasilan, nomor_hp, tempat_lahir, tanggal_lahir, alamat_rumah)
        VALUES (?,?,?,?,?,?,?,?,?,?)";

        $st = $this->conn->prepare($sql);

        $st->bind_param(
            "isssssssss",
            $id,
            $jenis,
            $d["nama_".strtolower($jenis)],
            $d["pendidikan_".strtolower($jenis)],
            $d["pekerjaan_".strtolower($jenis)],
            $d["penghasilan_".strtolower($jenis)],
            $d["hp_".strtolower($jenis)],
            $d["tempat_lahir_".strtolower($jenis)],
            $d["tanggal_lahir_".strtolower($jenis)],
            $d["alamat_rumah_".strtolower($jenis)]
        );

        return $st->execute();
    }


    private function update($id,$jenis,$d)
    {
        $sql = "UPDATE orang_tua SET
        nama_orang_tua=?, pendidikan_terakhir=?, pekerjaan=?, penghasilan=?,
        nomor_hp=?, tempat_lahir=?, tanggal_lahir=?, alamat_rumah=?
        WHERE id_pendaftar=? AND jenis=?";

        $st = $this->conn->prepare($sql);

        $st->bind_param(
            "ssssssssis",
            $d["nama_".strtolower($jenis)],
            $d["pendidikan_".strtolower($jenis)],
            $d["pekerjaan_".strtolower($jenis)],
            $d["penghasilan_".strtolower($jenis)],
            $d["hp_".strtolower($jenis)],
            $d["tempat_lahir_".strtolower($jenis)],
            $d["tanggal_lahir_".strtolower($jenis)],
            $d["alamat_rumah_".strtolower($jenis)],
            $id,
            $jenis
        );

        return $st->execute();
    }


    private function save($id,$jenis,$d)
    {
        if($this->exist($id,$jenis))
        {
            return $this->update($id,$jenis,$d);
        }

        return $this->insert($id,$jenis,$d);
    }


    public function saveAyah($id,$d){ return $this->save($id,"Ayah",$d); }
    public function saveIbu($id,$d){  return $this->save($id,"Ibu" ,$d); }
    public function saveWali($id,$d){ return $this->save($id,"Wali",$d); }

}
