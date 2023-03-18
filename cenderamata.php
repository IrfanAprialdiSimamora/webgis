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
    <a class="navbar-brand" href="#"><i class="fa-solid fa-globe"></i>WEBGIS <strong>POLMAN</strong></a>
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
            <li><a class="dropdown-item" href="#">Karama</a></li>
            <li><a class="dropdown-item" href="#">Mirring</a></li>
            <li><a class="dropdown-item" href="#">Tangnga-tangnga</a></li>
            <li><a class="dropdown-item" href="#">Lapeo</a></li>
            <li><a class="dropdown-item" href="#">Laliko</a></li>
            <li><a class="dropdown-item" href="#">Tonyaman</a></li>
            <li><a class="dropdown-item" href="#">Tamangalle</a></li>
            <li><a class="dropdown-item" href="#">Galeso</a></li>
            <li><a class="dropdown-item" href="#">Buku</a></li>
            <li><a class="dropdown-item" href="#">Nepo</a></li>
          </ul>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Cari" aria-label="Search">
        <button class="btn-ligth" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
      </form>
      <div class="icon mt-2 mb-2 mb-lg-0 m-3">
      <h5>
        <a href="suhu.php"><i class="fa-solid fa-thermometer" data-toggle="tooltip" title="Cuaca"></i></a>
        <a href="chat.php"><i class="fa-solid fa-envelope" data-toggle="tooltip" title="Masukan"></i></a>
        <a href="login.php"><i class="fas fa-sign-in-alt" data-toggle="tooltip" title="Log In"></i></a>
      </h5>
    </div>
    </div>
  </div>
</nav>
    <div class="conten">
    <h3 align="center">Toko Oleh-oleh di Kabupaten Polewali Mandar</h3>
    <?php 
    include "koneksi.php";
    $query= "SELECT * FROM wisata,desa,jenis 
    WHERE wisata.id_desa=desa.id_desa AND wisata.id_jenis=jenis.id_jenis AND jenis.id_jenis=3";
    $result=mysqli_query($koneksi,$query);
    if(mysqli_num_rows($result)>0){
    $no = 1;
    while($data = mysqli_fetch_assoc($result)){
	?>
    <div class="box-gambar">
        <img src="admin/upload/<?php echo $data['gbr_tempat'];?>"/>
        <?php echo $data['nm_tempat']."<br><br>";?>
        <a class="btn btn-info" href="admin/editwisata.php?id_tempat=<?php echo $data['id_tempat']; ?>">Detail</a>
		    <a class="btn btn-success" href="#">VR360</a>
    </div>
    <?php $no++;
		} 
		}?>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>