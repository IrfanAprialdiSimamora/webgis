<?php
session_start();
include("session.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User</title>
    <link rel="stylesheet" href="fontawesome-free/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
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
</head>
  <body>
  <nav class="navbar navbar-expand-lg bg-warning fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="beranda.php"><i class="fa-solid fa-globe"></i>WEBGIS <strong>POLMAN</strong></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="beranda.php">Beranda</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link active" href="destinasi.php">Destinasi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="hotel.php">Penginapan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="restoran.php">Rumah Makan</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link active" href="cenderamata.php">Cenderamata</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Desa Wisata
          </a>
          <ul class="dropdown-menu">
          <?php 
            include "koneksi.php";
            $query= "SELECT * FROM desa";
            $result=mysqli_query($koneksi,$query);
            if(mysqli_num_rows($result)>0){
            $no = 1;
            while($data = mysqli_fetch_assoc($result)){
            echo "<a class='dropdown-item' href='desawisata.php?id_desa=" . $data['id_desa'] . "'>" . $data['desa'] . "</a>";
            $no++;
                } 
                }?>
          </ul>
      </ul>
      <form action="cari.php" class="d-flex" role="search" method="GET">
        <input name="cari" class="form-control me-2" type="text" placeholder="Cari" aria-label="Search">
        <button class="btn-ligth" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
      </form>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Menu Lainnya</a>
      <ul class="dropdown-menu">
      <div class="icon mt-2 mb-2 mb-lg-0 m-3">
      <h5>
      <li class="nav-item ">
        <a href="suhu.php"><i class="fa-solid fa-thermometer mr-3" data-toggle="tooltip" title="Cuaca"></i>Cuaca</a>
      </li>
      <li class="nav-item ">
        <a href="chat.php"><i class="fa-solid fa-envelope mr-3" data-toggle="tooltip" title="Masukan"></i>Masukan</a>
      </li>
      <li class="nav-item ">
        <a href="ubahprofil.php"><i class="fa-solid fa-user mr-3" data-toggle="tooltip" title="Ubah Profil"></i>Ubah Profil</a>
      </li>
      <li class="nav-item ">
        <a href="logout.php"><i class="fas fa-sign-out-alt mr-3" data-toggle="tooltip" title="Log Out"></i>Login</a>
      </li>
      </h5>
    </div>
    </ul>
    </ul>
    </div>
  </div>
</nav>
<div class="conten">
<div class="jumbotron">
	<form method = 'POST' action = 'addchat.php' enctype="multipart/form-data">
<h3 font="Arial" align="center">Berikan Pendapat Anda</h3>
<div class="modal-body">
      <div class="form-group">
    <label class="control-label" for="nm_tempat">Tempat yang Ingin Dikomentari</label>
	  <select to name="nm_tempat" class="form-control" required>
      <option value="">- Pilih -</option>
	  <?php
        $query="SELECT*FROM wisata";
        $result=mysqli_query($koneksi,$query);
        while($data=mysqli_fetch_assoc($result)){
          echo'<option value="'.$data['id_tempat'].'">'.$data['nm_tempat'].'</option>';
        }
        ?>
	  </select><br/>
      </div>
      <div class="form-group">
          <label class="control-label" for="fasilitas">Keadaan Fasilitas</label><br/>
          <label><input type="radio" name="fasilitas" value=3>Baik</label><br/>
          <label><input type="radio" name="fasilitas" value=2>Cukup</label><br/>
          <label><input type="radio" name="fasilitas" value=1>Kurang</label>
      </div>
      <br/>
      <div class="form-group">
          <label class="control-label" for="jalanan">Akses Transpostasi</label><br/>
          <label><input type="radio" name="jalanan" value=3>Baik</label><br/>
          <label><input type="radio" name="jalanan" value=2>Cukup</label><br/>
          <label><input type="radio" name="jalanan" value="1">Kurang</label>
      </div>
      <br/>
      <div class="form-group">
          <label class="control-label" for="internet">Akses Internet</label><br/>
          <label><input type="radio" name="internet" value=3>Baik</label><br/>
          <label><input type="radio" name="internet" value=2>Cukup</label><br/>
          <label><input type="radio" name="internet" value=1>Kurang</label>
      </div>
      <br/>
      <div class="form-group">
          <label class="control-label" for="pelayanan">Pelayanan</label><br/>
          <label><input type="radio" name="pelayanan" value=3>Baik</label><br/>
          <label><input type="radio" name="pelayanan" value=2>Cukup</label><br/>
          <label><input type="radio" name="pelayanan" value=1>Kurang</label>
      </div>
      <br/>

    <div class="form-group">
          <label class="control-label" for="komentar">Komentar</label>
          <textarea type="text" name="komentar" row="7" cols="40" class="form-control"></textarea><br/>
    </div>
    <div class="form-group">
          <label class="control-label" for="saran">Saran</label>
          <textarea type="text" name="saran" row="7" cols="40" class="form-control"></textarea><br/>
    </div>
    </div>
    <div class="modal-footer">
    <input class="btn btn-success m-1" type="submit" Value="Kirim">
    <input class="btn btn-danger" type="reset" Value="Bersihkan">
      </div>
	</form>
</div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>