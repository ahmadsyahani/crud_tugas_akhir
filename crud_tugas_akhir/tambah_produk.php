<?php include('koneksi.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Produk</title>
</head>

<body>
    <center>
        <h1>Tambah Produk</h1>
        <center>
            <form method="POST" action="proses_tambah.php" enctype="multipart/form-data">
                <section class="base">
                    <div>
                        <label>Nama Produk</label>
                        <input type="text" name="nama_produk" autofocus="" required="" />
                    </div>
                    <div>
                        <label>Deskripsi</label>
                        <input type="text" name="deskripsi_produk" />
                    </div>
                    <div>
                        <label>Harga Beli</label>
                        <input type="text" name="harga_beli" required="" />
                    </div>
                    <div>
                        <label>Harga Jual</label>
                        <input type="text" name="harga_jual" required="" />
                    </div>
                    <div>
                        <label>Gambar Produk</label>
                        <input type="file" name="gambar" required="" />
                    </div>
                    <div>
                        <button type="submit">Simpan Produk</button>
                    </div>
                </section>
            </form>
</body>

</html>