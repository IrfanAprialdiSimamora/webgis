<?php
error_reporting(E_ALL ^ E_NOTICE);
include "../koneksi.php";
// file submit.php
// menangkap data yang dikirimkan dari file tambah.php mwnggunakan method = POST
$desa = $_POST['desa'];
// perintah SQL
$query="INSERT INTO desa VALUES ('','$desa') " ;
$hasil=mysqli_query($koneksi,$query);
if ($hasil){
//header ('location:pelanggan.php');
echo " <center> <b> <font color = 'red' size = '4'> <p> Data Berhasil disimpan </p> </center> </b> </font> <br/>
<meta http-equiv='refresh' content='2; url= desa.php'/> ";
} else { echo "Data gagal disimpan
<meta http-equiv='refresh' content='2; url= tambahdesa.php'/> ";
}
?>