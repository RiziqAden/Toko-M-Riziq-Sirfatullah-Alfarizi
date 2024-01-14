<?php
$server = "localhost";
$user = "root";
$pass ="";
$db ="db_toko_riziq";

$koneksi = mysqli_connect($server, $user, $pass, $db) or 
    die ("Gagal Terhubung");
?>