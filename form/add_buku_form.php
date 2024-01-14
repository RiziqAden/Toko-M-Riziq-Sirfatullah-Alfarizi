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
    <br><br><br>

    <fieldset>
        <legend align="center"><h5>Input Data Produk</h5></legend>
        <!--Form untuk Input Data-->
        <form action="../proses/add_buku_proses.php" method="post">
        <div class="input">
            <input type="text" name="id_buku" placeholder="ID Buku" size="40px">
            </div>
        <div class="input">
            <input type="text" name="kategori" placeholder="Kategori Buku" size="40px">
            </div>
        <div class="input">
            <input type="text" name="nama_buku" placeholder="Nama Buku" size="40px">
        <div class="input">
            <input type="text" name="harga" placeholder="Harga Buku" size="40px">
        </div>
        <div class="input">
            <input type="text" name="stok" placeholder="Stok Buku" size="40px">
        </div>
        <div class="input">
            <label>Penerbit</label>
            <select name="penerbit" placeholder="Penerbit" required>
            <option value="" hidden>Pilih Penerbit</option>
                <?php
                include '../proses/connection.php';
                $query = "SELECT * FROM tb_penerbit ORDER BY nama ASC";
                $result = mysqli_query($koneksi, $query);
                if (!$result) {
                    die("Query Error : " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
                }else {
                    while($fetch = mysqli_fetch_array($result)){
                        ?>
                        <option value="<?php echo $fetch['nama']; ?>"><?php echo $fetch['nama']; ?></option>
                        <?php
                    }
                }
                ?>
            </select>                
        </div>

            <button type="submit" name="submit">SIMPAN</button>
            <button type="reset" name="reset">RESET</button>
        </form>
    </fieldset>
    <!--Footer-->
    <footer>
        <p>&copy; M. Riziq Sirfatullah Alfarizi - i.2211266.</p>
    </footer>
</body>
</html>