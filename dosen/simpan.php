<?php
include("koneksi2.php");
$nidn = $_POST['nidn'];
$nama = $_POST['nama'];
$jenkel = $_POST['jenkel'];
$jabatan = $_POST['jabatan'];
$nohp = $_POST['no_hp'];
$sql = "insert into dosen values('$nidn','$nama','$jenkel','$jabatan','$nohp')";
$exe = $conn ->query($sql);
if ($exe ) {
    header("location:read.php");
}