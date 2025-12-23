DROP DATABASE IF EXISTS sim_ppdb_arjasari;
CREATE DATABASE sim_ppdb_arjasari;
USE sim_ppdb_arjasari;


-- TABEL LOGIN PENGGUNA
CREATE TABLE pengguna (
    id_pengguna INT AUTO_INCREMENT PRIMARY KEY,
    nama_pengguna VARCHAR(50) UNIQUE,
    kata_sandi VARCHAR(255),
    email VARCHAR(100),
    peran ENUM('admin','siswa') DEFAULT 'siswa',
    dibuat_pada TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- insert admin default
INSERT INTO pengguna (nama_pengguna, kata_sandi, email, peran)
VALUES (
    'admin',
    -- password = 11111111
    '$2y$10$bqkiHtr4ExZ3lOBbCNdc3Ok1YEp23S9xkMCId0Trk3EhkOOKPwrs6',
    'admin@gmail.com',
    'admin'
);


-- TABEL PENDAFTAR

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

    status_anak ENUM('kandung','tiri','angkat') DEFAULT 'kandung',
    yatim_status ENUM('bukan','yatim','piatu','yatim_piatu') DEFAULT 'bukan',

    bahasa_rumah VARCHAR(100),

    tinggi_badan INT,
    berat_badan INT,

    penyakit TEXT,

    tahun_lulus YEAR,
    nomor_hp VARCHAR(20),
    email VARCHAR(100),

    tanggal_daftar TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    status_data ENUM('belum_lengkap','lengkap','terverifikasi')
        DEFAULT 'belum_lengkap',

    FOREIGN KEY (id_pengguna) REFERENCES pengguna(id_pengguna)
        ON DELETE CASCADE
);


-- TABEL ORANG TUA / WALI

CREATE TABLE orang_tua (
    id_orang_tua INT AUTO_INCREMENT PRIMARY KEY,

    id_pendaftar INT NOT NULL,
    jenis ENUM('Ayah','Ibu','Wali') NOT NULL,

    nama_orang_tua VARCHAR(100),

    pendidikan_terakhir VARCHAR(50),

    pekerjaan VARCHAR(100),
    penghasilan VARCHAR(50),

    nomor_hp VARCHAR(20),

    tempat_lahir VARCHAR(50),
    tanggal_lahir DATE,
    alamat_rumah TEXT,

    FOREIGN KEY (id_pendaftar)
        REFERENCES pendaftar(id_pendaftar)
        ON DELETE CASCADE
);


-- TABEL BERKAS SISWA

CREATE TABLE berkas_pendaftar (
    id_berkas INT AUTO_INCREMENT PRIMARY KEY,

    id_pendaftar INT NOT NULL,

    jenis_berkas ENUM(
        'kartu_keluarga',
        'ktp_orang_tua',
        'kip',
        'ijazah_sd',
        'surat_keterangan_lulus',
        'akta_kelahiran',
        'pas_foto'
    ) NOT NULL,

    lokasi_berkas VARCHAR(255) NOT NULL,

    status_berkas ENUM('menunggu','valid','invalid')
        DEFAULT 'menunggu',

    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (id_pendaftar)
        REFERENCES pendaftar(id_pendaftar)
        ON DELETE CASCADE
);


-- TABEL PEMBAYARAN

CREATE TABLE pembayaran (
    id_pembayaran INT AUTO_INCREMENT PRIMARY KEY,
    id_pendaftar INT NOT NULL,

    tanggal_bayar DATETIME DEFAULT CURRENT_TIMESTAMP,
    jumlah INT NOT NULL,
    bukti_transfer VARCHAR(255) NOT NULL,

    status_bayar ENUM('menunggu','lunas')
        DEFAULT 'menunggu',

    FOREIGN KEY (id_pendaftar)
        REFERENCES pendaftar(id_pendaftar)
        ON DELETE CASCADE
);


-- TABEL PENGUMUMAN

CREATE TABLE pengumuman (
    id_pengumuman INT AUTO_INCREMENT PRIMARY KEY,

    id_pendaftar INT,
    status_penerimaan ENUM('menunggu','diterima','tidak_diterima')
        DEFAULT 'menunggu',

    FOREIGN KEY (id_pendaftar)
        REFERENCES pendaftar(id_pendaftar)
        ON DELETE CASCADE
);
