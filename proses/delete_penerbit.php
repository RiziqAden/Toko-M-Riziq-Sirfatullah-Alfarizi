<?php

include 'connection.php';
$id_penerbit = $_GET['id_penerbit'];
$query = "DELETE FROM tb_penerbit WHERE id_penerbit='$id_penerbit'";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
        " - " . mysqli_error($koneksi));
} else {
    $result;
    echo "<script>alert('Data Penerbit berhasil dihapus');window.location='../pengadaan.php';</script>";
}
?>