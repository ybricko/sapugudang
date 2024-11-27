<?php 
include '../dbconnect.php';
$barang=$_POST['barang']; // ini ID barang nya
$qty=$_POST['qty'];
$tanggal=$_POST['tanggal'];
$ket=$_POST['ket'];

$dt=mysqli_query($conn,"select * from sstock_brg_212082 where idx_212082='$barang'");
$data=mysqli_fetch_array($dt);
$sisa=$data['stock_212082']+$qty;
$query1 = mysqli_query($conn,"update sstock_brg_212082 set stock_212082='$sisa' where idx_212082='$barang'");

$query2 = mysqli_query($conn,"insert into sbrg_masuk_212082 (idx_212082,tgl_212082,jumlah_212082,keterangan_212082) values('$barang','$tanggal','$qty','$ket')");

if($query1 && $query2){
    echo " <div class='alert alert-success'>
    <strong>Success!</strong> Redirecting you back in 1 seconds.
  </div>
<meta http-equiv='refresh' content='1; url= masuk.php'/>  ";
} else {
    echo "<div class='alert alert-warning'>
    <strong>Failed!</strong> Redirecting you back in 1 seconds.
  </div>
 <meta http-equiv='refresh' content='1; url= masuk.php'/> ";
}


?>

<html>
<head>
  <title>Barang Masuk</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>