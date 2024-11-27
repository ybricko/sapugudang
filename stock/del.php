<?php
session_start();
include_once '../dbconnect.php';

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['id_212082'])) {
    header("Location: index.php?pesan=belum_login");
    exit();
}

// Periksa apakah ID diterima
if (isset($_POST['id_212082'])) {
    $id = intval($_POST['id_212082']); // Konversi ke integer untuk keamanan
    $hapus = "DELETE FROM notes_212082 WHERE id_212082 = $id";

    if (mysqli_query($conn, $hapus)) {
        // Redirect ke halaman utama dengan pesan sukses
        header("Location: index.php?pesan=success");
        exit();
    } else {
        // Tampilkan error jika query gagal
        echo "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
    }
} else {
    echo "<div class='alert alert-warning'>Error: Tidak ada data yang dikirim.</div>";
}
?>
x