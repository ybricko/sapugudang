<?php 
include '../dbconnect.php';
$id = $_POST['id_212082'];

	  
$query = mysqli_query($conn, "DELETE FROM slogin_212082 WHERE id_212082 = '$id'");

if ($query){

echo " <div class='alert alert-success'>
    <strong>Success!</strong> Redirecting you back in 1 seconds.
  </div>
<meta http-equiv='refresh' content='1; url= regist.php'/>  ";
} else { echo "<div class='alert alert-warning'>
    <strong>Failed!</strong> Redirecting you back in 1 seconds.
  </div>
 <meta http-equiv='refresh' content='1; url= regist.php'/> ";
}
 