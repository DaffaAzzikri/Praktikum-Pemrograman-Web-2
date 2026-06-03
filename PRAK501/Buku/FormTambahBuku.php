<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Buku Baru</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input[type="text"], input[type="number"] { width: 300px; padding: 8px; }
        .btn { padding: 10px 15px; background-color: #4CAF50; color: white; border: none; cursor: pointer; border-radius: 4px; }
        .btn-kembali { background-color: #555; text-decoration: none; padding: 10px 15px; display: inline-block; color: white; border-radius: 4px; }
    </style>
</head>
<body>
    <h2>Form Penambahan Buku</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label>Judul Buku:</label>
            <input type="text" name="judul_buku" required>
        </div>
        <div class="form-group">
            <label>Penulis:</label>
            <input type="text" name="penulis" required>
        </div>
        <div class="form-group">
            <label>Penerbit:</label>
            <input type="text" name="penerbit" required>
        </div>
        <div class="form-group">
            <label>Tahun Terbit:</label>
            <input type="number" name="tahun_terbit" required>
        </div>
        <button type="submit" class="btn">Daftar</button>
        <a href="BukuController.php?action=index" class="btn-kembali">Kembali</a>
    </form>
</body>
</html>