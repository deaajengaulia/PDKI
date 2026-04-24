<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_biodata");

if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];

    mysqli_query($koneksi, "INSERT INTO biodata (nama, alamat) VALUES ('$nama','$alamat')");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Input Biodata RSA</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

<style>
body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #667eea, #764ba2);
    margin: 0;
    padding: 20px;
}

/* CONTAINER */
.container {
    max-width: 800px;
    margin: auto;
}

/* CARD */
.card {
    background: #fff;
    padding: 25px;
    border-radius: 20px;
    box-shadow: 0 15px 30px rgba(0,0,0,0.2);
    margin-bottom: 20px;
}

/* JUDUL */
h2 {
    text-align: center;
    color: #5a67d8;
}

/* FORM */
.form-group {
    margin-bottom: 15px;
}

label {
    font-weight: 600;
}

input, textarea {
    width: 100%;
    padding: 10px;
    border-radius: 10px;
    border: 1px solid #ddd;
    margin-top: 5px;
}

/* BUTTON */
button {
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 10px;
    background: linear-gradient(135deg, #43e97b, #38f9d7);
    color: white;
    font-size: 16px;
    cursor: pointer;
}

button:hover {
    opacity: 0.9;
}

/* TABLE */
table {
    width: 100%;
    border-collapse: collapse;
}

th {
    background: #667eea;
    color: white;
    padding: 10px;
}

td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

tr:hover {
    background: #f5f5f5;
}
</style>

</head>
<body>

<div class="container">

    <!-- FORM -->
    <div class="card">
        <h2>✨ Input Biodata (RSA)</h2>
        <form method="POST">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" required>
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" required></textarea>
            </div>

            <button type="submit" name="simpan">💾 Simpan</button>
        </form>
    </div>

    <!-- DATA -->
    <div class="card">
        <h2>📄 Data Biodata</h2>
        <table>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
            </tr>

            <?php
            $data = mysqli_query($koneksi, "SELECT * FROM biodata");
            $no = 1;
            while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $d['nama']; ?></td>
                <td><?= $d['alamat']; ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>

</div>

</body>
</html>
