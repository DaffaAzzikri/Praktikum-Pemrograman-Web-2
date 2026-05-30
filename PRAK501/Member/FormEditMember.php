<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Ubah Data Member</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input[type="text"], input[type="datetime-local"], input[type="date"], textarea { width: 300px; padding: 8px; }
        .btn { padding: 10px 15px; background-color: #2196F3; color: white; border: none; cursor: pointer; border-radius: 4px; }
        .btn-kembali { background-color: #555; text-decoration: none; padding: 10px 15px; display: inline-block; color: white; border-radius: 4px; }
    </style>
</head>
<body>
    <h2>Ubah Data Member</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label>Nomor Member:</label>
            <input type="text" name="nomor_member" value="<?= htmlspecialchars($data_member['nomor_member']) ?>" required>
        </div>
        <div class="form-group">
            <label>Nama Member:</label>
            <input type="text" name="nama_member" value="<?= htmlspecialchars($data_member['nama_member']) ?>" required>
        </div>
        <div class="form-group">
            <label>Alamat:</label>
            <textarea name="alamat" rows="4" required><?= htmlspecialchars($data_member['alamat']) ?></textarea>
        </div>
        <div class="form-group">
            <label>Tanggal Mendaftar:</label>
            <input type="datetime-local" name="tgl_mendaftar" value="<?= htmlspecialchars(date('Y-m-d\TH:i', strtotime($data_member['tgl_mendaftar']))) ?>" required>
        </div>
        <div class="form-group">
            <label>Tanggal Terakhir Bayar:</label>
            <input type="date" name="tgl_terakhir_bayar" value="<?= htmlspecialchars($data_member['tgl_terakhir_bayar']) ?>" required>
        </div>
        <button type="submit" class="btn">Ubah Data</button>
        <a href="MemberController.php?action=index" class="btn-kembali">Kembali</a>
    </form>
</body>
</html>