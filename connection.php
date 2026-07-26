<?php
//session_start();

$host = 'localhost';
$user = 'ajau';
$password = 'mousehitam';
$dbname = 'utmasset1';

//$conn = mysqli_connect($host, $user, $password, $dbname);

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Penyambungan pangkalan data gagal: " . mysqli_connect_error());
}
?>