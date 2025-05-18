<?php

include("koneksi2.php");
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "select * from users where username='$username' and password='$password'";
$exe = $conn->query($sql);
$banyak = $exe->num_rows;
if ($banyak == 1) {
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['login'] = true;
    header("location:read.php");
} else {
    echo "Username atau Password Salah!";

}
?>