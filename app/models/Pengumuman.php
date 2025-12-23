<?php
require_once __DIR__ . "/../../core/Database.php";

class Pengumuman extends Database {

    public function getStatusByPendaftar($id_pendaftar){
        $sql = "
            SELECT status_penerimaan 
            FROM pengumuman 
            WHERE id_pendaftar = ?
            LIMIT 1
        ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id_pendaftar);
        $stmt->execute();

        $res = $stmt->get_result()->fetch_assoc();

        return $res ? $res["status_penerimaan"] : "menunggu";
    }
}
