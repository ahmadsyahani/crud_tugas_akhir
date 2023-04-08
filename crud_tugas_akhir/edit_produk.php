<?php include('koneksi.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM produk where id = '$id'";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        die("Query Error : " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
    }
    $data = mysqli_fetch_assoc($result);

    if (!count($data)) {
        echo "<script>alert('Data tidak ditemukan pada tabel');window.location='index.php';</script>";
    }
} else {
    echo "<script>alert('Masukkan ID yang ingin diedit');window.location='index.php';</script>";
}



?>
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
        <h1>Edit Produk <?php echo $data['nama_produk']; ?></h1>
        <center>
            <form method="POST" action="proses_edit.php" enctype="multipart/form-data">
                <section class="base">
                    <!-- menampung nilai id produk yang akan di edit -->
                    <input name="id" value="<?php echo $data['id']; ?>" hidden />
                    <div>
                        <label>Nama Produk</label>
                        <input type="text" name="nama_produk" value="<?php echo $data['nama_produk']; ?>" autofocus="" required="" />
                    </div>
                    <div>
                        <label>Deskripsi</label>
                        <input type="text" name="deskripsi_produk" value="<?php echo $data['deskripsi_produk']; ?>" />
                    </div>
                    <div>
                        <label>Harga Beli</label>
                        <input type="text" name="harga_beli" required="" value="<?php echo $data['harga_beli']; ?>" />
                    </div>
                    <div>
                        <label>Harga Jual</label>
                        <input type="text" name="harga_jual" required="" value="<?php echo $data['harga_jual']; ?>" />
                    </div>
                    <div>
                        <label>Gambar Produk</label>
                        <img src="gambar/<?php echo $data['gambar']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
                        <input type="file" name="gambar" />
                        <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah gambar produk</i>
                    </div>
                    <div>
                        <button type="submit">Simpan Perubahan</button>
                    </div>
                </section>
            </form>
</body>

</html>