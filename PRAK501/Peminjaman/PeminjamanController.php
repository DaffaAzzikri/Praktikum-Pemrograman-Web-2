<?php
require_once '../Model.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {
    case 'index':
        $peminjaman = getPeminjaman();
        require 'Peminjaman.php';
        break;

    case 'tambah':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tgl_pinjam = $_POST['tgl_pinjam'];
            $tgl_kembali = $_POST['tgl_kembali'];

            if (strtotime($tgl_kembali) < strtotime($tgl_pinjam)) {
                echo "<script>alert('Error: Tanggal kembali tidak boleh lebih awal dari tanggal pinjam!'); window.history.back();</script>";
                exit();
            }

            tambahPeminjaman($_POST['id_member'], $_POST['id_buku'], $tgl_pinjam, $tgl_kembali);
            header("Location: PeminjamanController.php?action=index");
            exit();
        } else {
            $list_member = getMember();
            $list_buku = getBuku();
            require 'FormTambahPeminjaman.php';
        }
        break;

    case 'edit':
        $id = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tgl_pinjam = $_POST['tgl_pinjam'];
            $tgl_kembali = $_POST['tgl_kembali'];

            if (strtotime($tgl_kembali) < strtotime($tgl_pinjam)) {
                echo "<script>alert('Error: Tanggal kembali tidak boleh lebih awal dari tanggal pinjam!'); window.history.back();</script>";
                exit();
            }

            ubahPeminjaman($id, $_POST['id_member'], $_POST['id_buku'], $tgl_pinjam, $tgl_kembali);
            header("Location: PeminjamanController.php?action=index");
            exit();
        } else {
            $data_peminjaman = getPeminjamanById($id);
            $list_member = getMember();
            $list_buku = getBuku();
            require 'FormEditPeminjaman.php';
        }
        break;

    case 'hapus':
        $id = $_GET['id'];
        hapusPeminjaman($id);
        header("Location: PeminjamanController.php?action=index");
        exit();
        break;
}
?>