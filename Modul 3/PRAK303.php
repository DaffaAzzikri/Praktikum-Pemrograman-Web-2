<!DOCTYPE html>
<html lang="id">
<head>
    <title>PRAK303</title>
</head>
<body>
    <form action="" method="POST">
        Batas Bawah: <input type="number" name="bawah" required><br>
        Batas Atas: <input type="number" name="atas" required><br>
        <button type="submit" name="submit">Cetak</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $bawah = $_POST['bawah'];
        $atas = $_POST['atas'];
        
        echo "<br>";
        $i = $bawah;
        do {
            if (($i + 7) % 5 == 0) {
                echo "<img src='bintang.png' width='15px'> ";
            } else {
                echo "$i ";
            }
            $i++;
        } while ($i <= $atas);
    }
    ?>
</body>
</html>