<?php 
include '../dbconnect.php';
$nama=$_POST['nickname_212082'];
$username=$_POST['username_212082'];
$password=($_POST['password_212082']);
$role=$_POST['role_212082'];
	  
$query = mysqli_query($conn, "INSERT INTO slogin_212082 (nickname_212082, username_212082, password_212082, role_212082) VALUES ('$nama', '$username', '$password', '$role')");

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
 

?>
 
  <html>
<head>
  <title>Kelola User</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>