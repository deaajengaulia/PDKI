<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_biodata");
$data = mysqli_query($koneksi, "SELECT * FROM biodata ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Data Biodata RSA</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

<style>
body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #ff9a9e, #fad0c4);
    margin: 0;
    padding: 20px;
}

/* CONTAINER */
.container {
    max-width: 900px;
    margin: auto;
}

/* CARD */
.card {
    background: white;
    padding: 25px;
    border-radius: 20px;
    box-shadow: 0 15px 30px rgba(0,0,0,0.2);
}

/* JUDUL */
h2 {
    text-align: center;
    color: #ff6a88;
    margin-bottom: 20px;
}

/* TABLE */
table {
    width: 100%;
    border-collapse: collapse;
    overflow: hidden;
    border-radius: 10px;
}

th {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    padding: 12px;
}

td {
    padding: 12px;
    border-bottom: 1px solid #eee;
}

tr:nth-child(even) {
    background: #f9f9f9;
}

tr:hover {
    background: #ffe0e6;
    transition: 0.3s;
}

/* BUTTON */
a {
    display: inline-block;
    margin-top: 15px;
    padding: 10px 20px;
    border-radius: 10px;
    background: linear-gradient(135deg, #36d1dc, #5b86e5);
    color: white;
    text-decoration: none;
    font-weight: 500;
}

a:hover {
    opacity: 0.9;
}

/* KOSONG */
.kosong {
    text-align: center;
    color: #888;
    padding: 20px;
}
</style>

</head>
<body>

<div class="container">
    <div class="card">
        <h2>📄 Data Biodata (RSA)</h2>

        <?php if(mysqli_num_rows($data) > 0): ?>
        <table>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
            </tr>

            <?php $no = 1; while($d = mysqli_fetch_array($data)){ ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= htmlspecialchars($d['nama']); ?></td>
                <td><?= htmlspecialchars($d['alamat']); ?></td>
            </tr>
            <?php } ?>

        </table>
        <?php else: ?>
            <div class="kosong">Belum ada data 😢</div>
        <?php endif; ?>

        <a href="index.php">⬅ Kembali ke Input</a>
    </div>
</div>

</body>
</html>
