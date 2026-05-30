<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Peminjaman</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .btn { padding: 8px 12px; text-decoration: none; color: white; border-radius: 4px; display: inline-block; }
        .btn-tambah { background-color: #4CAF50; margin-bottom: 10px; }
        .btn-edit { background-color: #2196F3; }
        .btn-hapus { background-color: #f44336; }
        .btn-kembali { background-color: #555; }
    </style>
</head>
<body>
    <h2>Data Peminjaman</h2>
    <a href="../Index.php" class="btn btn-kembali">Kembali ke Menu Utama</a>
    <a href="PeminjamanController.php?action=tambah" class="btn btn-tambah">Tambah Data Peminjaman</a>

    <table>
        <thead>
            <tr>
                <th>ID Pinjam</th>
                <th>Nama Member</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($peminjaman as $row) : ?>
            <tr>
                <td><?= htmlspecialchars($row['id_peminjaman']) ?></td>
                <td><?= htmlspecialchars($row['nama_member']) ?></td>
                <td><?= htmlspecialchars($row['judul_buku']) ?></td>
                <td><?= htmlspecialchars($row['tgl_pinjam']) ?></td>
                <td><?= htmlspecialchars($row['tgl_kembali']) ?></td>
                <td>
                    <a href="PeminjamanController.php?action=edit&id=<?= $row['id_peminjaman'] ?>" class="btn btn-edit">Ubah</a>
                    <a href="PeminjamanController.php?action=hapus&id=<?= $row['id_peminjaman'] ?>" class="btn btn-hapus" onclick="return confirm('Yakin menghapus data ini?');">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>