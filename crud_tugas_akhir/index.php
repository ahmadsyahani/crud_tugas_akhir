<?php include('koneksi.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="subjek 1.jpg" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Produk</title>
</head>

<body>
    <center>
        <h1>Data Produk</h1>
        <center>
            <center><a href="tambah_produk.php">+ &nbsp; Tambah Produk</a>
                <center>
                    <br />
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Produk</th>
                                <th>Dekripsi</th>
                                <th>Harga Beli</th>
                                <th>Harga Jual</th>
                                <th>Gambar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $query = "SELECT * FROM produk ORDER BY id ASC";
                            $result = mysqli_query($koneksi, $query);

                            if (!$result) {
                                die("Query Error: " . mysqli_errno($koneksi) .
                                    " - " . mysqli_error($koneksi));
                            }


                            $no = 1;

                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row['nama_produk']; ?></td>
                                    <td><?php echo substr($row['deskripsi_produk'], 0, 20); ?>...</td>
                                    <td>Rp <?php echo number_format($row['harga_beli'], 0, ',', '.'); ?></td>
                                    <td>Rp <?php echo $row['harga_jual']; ?></td>
                                    <td style="text-align: center;"><img src="gambar/<?php echo $row['gambar']; ?>" style="width: 120px;"></td>
                                    <td>
                                        <a href="edit_produk.php?id=<?php echo $row['id']; ?>">Edit</a>
                                        <a href="proses_hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
                                    </td>
                                </tr>

                            <?php
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
</body>

</html>