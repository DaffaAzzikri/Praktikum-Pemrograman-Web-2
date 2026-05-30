<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Peminjaman</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        select, input[type="date"] { width: 300px; padding: 8px; }
        .btn { padding: 10px 15px; background-color: #4CAF50; color: white; border: none; cursor: pointer; border-radius: 4px; }
        .btn-kembali { background-color: #555; text-decoration: none; padding: 10px 15px; display: inline-block; color: white; border-radius: 4px; }
    </style>
</head>
<body>
    <h2>Form Peminjaman Baru</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label>Member yang Meminjam:</label>
            <select name="id_member" required>
                <option value="">-- Pilih Member --</option>
                <?php foreach ($list_member as $m) : ?>
                    <option value="<?= $m['id_member'] ?>"><?= htmlspecialchars($m['nama_member']) ?> (<?= htmlspecialchars($m['nomor_member']) ?>)</option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Buku yang Dipinjam:</label>
            <select name="id_buku" required>
                <option value="">-- Pilih Buku --</option>
                <?php foreach ($list_buku as $b) : ?>
                    <option value="<?= $b['id_buku'] ?>"><?= htmlspecialchars($b['judul_buku']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Tanggal Pinjam:</label>
            <input type="date" name="tgl_pinjam" id="tgl_pinjam" onchange="setMinimalTanggalKembali()" required>
        </div>
        <div class="form-group">
            <label>Tanggal Kembali:</label>
            <input type="date" name="tgl_kembali" id="tgl_kembali" required>
        </div>
        <button type="submit" class="btn">Simpan</button>
        <a href="PeminjamanController.php?action=index" class="btn-kembali">Kembali</a>
    </form>

    <script>
        function setMinimalTanggalKembali() {
            let tglPinjam = document.getElementById("tgl_pinjam").value;
            // Kunci input tgl_kembali agar tidak bisa memilih sebelum tgl_pinjam
            document.getElementById("tgl_kembali").setAttribute("min", tglPinjam);
        }
    </script>
</body>
</html>