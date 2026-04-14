<?php
$index = array("Samsung Galaxy S22", "Samsung Galaxy S22+", "Samsung Galaxy A03", "Samsung Galaxy XCover 5");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }
    </style>
</head>
<body>
<table>
        <tr>
            <th>Daftar Smartphone Samsung</th>
        </tr>
        
        <?php
        for($i = 0; $i < count($index); $i++) {
            echo "<tr><td>" . $index[$i] . "</td></tr>";
        }
        ?>
    </table>
</body>
</html>
