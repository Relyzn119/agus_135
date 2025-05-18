<?php
include("koneksi.php");
session_start();

$username = $_POST['username'];
$password = $_POST['password'];


$sql = "SELECT * FROM users WHERE username = ?";
$exe = $conn->prepare($sql);
$exe->bind_param("s", $username);
$exe->execute();
$banyak = $exe->get_result();

if ($banyak->num_rows === 1) {
    $user = $banyak->fetch_assoc();

    if ($password === $user['password']) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['user_id'] = $user['id']; 
        $_SESSION['login'] = true;
        header("location:read.php");
        exit;
    }
}

echo "Username atau Password Salah!";
?>
