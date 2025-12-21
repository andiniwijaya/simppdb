    <?php

    require_once __DIR__ . "/../../core/Database.php";

    class Upload {

        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        // AMBIL UPLOAD TERAKHIR PADA SATU PENDAFTAR
        public function lastUpload($id_pendaftar){

            $sql = "
                SELECT *
                FROM berkas_pendaftar
                WHERE id_pendaftar = ?
                ORDER BY id_berkas DESC
                LIMIT 1
            ";

            $stmt = $this->db->conn->prepare($sql);
            $stmt->bind_param("i", $id_pendaftar);
            $stmt->execute();

            return $stmt->get_result()->fetch_assoc();
        }

        // HITUNG JUMLAH BERKAS VALID
        public function countUploaded()
        {
            $sql = "
                SELECT COUNT(*) AS total
                FROM berkas_pendaftar
                WHERE status_berkas = 'valid'
            ";

            $query = $this->db->conn->query($sql);
            $row = $query->fetch_assoc();

            return $row['total'];
        }
        public function getLatest($limit = 5)
    {
        $sql = "
            SELECT 
                id_pendaftar,
                nama_lengkap,
                nisn,
                status_data,
                tanggal_daftar
            FROM pendaftar
            ORDER BY id_pendaftar DESC
            LIMIT $limit
        ";

        $query = $this->db->conn->query($sql);

        $data = [];

        while($row = $query->fetch_assoc()){
            $data[] = $row;
        }

        return $data;
    }


    }
