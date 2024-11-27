<?php
include '../dbconnect.php';

$barang = $_POST['barang']; // ID barang
$qty = $_POST['qty'];
$tanggal = $_POST['tanggal'];
$penerima = $_POST['penerima_212082'];
$ket = $_POST['ket'];

// Ambil data stok, harga beli, dan harga jual barang
$dt = mysqli_query($conn, "SELECT * FROM sstock_brg_212082 WHERE idx_212082='$barang'");
$data = mysqli_fetch_array($dt);

// Cek apakah stock cukup
if ($data['stock_212082'] < $qty) {
    echo "<script>alert('BARANG TIDAK CUKUP');</script>";
    echo "<meta http-equiv='refresh' content='0; url=keluar.php'/>"; // Redirect kembali ke halaman keluar
    exit();
}

$sisa = $data['stock_212082'] - $qty;
$harga_jual = $data['harga_212082'];
$harga_beli = $data['harga_beli_212082'];

// Hitung keuntungan: (harga jual - harga beli) * jumlah barang yang dijual
$keuntungan = ($harga_jual - $harga_beli) * $qty;

// Update stok barang
$query1 = mysqli_query($conn, "UPDATE sstock_brg_212082 SET stock_212082='$sisa' WHERE idx_212082='$barang'");

// Masukkan data barang keluar
$query2 = mysqli_query($conn, "INSERT INTO sbrg_keluar_212082 (idx_212082, tgl_212082, jumlah_212082, penerima_212082, keterangan_212082, keuntungan_212082) 
VALUES ('$barang', '$tanggal', '$qty', '$penerima', '$ket', '$keuntungan')");

if ($query1 && $query2) {
    echo "<div class='alert alert-success'>
        <strong>Success!</strong> Redirecting you back in 1 seconds.
    </div>
    <meta http-equiv='refresh' content='1; url=keluar.php'/>";
} else {
    echo "<div class='alert alert-warning'>
        <strong>Failed!</strong> Redirecting you back in 1 seconds.
    </div>
    <meta http-equiv='refresh' content='1; url=keluar.php'/>";
}
?>

<html>
<head>
  <title>Barang Keluar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
</html>