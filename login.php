<?php
session_start();

if (isset($_SESSION["login"])) {
    header("Location: tampildata.php");
    exit;
}
require "koneksi.php";

if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE
       username = '$username'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            header("Location: tampildata.php");
            exit;
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Halaman Login</title>
</head>

<body>

    <h1>Halaman Login</h1>

    <form action="" method="post">

        <ul>
            <li>
                <label for="username">username :</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">password :</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <button type="submit" name="login">login</button>
            </li>
        </ul>

    </form>

</body>

</html>