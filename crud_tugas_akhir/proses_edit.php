<?php

include 'koneksi.php';


$id = $_POST['id'];
$nama_produk   = $_POST['nama_produk'];
$deskripsi_produk     = $_POST['deskripsi_produk'];
$harga_beli    = $_POST['harga_beli'];
$harga_jual    = $_POST['harga_jual'];
$gambar = $_FILES['gambar']['name'];

if ($gambar != "") {
    $ekstensi_diperbolehkan = array('png', 'jpg');
    $x = explode('.', $gambar);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar']['tmp_name'];
    $angka_acak     = rand(1, 999);
    $nama_gambar_baru = $angka_acak . '-' . $gambar;
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        move_uploaded_file($file_tmp, 'gambar/' . $nama_gambar_baru);

        // jalankan query UPDATE berdasarkan ID yang produknya kita edit
        $query  = "UPDATE produk SET nama_produk = '$nama_produk', deskripsi_produk = '$deskripsi_produk', harga_beli = '$harga_beli', harga_jual = '$harga_jual', gambar = '$nama_gambar_baru'";
        $query .= "WHERE id = '$id'";
        $result = mysqli_query($koneksi, $query);

        if (!$result) {
            die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
                " - " . mysqli_error($koneksi));
        } else {

            echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
        }
    } else {

        echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_produk.php';</script>";
    }
} else {

    $query  = "UPDATE produk SET nama_produk = '$nama_produk', deskripsi_produk = '$deskripsi_produk', harga_beli = '$harga_beli', harga_jual = '$harga_jual'";
    $query .= "WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
            " - " . mysqli_error($koneksi));
    } else {

        echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
    }
}
