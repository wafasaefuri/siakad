<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include 'config.php';
$username = $_POST['username'];
$password = md5($_POST['password']);
$data = mysqli_query($db, "SELECT * FROM users WHERE username='$username' AND password='$password'");
if (mysqli_num_rows($data) > 0) {
    $d = mysqli_fetch_assoc($data);
    $_SESSION['isLogin'] = true;
    $_SESSION['username'] = $d['username'];
    $_SESSION['level'] = $d['level'];
    if ($d['level'] == 'admin') {
        header("Location: admin/?p=admin");
    } elseif ($d['level'] == 'mhs') {
        header("Location: mahasiswa/?p=mahasiswa");
    } elseif ($d['level'] == 'dosen') {
        header("Location: dosen/?p=dosen");
    }
} else {
    echo "Login gagal! Username atau password salah.";
}
?>