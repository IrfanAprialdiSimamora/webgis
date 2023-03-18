<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.rtl.min.css" integrity="sha384-WJUUqfoMmnfkBLne5uxXj+na/c7sesSJ32gI7GfCk4zO4GthUKhSEGyvQ839BC51" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="admin.css">
    <link rel="stylesheet" href="../fontawesome-free/css/all.min.css">
    <title>Admin</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-lght bg-warning fixed-top">
    <a class="navbar-brand " href="#">Selamat Datang Admin | <b>WEBGIS Polman</b></a>
    
    <div class="icon me-auto mb-2 mb-lg-0">
      <h5>
        <i class="fas fa-sign-out-alt" data-toggle="tooltip" title="Log Out"></i>
      </h5>
    </div>
</nav>
<div class="row no-gutters mt-5">
  <div class="col-md-2 bg-dark mt-2 pr-3 pt-4">
  <ul class="nav flex-column ml-3 mb-5">
  <li class="nav-item">
    <a class="nav-link text-white" href="#"><i class="fa-solid fa-gauge-high mr-2"></i> Beranda<hr class="bg-secondary"></a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="wisata.php"><i class="fa-solid fa-car mr-2"></i> Objek Wisata<hr class="bg-secondary"></a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="penginapan.php"><i class="fa-solid fa-hotel mr-2"></i> Penginapan<hr class="bg-secondary"></a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="kuliner.php"><i class="fa-solid fa-utensils"></i> Tempat Kuliner<hr class="bg-secondary"></a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="oleh.php"><i class="fa-solid fa-gift mr-2"></i> Cenderamata<hr class="bg-secondary"></a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="desa.php"><i class="fa-solid fa-location-dot mr-2"></i> Desa Wisata<hr class="bg-secondary"></a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="komen.php"><i class="fa-solid fa-comment mr-2"></i> Saran Pengunjung<hr class="bg-secondary"></a>
  </li>
</ul>
  </div>
  <div class="col-md-10 mt-2">

  <section>
<div class="conten">
<h2>Ubah Data Desa</h2>
<table class="table table-responsive table-striped">
<?php
  include("../koneksi.php"); 
  //untuk mengambil value dari paramater id=
  $no=$_GET['id_desa'];
  //query sql untuk menampilkan data berdasarkan id
  $query="SELECT * FROM desa WHERE id_desa='".$no."'";
  $result=mysqli_query($koneksi,$query);
  //menampilkan data dari query database berbentuk array an ditampilkan di form
  if (mysqli_num_rows($result) > 0){
	$data = mysqli_fetch_assoc($result);
}

 //syntax php untuk edit data ke database
 if (isset($_POST['edit'])) {
  $query="UPDATE desa SET desa='".$_POST['desa']."' WHERE id_desa='$no'";
	$result=mysqli_query($koneksi,$query);
	
  if ($query) {
   echo "data berhasil disimpan";
   
   $query="SELECT * FROM desa WHERE id_desa='".$no."'";
   $result=mysqli_query($koneksi,$query);
   //menampilkan data dari query database berbentuk array an ditampilkan di form
   echo " <center> <b> <font color = 'red' size = '4'> <p> Data Berhasil disimpan </p> </center> </b> </font> <br/>
  <meta http-equiv='refresh' content='2; url= desa.php'/> ";
  }else{
   echo "data gagal disimpan".mysql_error();
  }
 }
?>
 <!--form edit -->
 <form action="" method="POST">
  <tr>
   <td>Nama Desa</td>
   <td><input type="text" name="desa" size="30" value="<?php echo $data['desa']; ?>"></td>
  </tr>
  <td><input class="btn btn-primary" type="submit" name="edit" Value="Simpan" alignment="right">
<input class="btn btn-warning" type="reset" Value="Bersihkan" >
<a class="btn btn-danger" href = 'dassbord.php'> Kembali </a></td>
 </form>
</table>
</div>
    </section>

  </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" 
    crossorigin="anonymous"></script>
    <script type="text/javascript"src="admin.js"></script>
  </body>
</html>