<?php
include("koneksi.php");
session_start();

if (!isset($_SESSION['user_id'])) {
    header("location:login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$jenkel = $_POST['jenkel'];
$email = $_POST['email'];
$nohp = $_POST['nohp'];

$sql = "INSERT INTO mahasiswa (nim, nama, jenkel, email, nohp, user_id) VALUES (?, ?, ?, ?, ?, ?)";
$exe = $conn->prepare($sql);
$exe->bind_param("sssssi", $nim, $nama, $jenkel, $email, $nohp, $user_id);
$simpan = $exe->execute();

if ($simpan) {
    header("location:read.php");
    exit;
} else {
    echo "Gagal insert data.";
}
?>
