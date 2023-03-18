<?php
 include("../koneksi.php"); // untuk memanggil file koneksi.php
$no=$_GET['id_desa'];
//query untuk delete data
$query="DELETE FROM desa WHERE id_desa='".$no."'";
$hasil=mysqli_query($koneksi,$query);
//setelah data dihapus redirect ke halaman index.php
header("Location:desa.php");
?>