<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
<nav class="navbar">
        <h1>Toko M Riziq Sirfatullah Alfarizi</h1>
        <div class="navbar-nav">
            <a href="index.php">Home</a>
            <a href="admin.php">Admin</a>
            <a href="pengadaan.php">Pengadaan</a>
        </div>
    </nav>
    <br><br><br><br>
        <fieldset>
            <legend>Halaman Pengadaan</legend>
            <center>
            <form method="GET" action="admin.php" class="search">
                <label>Cari Penerbit : </label>
                <input type="text" name="kata_cari" placeholder="Penerbit" value="<?php if (isset($_GET['kata_cari'])) {
                    echo
                        $_GET['kata_cari'];
                } ?>" />
                <button type="submit">Cari</button>
            </form>
            <button type="reset" onclick="window.location.href='form/add_penerbit_form.php'">Tambah Penerbit +</button>
            </center>
            <br>
            <table border="1" width="100%" cellpadding="5" class="left">
                <tr class="center">
                    <th>No</th>
                    <th>ID Penerbit</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Kota</th>
                    <th>Telepon</th>
                    <th>Aksi</th>
                </tr>
                <?php
                include 'proses/connection.php';
                $no = 1;
                
                $query = "SELECT * FROM tb_penerbit ORDER BY nama ASC";

                if (isset($_GET['kata_cari'])) {
                    $kata_cari = $_GET['kata_cari'];
                    $query = "SELECT * FROM tb_penerbit WHERE nama like '%" . $kata_cari . "%' ORDER BY nama ASC";
                }
                
                $result = mysqli_query($koneksi, $query);
                if (!$result) {
                    die("Query Error : " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
                }
                $no = 1;
                $data = mysqli_query($koneksi, $query);
                while($fetch = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $fetch['id_penerbit']; ?></td>
                        <td><?php echo $fetch['nama']; ?></td>
                        <td><?php echo $fetch['alamat']; ?></td>
                        <td><?php echo $fetch['kota']; ?></td>
                        <td><?php echo $fetch['telepon']; ?></td>
                        <td>
                            <a href="form/edit_penerbit.php?id_penerbit=<?php echo $fetch['id_penerbit']; ?>">Edit</a>
                            <a href="proses/delete_penerbit.php?id_penerbit=<?php echo $fetch['id_penerbit']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data Penerbit?')">Hapus</a>
                            </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </fieldset>
    </div>
    <!--Footer-->
    <footer>
        <p>&copy; M. Riziq Sirfatullah Alfarizi - i.2211266.</p>
    </footer>
</body>
</html>