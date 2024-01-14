<?php
include 'connection.php';

// menyimpan data id ke dalam variabel
$id_buku = $_GET['id_buku'];

// query SQL untuk delete data
$query = "DELETE FROM tb_product WHERE id_buku='$id_buku'";
mysqli_query($koneksi, $query);

// mengalihkan ke halaman index.php
header("location:../admin.php");
?>
