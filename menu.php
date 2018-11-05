<?php
/*
cek session: jika user belum terdaftar pada session maka akan 
dikembalikan pada form login
*/
session_start();

//jika session username ada datanya
if($_SESSION['username'] != ""){
    echo "<p>
        <a href = 'divisi.php'>Divisi</a> |
        <a href = 'jabatan.php'>Jabatan</a> |
        <a href = 'pegawai.php'>Pegawai</a> |
        <a href = 'pengguna.php'>Pengguna</a> | 
        <a href = 'logout.php'>Log out</a>  
        </p>";
}else{
    die("Akan belum login. <a href='login.php'>silahkan klik disini</a>");
}
?>