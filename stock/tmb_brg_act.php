<?php 
include '../dbconnect.php';
$nama=$_POST['nama_212082'];
$jenis=$_POST['jenis_212082'];
$ukuran=$_POST['ukuran_212082'];
$merk=$_POST['merk_212082'];
$satuan=$_POST['satuan_212082'];
$stock=$_POST['stock_212082'];
$harga=$_POST['harga_212082'];
$hargabeli = $_POST['harga_beli_212082'];
	  
$query = mysqli_query($conn,"insert into sstock_brg_212082 values('','$nama','$jenis','$merk','$ukuran','$stock','$satuan','$harga','$hargabeli')");
if ($query){

echo " <div class='alert alert-success'>
    <strong>Success!</strong> Redirecting you back in 1 seconds.
  </div>
<meta http-equiv='refresh' content='1; url= stock.php'/>  ";
} else { echo "<div class='alert alert-warning'>
    <strong>Failed!</strong> Redirecting you back in 1 seconds.
  </div>
 <meta http-equiv='refresh' content='1; url= stock.php'/> ";
}
 
?>
 
  <html>
<head>
  <title>Tambah Barang</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>