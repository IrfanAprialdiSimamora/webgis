<?php
 include("../koneksi.php"); // untuk memanggil file koneksi.php
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
	<form method = 'POST' action = 'addwisata.php' enctype="multipart/form-data">
<h3>Form Tambah Data</h3>
<table class="table table-responsive table-striped">
    <tr><td>Nama Tempat</td> <td><input type="text" name="nm_tempat" size="30" required/></td></tr>
    <tr><td>Desa</td>
    <td>
	  <select name="desa">
	  <?php
        $query="SELECT*FROM desa";
        $result=mysqli_query($koneksi,$query);
        while($data=mysqli_fetch_assoc($result)){
          echo'<option value="'.$data['id_desa'].'">'.$data['desa'].'</option>';
        }
        ?>
	  </select>
    </td></tr>
    <tr><td>Jenis Wisata</td>
    <td>
	  <select name="jenis_wisata">
	  <?php
        $query="SELECT*FROM jenis";
        $result=mysqli_query($koneksi,$query);
        while($data=mysqli_fetch_assoc($result)){
          echo'<option value="'.$data['id_jenis'].'">'.$data['jenis_wisata'].'</option>';
        }
        ?>
	  </select>
    </td></tr>
    <tr><td>Latitude</td> <td><input type="text" name="lat_tempat" size="30" required/></td></tr>
    <tr><td>Longtitude</td> <td><input type="text" name="long_tempat" size="30" required/></td></tr>
    <tr><td>Marker</td> <td><input type="file" name="mrk_tempat" size="30" required/></td></tr>
    <tr><td>Gambar</td> <td><input type="file" name="gbr_tempat" size="30" required/></td></tr>
    <tr><td>Penanggungjawab</td> <td><input type="text" name="pj_tempat" size="30" required/></td></tr>
    <tr><td>Kontak</td> <td><input type="text" name="ktk_tempat" size="30" required/></td></tr>
    <tr><td>Fasilitas</td> <td><textarea type="text" name="fas_tempat" row="5" cols="40" ></textarea></td></tr>
    <tr><td>Informasi</td> <td><textarea type="text" name="info_tempat" row="5" cols="40"></textarea></td></tr>
    <td><input class="btn btn-primary" type="submit" Value="Simpan" alignment="right">
    <input class="btn btn-warning" type="reset" Value="Bersihkan" >
    <a class="btn btn-danger" href = 'dassbord.php'> Kembali </a></td>
</table>
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
