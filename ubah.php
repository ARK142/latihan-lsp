<?php

require 'koneksi.php';
//ambil data di URL
$id = $_GET["id"];
//query data siswa
$mhs = read("SELECT * FROM user WHERE id = $id")[0];
//cek tombol
if (isset($_POST["submit"])) {


    //cekapakah data berhasil di ubah
    if (ubah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil diubah !');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal diubah !');
            document.location.href = 'index.php';
            </script>
    ";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>ubah data</h1>
    <form action="" method="POST">
        <input type="hidden" name="id" value="<? $mhs["id"]; ?>">
        <ul>
            <li>
                <label for="nama">NAMA : </label>
                <input type="text" id="nama" name="nama" required value="<?= $mhs["nama"]; ?>">
            </li>
            <li>
                <label for="email">E-mail : </label>
                <input type="text" id="email" name="email" required value="<?= $mhs["email"]; ?>">
            </li>
            <li>
                <label for="username">username : </label>
                <input type="text" id="username" name="username" required value="<?= $mhs["username"]; ?>">
            </li>
            <li>
                <label for="pasword">password : </label>
                <input type="text" id="password" name="password" required value="<?= $mhs["password"]; ?>">
            </li>
            <li>
                <button type="submit" name="submit">ubah Data</button>
            </li>
        </ul>
    </form>
</body>

</html>