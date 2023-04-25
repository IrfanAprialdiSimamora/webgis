<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User</title>
    <link rel="stylesheet" href="fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="style.css?v2" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  
</head>
  <body>
  <nav class="navbar navbar-expand-lg bg-warning fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><i class="fa-solid fa-globe"></i>WEBGIS <strong>POLMAN</strong></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Beranda</a>
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
        <a href="suhu.php"><i class="fa-solid fa-thermometer mr-2" data-toggle="tooltip" title="Cuaca"></i>Cuaca</a>
      </li>
      <li class="nav-item ">
        <a href="chat.php"><i class="fa-solid fa-envelope mr-2" data-toggle="tooltip" title="Masukan"></i>Masukan</a>
      </li>
      <li class="nav-item ">
        <a href="login.php"><i class="fas fa-sign-in-alt mr-2" data-toggle="tooltip" title="Log In"></i>Login</a>
      </li>
      </h5>
    </div>
    </ul>
    </ul>
    </div>
  </div>
</nav>
    <div class="conten">
    <h3 align="center">Objek Wisata di Kabupaten Polewali Mandar</h3><hr>
    <?php 
    include "koneksi.php";
    $query= "SELECT * FROM wisata,desa,jenis 
    WHERE wisata.id_desa=desa.id_desa AND wisata.id_jenis=jenis.id_jenis AND jenis.id_jenis=1 ORDER BY id_tempat DESC";
    $result=mysqli_query($koneksi,$query);
    if(mysqli_num_rows($result)>0){
    $no = 1;
    while($data = mysqli_fetch_assoc($result)){
	?>
    <div class="box-gambar">
        <img src="admin/upload/<?php echo $data['gbr_tempat'];?>"/>
        <b><?php echo $data['nm_tempat']."";?></b><br/>
        <?php echo $data['alamat']."<br><br>";?>
        <a class="btn btn-success" href="percobaan/<?php echo $data['vr360'];?>">View360</a>
        <a class="btn btn-info" href="tampil.php?id_tempat=<?php echo $data['id_tempat']; ?>">Detail</a>
    </div>
    <?php $no++;
		} 
		}?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>