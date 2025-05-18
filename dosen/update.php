<?php
include("koneksi2.php");
$nidn=$_POST['nidn'];
$nama=$_POST['nama'];
$jk=$_POST['jenkel'];
$jabatan=$_POST['jabatan'];
$nohp=$_POST['no_hp'];
$sql="update dosen set nama='$nama',jenkel='$jk',jabatan='$email',no_hp='$nohp' where nidn='$nidn'";
$exe=$conn->query($sql);
if ($exe){
    header("location:read.php");
}
?>