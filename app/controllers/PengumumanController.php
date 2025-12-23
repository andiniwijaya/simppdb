<?php
require_once __DIR__ . '/../models/Pendaftar.php';
require_once __DIR__ . '/../models/Pengumuman.php';

class PengumumanController {

    public function index(){

        if(!isset($_SESSION["user_id"])){
            header("Location: /login");
            exit;
        }

        $p = new Pendaftar();
        $g = new Pengumuman();

        $id_pengguna = $_SESSION["user_id"];
        $pendaftar = $p->getFormDataByUserId($id_pengguna);

        if(!$pendaftar){
            die("Lengkapi formulir terlebih dahulu.");
        }

        $id_pendaftar = $pendaftar["id_pendaftar"];

        // pastikan data pengumuman ada
        $g->createIfNotExists($id_pendaftar);

        $data = $g->getByPendaftar($id_pendaftar);

        $status = $data["status_penerimaan"] ?? "menunggu";

        ob_start();
        require __DIR__ . '/../views/siswa/pengumuman.php';
        $content = ob_get_clean();

        require __DIR__ . '/../views/siswa/layout_siswa.php';
    }
}
