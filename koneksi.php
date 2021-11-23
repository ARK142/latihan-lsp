<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "db_latihanlsp";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
//if (!$conn) {
//die("Connection failed: " . mysqli_connect_error());
//}
//echo "Connected successfully";
function read($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function register($data)
{
    global $conn;

    $nama = ($data["nama"]);
    $email = ($data["email"]);
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password = password_hash($password, PASSWORD_DEFAULT);

    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('username sudah terdaftar!')
              </script>";
        return false;
    }

    $query = "INSERT INTO user
                VALUES
              ('', '$nama', '$email', '$username', '$password')
            ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM user WHERE id = $id");

    return mysqli_affected_rows($conn);
}
function ubah($data)
{
    global $conn;
    $id = htmlspecialchars($data["id"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $username = htmlspecialchars($data["username"]);
    $password = htmlspecialchars($data["pasword"]);

    $query = "UPDATE user SET
        nama = '$nama',
        email = '$email',
        username = '$username',
        pasword = '$password'
        WHERE id = $id
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
