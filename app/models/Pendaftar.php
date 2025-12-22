<?php

require_once __DIR__ . "/../../core/Database.php";

class Pendaftar extends Database {

    public function getId($id_pengguna){
        $sql = "SELECT id_pendaftar FROM pendaftar WHERE id_pengguna=? LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i",$id_pengguna);
        $stmt->execute();

        $r = $stmt->get_result()->fetch_assoc();
        return $r ? intval($r["id_pendaftar"]) : 0;
    }


    public function saveSiswa($id_pengguna,$d){

        $existId = $this->getId($id_pengguna);

        if($existId > 0){
            return $this->update($existId,$d);
        }

        return $this->insert($id_pengguna,$d);
    }


    private function insert($id_pengguna, $d) {

        $sql = "INSERT INTO pendaftar
        (id_pengguna, nik, nisn, nama_lengkap, jenis_kelamin, tempat_lahir,
        tanggal_lahir, agama, alamat, status_tinggal, asal_sekolah,
        anak_ke, jumlah_saudara, status_anak, yatim_status, bahasa_rumah,
        tinggi_badan, berat_badan, penyakit, tahun_lusus, nomor_hp, email)
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param(
            "issssssssssisssiiisiss",
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

        $stmt->execute();
    }


    private function update($id,$d){

        $sql = "UPDATE pendaftar SET
        nik=?, nisn=?, nama_lengkap=?, jenis_kelamin=?, tempat_lahir=?,
        tanggal_lahir=?, agama=?, alamat=?, status_tinggal=?, asal_sekolah=?,
        anak_ke=?, jumlah_saudara=?, status_anak=?, yatim_status=?, bahasa_rumah=?,
        tinggi_badan=?, berat_badan=?, penyakit=?, tahun_lulus=?, nomor_hp=?, email=?
        WHERE id_pendaftar=?";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param(
            "ssssssssssiiisssiissi",
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

        $stmt->execute();
    }
}
