<!doctype html>
<html class="no-js" lang="en">

<?php 
	include 'cek.php';
	include '../dbconnect.php';
	?>

<html>
<head>
<title>*Data Bahan Masuk</title>
<link rel="icon" 
      type="image/png" 
      href="favicon.png">
	   <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-144808195-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-144808195-1');
	</script>

</head>

<body>
		<div class="container">
			<h2>Transaksi Barang : Masuk</h2>
				<div class="data-tables datatable-dark">
					<table class="display" id="dataTable3" style="width:100%"><thead class="thead-dark">
											<tr>
												<th>No</th>
												<th>Tanggal</th>
												<th>Nama Barang</th>
												<th>Jenis</th>
												<th>Merk</th>
												<th>Ukuran</th>
												<th>Jumlah</th>
												<th>Total Pembelian</th>
												<th>Satuan</th>
												<th>Keterangan</th>

												
												<!--<th>Opsi</th>-->
											</tr></thead><tbody>
											<?php 
											$brg=mysqli_query($conn,"SELECT * from sbrg_masuk_212082 sb, sstock_brg_212082 st where sb.idx_212082=st.idx_212082 order by sb.id_212082 ASC");
											$no=1;
											while($b=mysqli_fetch_array($brg)){

												?>
												
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php $tanggals=$b['tgl_212082']; echo date("d-M-Y", strtotime($tanggals)) ?></td>
													<td><?php echo $b['nama_212082'] ?></td>
													<td><?php echo $b['jenis_212082'] ?></td>
													<td><?php echo $b['merk_212082'] ?></td>
													<td><?php echo $b['ukuran_212082'] ?></td>
													<td><?php echo $b['jumlah_212082'] ?></td>
													<td><?php echo 'Rp. ' . number_format($b['harga_beli_212082'], 0, ',', '.'); ?></td>
													<td><?php echo $b['satuan_212082'] ?></td>
													<td><?php echo $b['keterangan_212082'] ?></td>
												</tr>		
												<?php 
											}
											?>
										</tbody>
										</table>
								</div>
						</div>
	
<script>
$(document).ready(function() {
    $('#dataTable3').DataTable( {
        dom: 'Bfrtip',
        buttons: [
           'copy', 'csv', 'excel', 'pdf', 'print',
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

	

</body>

</html>