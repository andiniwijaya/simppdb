DROP DATABASE IF EXISTS sim_ppdb_arjasari;
CREATE DATABASE sim_ppdb_arjasari;
USE sim_ppdb_arjasari;

-- TABEL LOGIN PENGGUNA
CREATE TABLE pengguna (
    id_pengguna INT AUTO_INCREMENT PRIMARY KEY,
    nama_pengguna VARCHAR(50) UNIQUE,
    kata_sandi VARCHAR(255),
    email VARCHAR(100),
    peran ENUM('admin','operator','siswa') DEFAULT 'siswa',
    dibuat_pada TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- TABEL PENDAFTAR (DATA SISWA)
CREATE TABLE pendaftar (
    id_pendaftar INT AUTO_INCREMENT PRIMARY KEY,
    id_pengguna INT UNIQUE,

    nik VARCHAR(16) UNIQUE,
    nisn VARCHAR(10) UNIQUE,

    nama_lengkap VARCHAR(100),

    jenis_kelamin ENUM('Laki-laki','Perempuan'),
    tempat_lahir VARCHAR(50),
    tanggal_lahir DATE,
    agama ENUM(
        'Islam','Kristen','Katolik',
        'Hindu','Budha','Konghucu','Lainnya'
    ),
    alamat TEXT,

    status_tinggal ENUM(
        'bersama_ortu',
        'wali',
        'kost',
        'asrama',
        'lainnya'
    ) DEFAULT 'bersama_ortu',

    asal_sekolah VARCHAR(100),

    anak_ke INT,
    jumlah_saudara INT,

    tahun_lulus YEAR,
    nomor_hp VARCHAR(20),
    email VARCHAR(100),

    tanggal_daftar TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    status_data ENUM('belum_lengkap','lengkap','terverifikasi')
        DEFAULT 'belum_lengkap',

    FOREIGN KEY (id_pengguna) REFERENCES pengguna(id_pengguna)
        ON DELETE CASCADE
);

-- TABEL ORANG TUA/WALI
CREATE TABLE orang_tua (
    id_orang_tua INT AUTO_INCREMENT PRIMARY KEY,

    id_pendaftar INT NOT NULL,
    jenis ENUM('Ayah','Ibu','Wali') NOT NULL,

    nama_orang_tua VARCHAR(100),
    pendidikan VARCHAR(50),
    pekerjaan VARCHAR(100),
    penghasilan VARCHAR(50),

    nomor_hp VARCHAR(20),

    FOREIGN KEY (id_pendaftar)
        REFERENCES pendaftar(id_pendaftar)
        ON DELETE CASCADE
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

    FOREIGN KEY (id_pendaftar)
        REFERENCES pendaftar(id_pendaftar)
        ON DELETE CASCADE
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

    FOREIGN KEY (id_pendaftar)
        REFERENCES pendaftar(id_pendaftar)
        ON DELETE CASCADE
);

-- TABEL PENGUMUMAN KELULUSAN
CREATE TABLE pengumuman (
    id_pengumuman INT AUTO_INCREMENT PRIMARY KEY,

    id_pendaftar INT,
    status_penerimaan ENUM('menunggu','diterima','tidak_diterima')
        DEFAULT 'menunggu',

    FOREIGN KEY (id_pendaftar)
        REFERENCES pendaftar(id_pendaftar)
        ON DELETE CASCADE
);
