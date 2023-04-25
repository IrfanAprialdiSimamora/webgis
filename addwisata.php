<?php
error_reporting(E_ALL ^ E_NOTICE);
include "../koneksi.php";
// file submit.php
// menangkap data yang dikirimkan dari file tambah.php mwnggunakan method = POST
$nama = $_POST['nm_tempat'];
$alamat= $_POST['alamat'];
$lat = $_POST['lat_long'];
//upload gambar
$folder='./upload/';
$name_m=$_FILES['mrk_tempat']['name'];
$sumber_m=$_FILES['mrk_tempat']['tmp_name'];
move_uploaded_file($sumber_m,$folder.$name_m);
$name_g=$_FILES['gbr_tempat']['name'];
$sumber_g=$_FILES['gbr_tempat']['tmp_name'];
move_uploaded_file($sumber_g,$folder.$name_g);
$pj = $_POST['pj_tempat'];
$ktk = $_POST['ktk_tempat'];
$fas = $_POST['fas_tempat'];
$inf = $_POST['info_tempat'];
$harga = $_POST['harga'];
$desa = $_POST['desa'];
$jenis = $_POST['jenis_wisata'];
$polder='../percobaan/';
$name_v=$_FILES['vr360']['name'];
$sumber_v=$_FILES['vr360']['tmp_name'];
move_uploaded_file($sumber_v,$polder.$name_v);
// perintah SQL
$query="INSERT INTO wisata VALUES 
('','$nama','$alamat','$lat','$name_m','$name_g','$pj','$ktk','$fas','$inf','$harga','$desa','$jenis','$name_v')" ;
$hasil=mysqli_query($koneksi,$query);
if ($hasil){
    echo " <center> <b> <font color = 'red' size = '4'> <p> Data Berhasil disimpan </p> </center> </b> </font> <br/>
    <meta http-equiv='refresh' content='2; url=wisata.php'/> ";
} else { echo "Data gagal disimpan
<meta http-equiv='refresh' content='2; url= tambahwisata.php'/> ";
}
?>