USE prak501;

-- 1. Buat Tabel Member [cite: 14, 15, 16, 21, 22, 23]
CREATE TABLE member (
    id_member INT AUTO_INCREMENT PRIMARY KEY,
    nomor_member VARCHAR(15) NOT NULL,
    nama_member VARCHAR(250) NOT NULL,
    alamat TEXT, 
    tgl_mendaftar DATETIME NOT NULL,
    tgl_terakhir_bayar DATE NOT NULL
);

-- 2. Buat Tabel Buku [cite: 30, 32, 34, 36, 38]
CREATE TABLE buku (
    id_buku INT AUTO_INCREMENT PRIMARY KEY,
    judul_buku VARCHAR(500) NOT NULL,
    penulis VARCHAR(500) NOT NULL,
    penerbit VARCHAR(250) NOT NULL,
    tahun_terbit INT NOT NULL
);

-- 3. Buat Tabel Peminjaman [cite: 43, 44, 46]
CREATE TABLE peminjaman (
    id_peminjaman INT AUTO_INCREMENT PRIMARY KEY,
    id_member INT NOT NULL,
    id_buku INT NOT NULL,
    tgl_pinjam DATE NOT NULL,
    tgl_kembali DATE NOT NULL,
    
    -- Relasi ke tabel member dan buku
    FOREIGN KEY (id_member) REFERENCES member(id_member) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_buku) REFERENCES buku(id_buku) ON DELETE CASCADE ON UPDATE CASCADE
);