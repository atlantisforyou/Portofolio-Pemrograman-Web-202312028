<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Data Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4">Data Produk</h2>
        <a href="tambah.html" class="btn btn-secondary mb-3">Tambah Produk Baru</a>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark text-center">
                    <tr>
                        <th>ID</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'koneksi.php';
                    $sql = "SELECT id_produk, nama_produk, harga, stok FROM produk"; 
                    $result = $conn->query($sql);
                    
                    if($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id_produk"] . "</td>";
                            echo "<td>" . $row["nama_produk"] . "</td>";
                            echo "<td>" . $row["harga"] . "</td>";
                            echo "<td>" . $row["stok"] . "</td>";
                            echo "<td class='text-center'>
                                    <a href='edit.php?id=" . $row["id_produk"] . "' class='btn btn-warning btn-sm me-1'>Edit</a>
                                    <a href='hapus.php?id=" . $row["id_produk"] . "' class='btn btn-danger btn-sm' onclick='return confirmDelete()'>Hapus</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5' class='text-center'>Tidak ada data</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function confirmDelete() {
            return confirm("Apakah Anda yakin ingin menghapus data ini?");
        }
    </script>
</body>
</html>