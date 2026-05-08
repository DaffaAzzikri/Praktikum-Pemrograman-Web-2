<!DOCTYPE html>
<html lang="id">
<head>
    <title>PRAK305</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="input" required>
        <button type="submit" name="submit">submit</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $input = $_POST['input'];
        $panjang = strlen($input);
        
        echo "<br><b>Input:</b><br>";
        echo $input . "<br><br>";
        
        echo "<b>Output:</b><br>";
        for ($i = 0; $i < $panjang; $i++) {
            $huruf = substr($input, $i, 1);

            for ($j = 0; $j < $panjang; $j++) {
                if ($j == 0) {
                    echo strtoupper($huruf);
                } else {
                    echo strtolower($huruf);
                }
            }
        }
    }
    ?>
</body>
</html>