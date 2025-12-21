<?php

require_once __DIR__ . '/../models/Pendaftar.php';

class FormulirController {

    public function index()
    {
        session_start();

        if(!isset($_SESSION['id_pengguna'])){
            header("Location: /loginsiswa");
            exit;
        }

        $id_pengguna = $_SESSION["id_pengguna"];

        $pendaftarModel = new Pendaftar();
        $pendaftar = $pendaftarModel->getFormDataByUserId($id_pengguna);

        require __DIR__."/../views/siswa/formulir.php";
    }

    public function simpan()
    {
        session_start();

        if(!isset($_SESSION['id_pengguna'])){
            header("Location: /loginsiswa");
            exit;
        }

        $id_pengguna = $_SESSION["id_pengguna"];

        $pendaftarModel = new Pendaftar();
        $pendaftarModel->updateDiri($id_pengguna, $_POST);

        header("Location: /formulir");
        exit;
    }

}
