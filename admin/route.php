<?php

$p=$_GET['p'];

switch ($p){
        case 'detail-mhs':require_once "detail-mhs.php";break;
        case 'detail-pegawai':require_once "detail-pegawai.php";break;
        case 'tambah-dosen.php':require_once "tambah-dosen.php";break;
        case 'tambah-pegawai.php':require_once "tambah-pegawai.php";break;
        case 'detail-dsn':require_once "detail-dsn.php";break;
        case 'hapus-mhs':require_once "hapus-mhs.php";break;
        case 'hapus-pegawai':require_once "hapus-pegawai.php";break;
        case 'hapus-dsn':require_once "hapus-dsn.php";break;
        case 'edit-mhs':require_once "edit-mhs.php";break;
        case 'edit-pegawai':require_once "edit-pegawai.php";break;
        case 'edit-dsn':require_once "edit-dsn.php";break;
        case 'dosen':require_once "dosen.php";break;
        case 'mahasiswa':require_once "mahasiswa.php";break;
        case 'pegawai':require_once "pegawai.php";break;
        case 'password':require_once "password.php";break;
        case 'tambah-mahasiswa':require_once "tambah-mahasiswa.php";break;
        default:require_once "dashboard.php";break;
}
        
?>
    
