CREATE DATABASE ppdb_arjasari;
USE ppdb_arjasari;

-- TABEL LOGIN PENGGUNA
CREATE TABLE pengguna (
    id_pengguna INT AUTO_INCREMENT PRIMARY KEY,
    nama_pengguna VARCHAR(50) UNIQUE,
    kata_sandi VARCHAR(255),
    email VARCHAR(100),
    peran ENUM('admin','operator','siswa') 
        DEFAULT 'siswa',
    dibuat_pada TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    token VARCHAR(100) NULL
);

-- TABEL PENDAFTAR (DATA SISWA)
CREATE TABLE pendaftar (
    id_pendaftar INT AUTO_INCREMENT PRIMARY KEY,
    id_pengguna INT UNIQUE,
    nisn INT(10) UNIQUE,
    nama_lengkap VARCHAR(100),
    jenis_kelamin ENUM('Laki-laki','Perempuan'),
    tempat_lahir VARCHAR(50),
    tanggal_lahir DATE,
    agama ENUM(
        'Islam',
        'Kristen',
        'Katolik',
        'Hindu',
        'Budha',
        'Konghucu',
        'Lainnya'
    ),
    alamat TEXT,
    asal_sekolah VARCHAR(100),
    tahun_lulus YEAR,
    nomor_hp VARCHAR(20),
    tanggal_daftar TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status_data ENUM('belum_lengkap','lengkap','terverifikasi') 
        DEFAULT 'belum_lengkap',

    FOREIGN KEY (id_pengguna) REFERENCES pengguna(id_pengguna)
);

-- TABEL ORANG TUA (AYAH / IBU / WALI)
CREATE TABLE orang_tua (
    id_orang_tua INT AUTO_INCREMENT PRIMARY KEY,
    id_pendaftar INT,
    jenis ENUM('Ayah','Ibu','Wali') NOT NULL,
    nama_orang_tua VARCHAR(100),
    pendidikan VARCHAR(50),
    pekerjaan VARCHAR(100),
    nomor_hp VARCHAR(20),

    FOREIGN KEY (id_pendaftar) REFERENCES pendaftar(id_pendaftar)
);

-- TABEL BERKAS UPLOAD
CREATE TABLE berkas_pendaftar (
    id_berkas INT AUTO_INCREMENT PRIMARY KEY,
    id_pendaftar INT,
    jenis_berkas ENUM(
        'kartu_keluarga',
        'akta_kelahiran',
        'ijazah',
        'pas_foto',
        'ktp_orang_tua'
    ),
    lokasi_berkas VARCHAR(255),
    status_berkas ENUM('menunggu','valid','invalid') 
        DEFAULT 'menunggu',

    FOREIGN KEY (id_pendaftar) REFERENCES pendaftar(id_pendaftar)
);

-- TABEL PEMBAYARAN
CREATE TABLE pembayaran (
    id_pembayaran INT AUTO_INCREMENT PRIMARY KEY,
    id_pendaftar INT,
    tanggal_bayar DATETIME,
    jumlah INT,
    bukti_transfer VARCHAR(255),
    status_bayar ENUM('belum','menunggu','lunas') 
        DEFAULT 'belum',

    FOREIGN KEY (id_pendaftar) REFERENCES pendaftar(id_pendaftar)
);

-- TABEL HASIL / PENGUMUMAN
CREATE TABLE pengumuman (
    id_pengumuman INT AUTO_INCREMENT PRIMARY KEY,
    id_pendaftar INT,
    status_penerimaan ENUM('belum','diterima','tidak_diterima') 
        DEFAULT 'belum',
    nilai_akhir FLOAT,

    FOREIGN KEY (id_pendaftar) REFERENCES pendaftar(id_pendaftar)
);
