<?php
include 'koneksi.php';

//Mengambil data dari form
    $nama  = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok  = $_POST['stok'];

// Query untuk menyisipkan data
$sql = "INSERT INTO produk (nama_produk, harga, stok) VALUES ('$nama', '$harga', '$stok')"; 

if ($conn->query($sql) === TRUE) {
    header("Location: index.php"); // Arahkan kembali ke halaman utama jika berhasil 
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
</head>
<body>
    <h2>Tambah Produk Baru</h2>
    <form method="POST">
        Nama Produk: <input type="text" name="nama_produk" required><br><br>
        Harga: <input type="number" name="harga" required><br><br>
        Stok: <input type="number" name="stok" required><br><br>
        <input type="submit" value="Simpan">
    </form>
</body>
</html>