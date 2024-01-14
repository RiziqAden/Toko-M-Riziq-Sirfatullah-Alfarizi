<?php

include 'connection.php';

if (isset($_POST['tambah'])) {
    $id_penerbit = $_POST['id_penerbit'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];
    $telepon = $_POST['telepon'];
    $query = "INSERT INTO tb_penerbit VALUES ('$id_penerbit','$nama','$alamat','$kota','$telepon')";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        die("Query Error : " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
    } else {
        $result;
        echo "<script>alert('Data Penerbit berhasil ditambahkan');window.location='../pengadaan.php';</script>";
    }
}