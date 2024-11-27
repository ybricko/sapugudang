<?php
session_start();
include 'dbconnect.php';

if (isset($_SESSION['role_212082'])) {
    header("location:stock");
}

if (isset($_GET['pesan'])) {
    if ($_GET['pesan'] == "gagal") {
        echo "<script>alert('Username atau Password salah!');</script>";
    } else if ($_GET['pesan'] == "logout") {
        echo "<script>alert('Anda berhasil keluar dari sistem');</script>";
    } else if ($_GET['pesan'] == "belum_login") {
        echo "<script>alert('Anda harus Login');</script>";
    } else if ($_GET['pesan'] == "noaccess") {
        echo "<script>alert('Akses Ditutup');</script>";
    }
}

if (isset($_POST['btn-login'])) {
    $uname = mysqli_real_escape_string($conn, $_POST['username_212082']);
    // $upass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $upass = mysqli_real_escape_string($conn, $_POST['password_212082']);

    // Query to select user
    $login = mysqli_query($conn, "SELECT * FROM slogin_212082 WHERE username_212082='$uname' AND password_212082='$upass';");
    $cek = mysqli_num_rows($login);

    if ($cek > 0) {
        $data = mysqli_fetch_assoc($login);

        if ($data['role_212082'] == "Admin") {
            $_SESSION['user'] = $data['nickname_212082'];
            $_SESSION['user_login'] = $data['username_212082'];
            $_SESSION['id_212082'] = $data['id_212082'];
            $_SESSION['role_212082'] = "Admin";
            header("location:stock");
           
               
            } 
          
        } else {
            header("location:index.php?pesan=gagal");
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== REMIXICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/css/styles.css">

    <title>Login</title>
</head>
<body>
    <div class="login">
        <img src="assets/img/log.png" alt="login image" class="login__img">

        <form action="" method="POST" class="login__form">
            <h1 class="login__title">Login</h1>

            <div class="login__content">
                <div class="login__box">
                    <i class="ri-user-3-line login__icon"></i>
                    <div class="login__box-input">
                        <input type="text" required class="login__input" placeholder="Username" name="username_212082" autofocus>
                    </div>
                </div>

                <div class="login__box">
                    <i class="ri-lock-2-line login__icon"></i>
                    <div class="login__box-input">
                        <input type="password" required class="login__input" placeholder="Password" name="password_212082">
                        <i class="ri-eye-off-line login__eye" id="login-eye"></i>
                    </div>
                </div>
            </div>

            <button type="submit" class="login__button" name="btn-login">Login</button>
        </form>
    </div>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
</body>
</html>