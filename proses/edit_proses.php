<?php

if (isset($_POST['edit'])) {
    include 'connection.php';
    $id_buku = $_POST['id_buku'];
    $kategori = $_POST['kategori'];
    $nama = $_POST['nama_buku'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $penerbit = $_POST['penerbit'];

    $query = "UPDATE tb_product SET Kategori='$kategori', nama_buku='$nama', harga='$harga', stok='$stok', penerbit='$penerbit' WHERE id_buku='$id_buku'";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
            " - " . mysqli_error($koneksi));
    } else {
        $result;
        echo "<script>alert('Buku berhasil diedit');window.location='../admin.php';</script>";
    }
}
?>