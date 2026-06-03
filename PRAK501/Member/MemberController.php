<?php
require_once '../Model.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {
    case 'index':
        $member = getMember();
        require 'Member.php';
        break;

    case 'tambah':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            tambahMember($_POST['nomor_member'], $_POST['nama_member'], $_POST['alamat'], $_POST['tgl_mendaftar'], $_POST['tgl_terakhir_bayar']);
            header("Location: MemberController.php?action=index");
            exit();
        } else {
            require 'FormTambahMember.php';
        }
        break;

    case 'edit':
        $id = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            ubahMember($id, $_POST['nomor_member'], $_POST['nama_member'], $_POST['alamat'], $_POST['tgl_mendaftar'], $_POST['tgl_terakhir_bayar']);
            header("Location: MemberController.php?action=index");
            exit();
        } else {
            $data_member = getMemberById($id);
            require 'FormEditMember.php';
        }
        break;

    case 'hapus':
        $id = $_GET['id'];
        hapusMember($id);
        header("Location: MemberController.php?action=index");
        exit();
        break;
}
?>