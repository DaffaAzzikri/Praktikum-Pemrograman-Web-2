<!DOCTYPE html>
<html>
<body>
    <form method="POST">
        Nilai: <input type="number" name="nilai" min="0" required><br>
        <button type="submit" name="submit">Konversi</button>
    </form>
    <br>

    <?php
    if (isset($_POST['submit'])) {
        $nilai = $_POST['nilai'];
        $hasil = "";

        if ($nilai == 0) {
            $hasil = "Nol";
        } elseif ($nilai > 0 && $nilai < 10) {
            $hasil = "Satuan";
        } elseif ($nilai >= 11 && $nilai < 20) {
            $hasil = "Belasan";
        } elseif ($nilai == 10 || ($nilai >= 20 && $nilai < 100)) {
            $hasil = "Puluhan";
        } elseif ($nilai >= 100 && $nilai < 1000) {
            $hasil = "Ratusan";
        } elseif ($nilai >= 1000) {
            $hasil = "Anda Menginput Melebihi Limit Bilangan";
        }

        echo "<b>Hasil:</b> $hasil";
    }
    ?>
</body>
</html>