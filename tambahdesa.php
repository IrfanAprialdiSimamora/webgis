<?php
session_start();
include("session.php");
?>
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
    <style>
    .jumbotron{
            width: 98%;
            margin: 0 auto;
            padding: 20px;
            background-color: #f2f2f2;
            border-radius: 5px;
            font-family: Arial, sans-serif;
            border-radius: 0;
        }
        </style>
    <title>Admin</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-lght bg-warning fixed-top">
    <a class="navbar-brand " href="#">Selamat Datang Admin | <b>WEBGIS Polman</b></a>
    
    <div class="icon me-auto mb-2 mb-lg-0">
      <h5>
      <a href="../logout.php"><i class="fas fa-sign-out-alt" data-toggle="tooltip" title="Log Out"></i></a>
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
<div class="jumbotron">
	<form method = 'POST' action = 'addesa.php'>
<h3>Form Tambah Desa</h3>
<div class="modal-body">
     <div class="form-group">
          <label class="control-label" for="desa">Nama Desa</label>
          <input type="text" name="desa" class="form-control"/><br/>
      </div>
      <div class="form-group">
          <label class="control-label" for="linkvid">ID Video Youtube</label>
          <input type="text" name="linkvid" class="form-control"/><br/>
      </div>
      <div class="form-group">
          <label class="control-label" for="deskripsi">Deskripsi Desa</label>
          <textarea type="text" name="deskripsi" row="7" cols="40" class="form-control"></textarea><br/>
      </div>
</div>
<div class="modal-footer">
<input class="btn btn-warning m-2" type="reset" Value="Bersihkan" >
<a class="btn btn-success" href = 'desa.php'> Kembali </a></td>
</div>
			</form>
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