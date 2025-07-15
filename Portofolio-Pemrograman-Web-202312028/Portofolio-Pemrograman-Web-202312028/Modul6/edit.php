<?php
include 'koneksi.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = $id");
$data = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama  = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok  = $_POST['stok'];

    mysqli_query($conn, "UPDATE produk SET nama_produk='$nama', harga='$harga', stok='$stok' WHERE id_produk=$id");
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
</head>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
    </style>
<body>
    <div style="border: 2px solid #ccc; padding: 30px; border-radius: 10px;">
    <h2 style="text-align:center;">Edit Produk</h2>
    <form method="POST">
        Nama Produk: <input type="text" name="nama_produk" value="<?= $data['nama_produk'] ?>" required><br><br>
        Harga: <input type="number" name="harga" value="<?= $data['harga'] ?>" required><br><br>
        Stok: <input type="number" name="stok" value="<?= $data['stok'] ?>" required><br><br>
        <input type="submit" value="Update">
    </form>
    </div>
</body>
</html>