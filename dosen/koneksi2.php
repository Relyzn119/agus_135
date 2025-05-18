<?php
$host = "localhost";
$username = "root";
$pass = "";
$db = "dbpweb";
$conn = new mysqli($host, $username, $pass, $db);
if ($conn->connect_error) {
    die("". $conn->connect_error);
}

?>
