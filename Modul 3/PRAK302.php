<!DOCTYPE html>
<html lang="id">
<head>
    <title>PRAK302</title>
</head>
<body>
    <form action="" method="POST">
        Tinggi: <input type="number" name="tinggi" required><br>
        Alamat Gambar: <input type="url" name="alamat" required><br>
        <button type="submit" name="submit">Cetak</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $tinggi = $_POST['tinggi'];
        $alamat = $_POST['alamat'];
        
        echo "<br>";
        $i = 1;
        while ($i <= $tinggi) {
            $j = 1;
            while ($j < $i) {
                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; 
                $j++;
            }
            $k = $tinggi;
            while ($k >= $i) {
                echo "<img src='$alamat' width='20px'>";
                $k--;
            }
            echo "<br>";
            $i++;
        }
    }
    ?>
</body>
</html>