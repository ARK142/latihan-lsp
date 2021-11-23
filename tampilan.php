<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require 'koneksi.php';
$user = read("SELECT * FROM user");
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
    <h1>Data User</h1>
    <a href="http:nambah.php"> Tambah Data </a>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Username</th>
            <th>Password</th>
            <th>edit</th>
        </tr>
        <?php foreach ($user as $u) :  ?>
            <tr>
                <td><?= $u['id'] ?></td>
                <td><?= $u['nama'] ?></td>
                <td><?= $u['email'] ?></td>
                <td><?= $u['username'] ?></td>
                <td><?= $u['password'] ?></td>
                <td><a href="ubah.php?id=<?= $u["id"]; ?>">ubah</a> |
                    <a href="hapus.php?id=<?= $u["id"]; ?>" onclick="return confirm('YAKIN?')">hapus</a>
                </td>
            </tr>
        <?php endforeach  ?>
    </table>
</body>

</html>