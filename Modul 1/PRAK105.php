<?php
$index = array(
    "Hp_1" => "Samsung Galaxy S22",
    "Hp_2" => "Samsung Galaxy S22+",
    "Hp_3" => "Samsung Galaxy A03",
    "Hp_4" => "Samsung Galaxy XCover 5"
);
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
        th {
            background-color: red;
        }
    </style>
</head>
<body>
<table>
        <tr>
            <th>Daftar Smartphone Samsung</th>
        </tr>
        
        <?php
        foreach($index as $hp => $hasil) {
            echo "<tr><td>" . $hasil. "</td></tr>";
        }   
        ?>
    </table>
</body>
</html>