<?php
require 'Koneksi.php';

$conn = getKoneksi();

function getMember() {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM member");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getMemberById($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM member WHERE id_member = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function tambahMember($nomor_member, $nama_member, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar) {
    global $conn;
    $sql = "INSERT INTO member (nomor_member, nama_member, alamat, tgl_mendaftar, tgl_terakhir_bayar) 
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    return $stmt->execute([$nomor_member, $nama_member, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar]);
}
function ubahMember($id_member, $nomor_member, $nama_member, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar) {
    global $conn;
    $sql = "UPDATE member SET nomor_member = ?, nama_member = ?, alamat = ?, tgl_mendaftar = ?, tgl_terakhir_bayar = ? 
            WHERE id_member = ?";
    $stmt = $conn->prepare($sql);
    return $stmt->execute([$nomor_member, $nama_member, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar, $id_member]);
}

function hapusMember($id_member) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM member WHERE id_member = ?");
    return $stmt->execute([$id_member]);
}

function getBuku() {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM buku");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getBukuById($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM buku WHERE id_buku = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function tambahBuku($judul_buku, $penulis, $penerbit, $tahun_terbit) {
    global $conn;
    $sql = "INSERT INTO buku (judul_buku, penulis, penerbit, tahun_terbit) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    return $stmt->execute([$judul_buku, $penulis, $penerbit, $tahun_terbit]);
}

function ubahBuku($id_buku, $judul_buku, $penulis, $penerbit, $tahun_terbit) {
    global $conn;
    $sql = "UPDATE buku SET judul_buku = ?, penulis = ?, penerbit = ?, tahun_terbit = ? WHERE id_buku = ?";
    $stmt = $conn->prepare($sql);
    return $stmt->execute([$judul_buku, $penulis, $penerbit, $tahun_terbit, $id_buku]);
}

function hapusBuku($id_buku) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM buku WHERE id_buku = ?");
    return $stmt->execute([$id_buku]);
}

function getPeminjaman() {
    global $conn;
    $sql = "SELECT p.*, m.nama_member, b.judul_buku 
            FROM peminjaman p
            JOIN member m ON p.id_member = m.id_member
            JOIN buku b ON p.id_buku = b.id_buku";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getPeminjamanById($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM peminjaman WHERE id_peminjaman = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function tambahPeminjaman($id_member, $id_buku, $tgl_pinjam, $tgl_kembali) {
    global $conn;
    $sql = "INSERT INTO peminjaman (id_member, id_buku, tgl_pinjam, tgl_kembali) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    return $stmt->execute([$id_member, $id_buku, $tgl_pinjam, $tgl_kembali]);
}

function ubahPeminjaman($id_peminjaman, $id_member, $id_buku, $tgl_pinjam, $tgl_kembali) {
    global $conn;
    $sql = "UPDATE peminjaman SET id_member = ?, id_buku = ?, tgl_pinjam = ?, tgl_kembali = ? WHERE id_peminjaman = ?";
    $stmt = $conn->prepare($sql);
    return $stmt->execute([$id_member, $id_buku, $tgl_pinjam, $tgl_kembali, $id_peminjaman]);
}

function hapusPeminjaman($id_peminjaman) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM peminjaman WHERE id_peminjaman = ?");
    return $stmt->execute([$id_peminjaman]);
}
?>