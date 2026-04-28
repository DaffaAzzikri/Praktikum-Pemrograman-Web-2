<!DOCTYPE html>
<html>
<body>
    <form method="POST">
        Nilai: <input type="number" step="any" name="nilai" required><br>
        
        Dari:<br>
        <input type="radio" name="dari" value="Celcius" required> Celcius<br>
        <input type="radio" name="dari" value="Fahrenheit"> Fahrenheit<br>
        <input type="radio" name="dari" value="Rheamur"> Rheamur<br>
        <input type="radio" name="dari" value="Kelvin"> Kelvin<br>
        
        Ke:<br>
        <input type="radio" name="ke" value="Celcius" required> Celcius<br>
        <input type="radio" name="ke" value="Fahrenheit"> Fahrenheit<br>
        <input type="radio" name="ke" value="Rheamur"> Rheamur<br>
        <input type="radio" name="ke" value="Kelvin"> Kelvin<br>
        
        <button type="submit" name="submit">Konversi</button>
    </form>
    <br>

    <?php
    if (isset($_POST['submit'])) {
        $nilai = $_POST['nilai'];
        $dari = $_POST['dari'];
        $ke = $_POST['ke'];

        switch ($dari) {
            case 'Celcius': $c = $nilai; break;
            case 'Fahrenheit': $c = ($nilai - 32) * 5/9; break;
            case 'Rheamur': $c = $nilai * 5/4; break;
            case 'Kelvin': $c = $nilai - 273.15; break;
        }

        switch ($ke) {
            case 'Celcius': $hasil = $c; $simbol = "°C"; break;
            case 'Fahrenheit': $hasil = ($c * 9/5) + 32; $simbol = "°F"; break;
            case 'Rheamur': $hasil = $c * 4/5; $simbol = "°Re"; break;
            case 'Kelvin': $hasil = $c + 273.15; $simbol = "°K"; break;
        }

        echo "<b>Hasil Konversi:</b> " . number_format($hasil, 1) . " $simbol";
    }
    ?>
</body>
</html>