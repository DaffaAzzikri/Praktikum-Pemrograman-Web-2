<!DOCTYPE html>
<html lang="id">
<head>
    <title>PRAK301</title>
</head>
<body>
    <form action="" method="POST">
        Jumlah Peserta: <input type="number" name="jumlah" required><br>
        <button type="submit" name="submit">Cetak</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $jumlah = $_POST['jumlah'];
        $i = 1;

        while ($i <= $jumlah) {
            if ($i % 2 == 1) {
                echo "<h2 style='color: red; margin: 5px 0;'>Peserta ke-$i</h2>";
            } else {
                echo "<h2 style='color: green; margin: 5px 0;'>Peserta ke-$i</h2>";
            }
            $i++;
        }
    }
    ?>
</body>
</html>