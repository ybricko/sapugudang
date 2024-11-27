<!DOCTYPE html>
<html lang="en">
<head>
    <title>Notes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

<?php
session_start();
include_once '../dbconnect.php';

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['id_212082'])) {
    header("Location: index.php?pesan=belum_login");
    exit();
}

// Pastikan konten tidak kosong
if (isset($_POST['konten']) && !empty(trim($_POST['konten']))) {
    $konten = mysqli_real_escape_string($conn, $_POST['konten']);
    $oleh = $_SESSION['user'];

    // Query untuk memasukkan catatan
    $update = "INSERT INTO notes_212082 (contents_212082, admin_212082) VALUES ('$konten', '$oleh')";
    if (mysqli_query($conn, $update)) {
        echo "<div class='alert alert-success'>
            <strong>Success!</strong> Redirecting you back in 1 second.
          </div>
          <meta http-equiv='refresh' content='1; url=index.php' />";
    } else {
        echo "<div class='alert alert-warning'>
            <strong>Failed!</strong> Redirecting you back in 1 second.
          </div>
          <meta http-equiv='refresh' content='1; url=index.php' />";
    }
} else {
    echo "<div class='alert alert-danger'>
        <strong>Error!</strong> Konten tidak boleh kosong. Redirecting you back in 1 second.
      </div>
      <meta http-equiv='refresh' content='1; url=index.php' />";
}
?>

</div>
</body>
</html>
