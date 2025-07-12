<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Buku Tamu Digital STITEK Bontang</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .container {
            background-color: #fff;
            width: 300px;
            margin: 50px auto;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 0 5px black;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 8px;
            margin: 6px 0 12px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #456882;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #025aa5;
        }

        .output {
            width: 300px;
            margin: 20px auto;
            padding: 15px;
            border-radius: 10px;
            background-color: #e6f7ff;
            border: 1px solid #b3d7ff;
            box-shadow: 0 0 5px rgba(0,0,0,0.2);
            color: #333;
        }

        .error {
            color: red;
            margin-top: 10px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <?php
    $nama = $email = $pesan = "";
    $error = "";

    // Proses form
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama  = trim($_POST["nama"]);
        $email = trim($_POST["email"]);
        $pesan = trim($_POST["pesan"]);

        if (empty($nama) || empty($email) || empty($pesan)) {
            $error = "Semua kolom harus diisi!";
        } else {
            session_start();
            $_SESSION["nama"] = htmlspecialchars($nama);
            $_SESSION["email"] = htmlspecialchars($email);
            $_SESSION["pesan"] = htmlspecialchars($pesan);
            header("Location: " . $_SERVER['PHP_SELF'] . "?success=1");
            exit;
        }
    }

    // Menampilkan data jika sukses
    session_start();
    if (isset($_GET["success"]) && isset($_SESSION["nama"])) {
        $nama  = $_SESSION["nama"];
        $email = $_SESSION["email"];
        $pesan = $_SESSION["pesan"];

        session_unset();
        session_destroy();
        echo "<div class='output'>
                <h3>Terima kasih atas kunjungan Anda!</h3>
                <p><strong>Nama:</strong> $nama</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Pesan:</strong> $pesan</p>
            </div>";
    }
    ?>

    <!-- Form Input -->
    <div class="container">
        <h1 style="text-align: center;">Buku Tamu Digital STITEK Bontang</h1>
        <form method="post" action="">
            Nama Lengkap: 
            <input type="text" name="nama" value=""><br>
            Alamat Email: 
            <input type="text" name="email" value=""><br>
            Pesan/Komentar: 
            <textarea name="pesan" rows="5"></textarea><br>
            <input type="submit" value="Kirim Pesan">

            <?php
            if (!empty($error)) {
                echo "<div class='error'>$error</div>";
            }
            ?>
        </form>
    </div>
</body>
</html>