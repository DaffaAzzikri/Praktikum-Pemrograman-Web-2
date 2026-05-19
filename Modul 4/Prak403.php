<?php
$data = [
    [
        "no" => 1, "nama" => "Ridho", 
        "matkul" => [
            ["nama_mk" => "Pemrograman I", "sks" => 2],
            ["nama_mk" => "Praktikum Pemrograman I", "sks" => 1],
            ["nama_mk" => "Pengantar Lingkungan Lahan Basah", "sks" => 2],
            ["nama_mk" => "Arsitektur Komputer", "sks" => 3]
        ]
    ],
    [
        "no" => 2, "nama" => "Ratna", 
        "matkul" => [
            ["nama_mk" => "Basis Data I", "sks" => 2],
            ["nama_mk" => "Praktikum Basis Data I", "sks" => 1],
            ["nama_mk" => "Kalkulus", "sks" => 3]
        ]
    ],
    [
        "no" => 3, "nama" => "Tono", 
        "matkul" => [
            ["nama_mk" => "Rekayasa Perangkat Lunak", "sks" => 3],
            ["nama_mk" => "Analisis dan Perancangan Sistem", "sks" => 3],
            ["nama_mk" => "Komputasi Awan", "sks" => 3],
            ["nama_mk" => "Kecerdasan Bisnis", "sks" => 3]
        ]
    ]
];

for ($i = 0; $i < count($data); $i++) {
    $total_sks = 0;
    foreach ($data[$i]["matkul"] as $mk) {
        $total_sks += $mk["sks"];
    }
    $data[$i]["total_sks"] = $total_sks;
    
    if ($data[$i]["total_sks"] < 7) {
        $data[$i]["keterangan"] = "Revisi KRS";
    } else {
        $data[$i]["keterangan"] = "Tidak Revisi";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>PRAK403</title>
    <style>
        table { border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 5px 15px; }
        th { background-color: #D3D3D3; }
        .revisi { background-color: #ff4d4d; }
        .tidak-revisi { background-color: #4CAF50; }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Mata Kuliah diambil</th>
            <th>SKS</th>
            <th>Total SKS</th>
            <th>Keterangan</th>
        </tr>
        <?php 
        foreach ($data as $mhs) {
            $jml_matkul = count($mhs["matkul"]);
            for ($j = 0; $j < $jml_matkul; $j++) {
                echo "<tr>";
                if ($j == 0) {
                    echo "<td rowspan='$jml_matkul'>" . $mhs["no"] . "</td>";
                    echo "<td rowspan='$jml_matkul'>" . $mhs["nama"] . "</td>";
                    echo "<td>" . $mhs["matkul"][$j]["nama_mk"] . "</td>";
                    echo "<td>" . $mhs["matkul"][$j]["sks"] . "</td>";
                    echo "<td rowspan='$jml_matkul'>" . $mhs["total_sks"] . "</td>";

                    if ($mhs["keterangan"] == "Revisi KRS") {
                        echo "<td class='revisi' rowspan='$jml_matkul'>" . $mhs["keterangan"] . "</td>";
                    } else {
                        echo "<td class='tidak-revisi' rowspan='$jml_matkul'>" . $mhs["keterangan"] . "</td>";
                    }
                } else {
                    echo "<td>" . $mhs["matkul"][$j]["nama_mk"] . "</td>";
                    echo "<td>" . $mhs["matkul"][$j]["sks"] . "</td>";
                }
                echo "</tr>";
            }
        }
        ?>
    </table>
</body>
</html>