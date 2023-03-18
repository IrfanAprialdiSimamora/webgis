<?php
 include("../koneksi.php"); // untuk memanggil file koneksi.php
$no=$_GET['id_tempat'];
//query untuk delete data
$query="DELETE FROM wisata WHERE id_tempat='".$no."'";
$hasil=mysqli_query($koneksi,$query);
//setelah data dihapus redirect ke halaman index.php
header("Location:wisata.php");
?>