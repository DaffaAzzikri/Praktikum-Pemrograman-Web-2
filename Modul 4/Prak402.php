<?php
$data = [
    ["nama" => "Andi", "nim" => "2101001", "uts" => 87, "uas" => 65],
    ["nama" => "Budi", "nim" => "2101002", "uts" => 76, "uas" => 79],
    ["nama" => "Tono", "nim" => "2101003", "uts" => 50, "uas" => 41],
    ["nama" => "Jessica", "nim" => "2101004", "uts" => 60, "uas" => 75]
];

for ($i = 0; $i < count($data); $i++) {
    $data[$i]["akhir"] = ($data[$i]["uts"] * 0.4) + ($data[$i]["uas"] * 0.6);
    
    if ($data[$i]["akhir"] >= 80) {
        $data[$i]["huruf"] = "A";
    } elseif ($data[$i]["akhir"] >= 70 && $data[$i]["akhir"] <= 79.9) {
        $data[$i]["huruf"] = "B";
    } elseif ($data[$i]["akhir"] >= 60 && $data[$i]["akhir"] <= 69.9) {
        $data[$i]["huruf"] = "C";
    } elseif ($data[$i]["akhir"] >= 50 && $data[$i]["akhir"] <= 59.9) {
        $data[$i]["huruf"] = "D";
    } else {
        $data[$i]["huruf"] = "E";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>PRAK402</title>
    <style>
        table { border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 5px 15px; }
        th { background-color: #D3D3D3}
    </style>
</head>
<body>
    <table>
        <tr>
            <th>Nama</th>
            <th>NIM</th>
            <th>Nilai UTS</th>
            <th>Nilai UAS</th>
            <th>Nilai Akhir</th>
            <th>Huruf</th>
        </tr>
        <?php foreach ($data as $mhs) : ?>
            <tr>
                <td><?= $mhs["nama"] ?></td>
                <td><?= $mhs["nim"] ?></td>
                <td><?= $mhs["uts"] ?></td>
                <td><?= $mhs["uas"] ?></td>
                <td><?= $mhs["akhir"] ?></td>
                <td><?= $mhs["huruf"] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>