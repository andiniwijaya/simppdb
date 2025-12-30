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
    
        /* ======================
       GET DATA ORANG TUA
       (AYAH + IBU)
       ====================== */
    public function getOrtuByPendaftar($id_pendaftar)
{
    $sql = "SELECT * 
            FROM orang_tua 
            WHERE id_pendaftar = ? 
              AND jenis IN ('Ayah','Ibu')";

    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $id_pendaftar);
    $stmt->execute();

    // 🔴 get_result DIPANGGIL SEKALI
    $result = $stmt->get_result();

    $data = [
        "ayah" => null,
        "ibu"  => null
    ];

    while ($row = $result->fetch_assoc()) {
        if ($row["jenis"] === "Ayah") {
            $data["ayah"] = $row;
        } elseif ($row["jenis"] === "Ibu") {
            $data["ibu"] = $row;
        }
    }

    return $data;
}


    /* ======================
       GET DATA WALI
       ====================== */
    public function getWaliByPendaftar($id_pendaftar)
    {
        $sql = "SELECT * 
                FROM orang_tua 
                WHERE id_pendaftar = ? 
                  AND jenis = 'Wali'
                LIMIT 1";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id_pendaftar);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }

}
