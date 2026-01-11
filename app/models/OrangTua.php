<?php
require_once __DIR__ . "/../../core/Database.php";

class OrangTua extends Database {

    public function __construct() {
        parent::__construct();
    }
    // CEK DATA EXIST
    private function exist($id_pendaftar, $jenis) {
        $sql = "SELECT id_orang_tua
                FROM orang_tua
                WHERE id_pendaftar = ? AND jenis = ?
                LIMIT 1";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("is", $id_pendaftar, $jenis);
        $stmt->execute();

        return $stmt->get_result()->num_rows > 0;
    }
    // INSERT DATA
    private function insert($id_pendaftar, $jenis, $d) {
        $map = strtolower($jenis);

        $sql = "INSERT INTO orang_tua
            (id_pendaftar, jenis, nama_orang_tua, pendidikan_terakhir, pekerjaan,
             penghasilan, nomor_hp, tempat_lahir, tanggal_lahir, alamat_rumah)
            VALUES (?,?,?,?,?,?,?,?,?,?)";

        $stmt = $this->conn->prepare($sql);

        // WAJIB: PINDAH KE VARIABEL
        $nama           = $d["nama_$map"] ?? null;
        $pendidikan     = $d["pendidikan_$map"] ?? null;
        $pekerjaan      = $d["pekerjaan_$map"] ?? null;
        $penghasilan    = $d["penghasilan_$map"] ?? null;
        $hp             = $d["hp_$map"] ?? null;
        $tempat_lahir   = $d["tempat_lahir_$map"] ?? null;
        $tanggal_lahir  = $d["tanggal_lahir_$map"] ?? null;
        $alamat_rumah   = $d["alamat_rumah_$map"] ?? null;

        $stmt->bind_param(
            "isssssssss",
            $id_pendaftar,
            $jenis,
            $nama,
            $pendidikan,
            $pekerjaan,
            $penghasilan,
            $hp,
            $tempat_lahir,
            $tanggal_lahir,
            $alamat_rumah
        );

        return $stmt->execute();
    }
    // UPDATE DATA
    private function update($id_pendaftar, $jenis, $d) {
        $map = strtolower($jenis);

        $sql = "UPDATE orang_tua SET
                nama_orang_tua = ?,
                pendidikan_terakhir = ?,
                pekerjaan = ?,
                penghasilan = ?,
                nomor_hp = ?,
                tempat_lahir = ?,
                tanggal_lahir = ?,
                alamat_rumah = ?
                WHERE id_pendaftar = ? AND jenis = ?";

        $stmt = $this->conn->prepare($sql);

        // ===== WAJIB: PINDAH KE VARIABEL =====
        $nama           = $d["nama_$map"] ?? null;
        $pendidikan     = $d["pendidikan_$map"] ?? null;
        $pekerjaan      = $d["pekerjaan_$map"] ?? null;
        $penghasilan    = $d["penghasilan_$map"] ?? null;
        $hp             = $d["hp_$map"] ?? null;
        $tempat_lahir   = $d["tempat_lahir_$map"] ?? null;
        $tanggal_lahir  = $d["tanggal_lahir_$map"] ?? null;
        $alamat_rumah   = $d["alamat_rumah_$map"] ?? null;

        $stmt->bind_param(
            "ssssssssis",
            $nama,
            $pendidikan,
            $pekerjaan,
            $penghasilan,
            $hp,
            $tempat_lahir,
            $tanggal_lahir,
            $alamat_rumah,
            $id_pendaftar,
            $jenis
        );

        return $stmt->execute();
    }
    // SAVE (AUTO INSERT / UPDATE)
    private function save($id_pendaftar, $jenis, $d) {
        if ($this->exist($id_pendaftar, $jenis)) {
            return $this->update($id_pendaftar, $jenis, $d);
        }
        return $this->insert($id_pendaftar, $jenis, $d);
    }
    // PUBLIC SAVE
    public function saveAyah($id, $d) {
        return $this->save($id, "Ayah", $d);
    }

    public function saveIbu($id, $d) {
        return $this->save($id, "Ibu", $d);
    }

    public function saveWali($id, $d) {
        return $this->save($id, "Wali", $d);
    }
    // GET DATA AYAH + IBU
    public function getOrtuByPendaftar($id_pendaftar) {
        $sql = "SELECT *
                FROM orang_tua
                WHERE id_pendaftar = ?
                  AND jenis IN ('Ayah','Ibu')";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id_pendaftar);
        $stmt->execute();

        $result = $stmt->get_result();
        $data = [];

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

    // GET DATA WALI
    public function getWaliByPendaftar($id_pendaftar) {
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
