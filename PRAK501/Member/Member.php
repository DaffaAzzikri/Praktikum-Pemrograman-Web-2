<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Member</title>
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
    <h2>Data Member</h2>
    <a href="../Index.php" class="btn btn-kembali">Kembali ke Menu Utama</a>
    <a href="MemberController.php?action=tambah" class="btn btn-tambah">Tambah Data Member</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nomor Member</th>
                <th>Nama Member</th>
                <th>Alamat</th>
                <th>Tgl Mendaftar</th>
                <th>Tgl Terakhir Bayar</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($member as $row) : ?>
            <tr>
                <td><?= htmlspecialchars($row['id_member']) ?></td>
                <td><?= htmlspecialchars($row['nomor_member']) ?></td>
                <td><?= htmlspecialchars($row['nama_member']) ?></td>
                <td><?= htmlspecialchars($row['alamat']) ?></td>
                <td><?= htmlspecialchars($row['tgl_mendaftar']) ?></td>
                <td><?= htmlspecialchars($row['tgl_terakhir_bayar']) ?></td>
                <td>
                    <a href="MemberController.php?action=edit&id=<?= $row['id_member'] ?>" class="btn btn-edit">Ubah</a>
                    <a href="MemberController.php?action=hapus&id=<?= $row['id_member'] ?>" class="btn btn-hapus" onclick="return confirm('Yakin menghapus member ini?');">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>