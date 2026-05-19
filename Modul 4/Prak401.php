<?php
$panjang = "";
$lebar = "";
$nilai = "";

if (isset($_POST["submit"])) {
    $panjang = $_POST["panjang"];
    $lebar = $_POST["lebar"];
    $nilai = $_POST["nilai"];
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>PRAK401</title>
    <style>
        table { border-collapse: collapse; }
        td { border: 1px solid black; padding: 5px 10px; text-align: center; }
    </style>
</head>
<body>
    <form action="" method="POST">
        Panjang: <input type="text" name="panjang" value="<?= $panjang ?>"><br>
        Lebar: <input type="text" name="lebar" value="<?= $lebar ?>"><br>
        Nilai: <input type="text" name="nilai" value="<?= $nilai ?>"><br>
        <button type="submit" name="submit">Cetak</button>
    </form>
    <br>

    <?php
    if (isset($_POST["submit"])) {
        $isi = explode(" ", $nilai);
        $panjang_nilai = count($isi);

        if ($panjang * $lebar == $panjang_nilai) {
            $count = 0;
            echo "<table>";
            for ($i = 0; $i < $panjang; $i++) {
                echo "<tr>";
                for ($j = 0; $j < $lebar; $j++) {
                    echo "<td>" . $isi[$count] . "</td>";
                    $count++;
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Panjang nilai tidak sesuai dengan ukuran matriks";
        }
    }
    ?>
</body>
</html>