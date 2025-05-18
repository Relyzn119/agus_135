<?php
include("koneksi.php");
$x = $_GET['nim'];
$sql = "delete from mahasiswa where nim='$x'";
$exe = $conn -> query($sql);
if ($exe) {
    header("location:read.php");
}
?>