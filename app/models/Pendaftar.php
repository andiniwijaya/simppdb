    <?php

    require_once __DIR__ . '/../../core/Database.php';

    class Pendaftar {

        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        /**
         * Ambil data formulir berdasarkan id_pengguna
         */
        public function getFormDataByUserId($id_pengguna){

            $id_pengguna = intval($id_pengguna);

            $sql = "
                SELECT
                    id_pendaftar,
                    nisn,
                    nama_lengkap,
                    jenis_kelamin,
                    tempat_lahir,
                    tanggal_lahir,
                    agama,
                    alamat,
                    asal_sekolah,
                    nomor_hp,
                    status_data
                FROM pendaftar
                WHERE id_pengguna = $id_pengguna
                LIMIT 1
            ";

            $query = $this->db->conn->query($sql);

            if(!$query){
                return null;
            }

            $data = $query->fetch_assoc();

            if(!$data){
                return null;
            }

            return $data;
        }

        


        /**
         * Simpan bagian Data Diri
         */
        public function updateDiri($id_pengguna, $data){

            $id_pengguna = intval($id_pengguna);

            $sql = "
                UPDATE pendaftar SET
                    nik             = ?,
                    nama_lengkap    = ?,
                    tempat_lahir    = ?,
                    tanggal_lahir   = ?,
                    jenis_kelamin   = ?,
                    agama           = ?,
                    anak_ke         = ?,
                    jumlah_saudara  = ?,
                    alamat          = ?,
                    asal_sekolah    = ?,
                    status_tinggal  = ?,
                    nomor_hp        = ?,
                    email           = ?
                WHERE id_pengguna = ?
            ";

            $stmt = $this->db->conn->prepare($sql);

            $stmt->bind_param(
                "sssssssisssssi",
                $data["nik"],
                $data["nama_lengkap"],
                $data["tempat_lahir"],
                $data["tanggal_lahir"],
                $data["jenis_kelamin"],
                $data["agama"],
                $data["anak_ke"],
                $data["jumlah_saudara"],
                $data["alamat"],
                $data["asal_sekolah"],
                $data["status_tinggal"],
                $data["nomor_hp"],
                $data["email"],
                $id_pengguna
            );

            return $stmt->execute();
        }

        public function updateAyah($id_pengguna, $data){
            $id_pengguna = intval($id_pengguna);

            $sql = "
                UPDATE pendaftar SET
                    nama_ayah        = ?,
                    pendidikan_ayah  = ?,
                    pekerjaan_ayah   = ?
                WHERE id_pengguna = ?
            ";

            $stmt = $this->db->conn->prepare($sql);

            $stmt->bind_param(
                "sssi",
                $data["nama_ayah"],
                $data["pendidikan_ayah"],
                $data["pekerjaan_ayah"],
                $id_pengguna
            );

            return $stmt->execute();
        }

        public function updateIbu($id_pengguna, $data){

            $id_pengguna = intval($id_pengguna);

            $sql = "
                UPDATE pendaftar SET
                    nama_ibu        = ?,
                    pendidikan_ibu  = ?,
                    pekerjaan_ibu   = ?
                WHERE id_pengguna = ?
            ";

            $stmt = $this->db->conn->prepare($sql);

            $stmt->bind_param(
                "sssi",
                $data["nama_ibu"],
                $data["pendidikan_ibu"],
                $data["pekerjaan_ibu"],
                $id_pengguna
            );

            return $stmt->execute();
        }

        public function updateWali($id_pengguna, $data){

            $id_pengguna = intval($id_pengguna);

            $sql = "
                UPDATE pendaftar SET
                    nama_wali        = ?,
                    pendidikan_wali  = ?,
                    pekerjaan_wali   = ?
                WHERE id_pengguna = ?
            ";

            $stmt = $this->db->conn->prepare($sql);

            $stmt->bind_param(
                "sssi",
                $data["nama_wali"],
                $data["pendidikan_wali"],
                $data["pekerjaan_wali"],
                $id_pengguna
            );

            return $stmt->execute();
        }
        public function countUploaded(){
        $sql = "SELECT COUNT(*) total FROM upload_berkas WHERE status_berkas='valid'";
        return $this->db->conn->query($sql)->fetch_assoc()["total"];
    }



        /**
         * Hitung Progress
         */
        public function getProgress($row){

            $progress = 0;

            if(!empty($row["nama_lengkap"])) $progress += 25;
            if(!empty($row["nama_ayah"]))    $progress += 25;
            if(!empty($row["nama_ibu"]))     $progress += 25;
            if(!empty($row["nama_wali"]))    $progress += 25;

            return $progress;
        }

        public function nisnExists($nisn)
    {
        $nisn = mysqli_real_escape_string($this->db->conn, $nisn);

        $sql = "SELECT id_pendaftar FROM pendaftar WHERE nisn = '$nisn' LIMIT 1";

        $query = $this->db->conn->query($sql);

        if(!$query){
            return false;
        }

        return $query->num_rows > 0;
    }
    public function insertAwal($id_pengguna, $nisn)
    {
        $id_pengguna = intval($id_pengguna);
        $nisn        = mysqli_real_escape_string($this->db->conn, $nisn);

        // cek dulu, kalau sudah ada jangan insert ulang
        $check = $this->db->conn->query("
            SELECT id_pendaftar
            FROM pendaftar
            WHERE id_pengguna = $id_pengguna
            LIMIT 1
        ");

        if($check && $check->num_rows > 0){
            return true;
        }

        $sql = "
            INSERT INTO pendaftar (id_pengguna, nisn, status_data)
            VALUES ($id_pengguna, '$nisn', 'baru')
        ";

        return $this->db->conn->query($sql);
    }
    public function countAll()
    {
        $sql = "SELECT COUNT(*) AS total FROM pendaftar";
        $query = $this->db->conn->query($sql);
        $row = $query->fetch_assoc();
        return $row["total"];
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
    public function getAllPendaftar()
{
    $sql = "
        SELECT 
            id_pendaftar,
            nama_lengkap,
            nisn,
            asal_sekolah,
            status_data,
            tanggal_daftar
        FROM pendaftar
        ORDER BY id_pendaftar DESC
    ";

    $query = $this->db->conn->query($sql);

    $data = [];

    if(!$query){
        return $data;
    }

    while($row = $query->fetch_assoc()){
        $data[] = $row;
    }

    return $data;
}





    }
