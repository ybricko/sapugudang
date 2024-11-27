<!-- cek apakah sudah login -->
	<?php 
	session_start();
	if($_SESSION['role_212082']!="Admin"){
		header("location:../index.php?pesan=belum_login");
	}
	?>