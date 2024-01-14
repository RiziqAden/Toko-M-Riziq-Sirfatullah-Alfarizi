<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko M Riziq Sirfatullah Alfarizi</title>
    <link rel="stylesheet" href="../css/form.css">

</head>
<body>
<nav class="navbar">
    <h1>Toko M Riziq Sirfatullah Alfarizi</h1>
    <div class="navbar-nav">
        <a href="../index.php">Home</a>
        <a href="../admin.php">Admin</a>
    </div>
    </nav>

    <div class="TypePengguna">
    <h2>Hello Admin Toko</h2>
    </div>

        <fieldset class="fiel_edit">
            <?php
                include '../proses/connection.php';
                $id_buku = $_GET['id_buku'];
                $query = "SELECT * FROM tb_product WHERE id_buku='$id_buku'";
                $result = mysqli_query($koneksi, $query);
                if (!$result) {
                    die("Query Error : " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
                }
                $data = mysqli_fetch_assoc($result);
            ?>
            <legend>Edit Buku</legend>
            <form action="../proses/edit_proses.php" method="post">
                
                <div class="input">
                    <label>Kode Buku 
                        <small>(Kode Buku harus unik)</small>*
                    </label>
                    <input type="text" name="id_buku" placeholder="Kode Buku" required value="<?php echo $data['id_buku'] ?>" readonly>
                </div>
                <div class="input">
                    <label>Kategori</label>
                    <input type="text" name="kategori" placeholder="Kategori Buku" required value="<?php echo $data['kategori'] ?>">
                </div>
                <div class="input">
                    <label>Nama Buku</label>
                    <input type="text" name="nama_buku" placeholder="Nama Buku" required value="<?php echo $data['nama_buku'] ?>">
                </div>
                <div class="input">
                    <label>Harga</label>
                    <input type="number" name="harga" placeholder="Harga" required value="<?php echo $data['harga'] ?>">
                </div>
                <div class="input">
                    <label>Stok</label>
                    <input type="number" name="stok" placeholder="Stok" required value="<?php echo $data['stok'] ?>">
                </div>
                <div class="input">
                    <label>Penerbit</label>
                    <select name="penerbit" placeholder="Penerbit" required>
                    <option value="<?php echo $data['penerbit']; ?>" hidden><?php echo $data['penerbit']; ?></option>
                        <?php
                        include 'connection.php';
                        $query = "SELECT * FROM tb_penerbit ORDER BY nama ASC";
                        $result = mysqli_query($koneksi, $query);
                        if (!$result) {
                            die("Query Error : " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
                        }else {
                            while($fetch = mysqli_fetch_array($result)){
                                ?>
                                <option value="<?php echo $fetch['nama']; ?>" hidden><?php echo $fetch['nama']; ?></option>
                                <option value="<?php echo $fetch['nama']; ?>"><?php echo $fetch['nama']; ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>                
                </div>
                <div class="input" align="right">
                    <button type="submit" name="edit" onclick="return confirm('Apakah Anda yakin ingin mengubah buku?')">SIMPAN</button>
                    <button type="reset" onclick="window.location.href='admin.php'">Batal</button>
                </div>

            </form>
        </fieldset>
    </div>
    <!--Footer-->
    <footer>
        <p>&copy; M. Riziq Sirfatullah Alfarizi - i.2211266.</p>
    </footer>
</body>
</html>