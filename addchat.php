<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
include("koneksi.php");
// file submit.php
// menangkap data yang dikirimkan dari file tambah.php mwnggunakan method = POST
$fasilitas = $_POST['fasilitas'];
$internet = $_POST['internet'];
$jalanan = $_POST['jalanan'];
$pelayanan = $_POST['pelayanan'];
$komentar = $_POST['komentar'];
$saran = $_POST['saran'];
$nm = $_POST['nm_tempat'];
$nama = $_SESSION['user'];

// perintah SQL
$query="INSERT INTO komentar VALUES 
('','$fasilitas','$internet','$jalanan','$pelayanan','$komentar','$saran','$nm','$nama') " ;
$hasil=mysqli_query($koneksi,$query);
if ($hasil){

    
//header ('location:pelanggan.php');
echo " <center> <b> <font color = 'red' size = '4'> <p> Saran Anda Berhasil dikirim </p> </center> </b> </font> <br/>
<meta http-equiv='refresh' content='2; url= beranda.php'/> ";
} else { echo "Data gagal disimpan
<meta http-equiv='refresh' content='2; url= chat.php'/> ";
}
?>