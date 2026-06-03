<?php
require_once '../Model.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {
    case 'index':
        $buku = getBuku();
        require 'Buku.php';
        break;

    case 'tambah':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            tambahBuku($_POST['judul_buku'], $_POST['penulis'], $_POST['penerbit'], $_POST['tahun_terbit']);
            header("Location: BukuController.php?action=index");
            exit();
        } else {
            require 'FormTambahBuku.php';
        }
        break;

    case 'edit':
        $id = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            ubahBuku($id, $_POST['judul_buku'], $_POST['penulis'], $_POST['penerbit'], $_POST['tahun_terbit']);
            header("Location: BukuController.php?action=index");
            exit();
        } else {
            $data_buku = getBukuById($id);
            require 'FormEditBuku.php';
        }
        break;

    case 'hapus':
        $id = $_GET['id'];
        hapusBuku($id); 
        header("Location: BukuController.php?action=index");
        exit();
        break;
}
?>