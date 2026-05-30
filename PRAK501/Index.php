<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRAK501</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            text-align: center;
            width: 400px;
        }
        h1 {
            color: #333;
            margin-bottom: 30px;
        }
        .menu-container {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        .btn {
            display: block;
            padding: 15px;
            background-color: #222;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #555;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Perpustakaan Web</h1>
        <div class="menu-container">
        <a href="Member/MemberController.php" class="btn">Data Member</a>
        <a href="Buku/BukuController.php" class="btn">Data Buku</a>
        <a href="Peminjaman/PeminjamanController.php" class="btn">Data Peminjaman</a>
        </div>
    </div>

</body>
</html>