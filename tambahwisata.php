<?php
session_start();
include("session.php");
?>
<?php
 include("../koneksi.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
        body{
            background-color: #ebe7e1;
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
<div class="jumbotron">
	<form method = 'POST' action = 'addwisata.php' enctype="multipart/form-data">
<h3>Form Tambah Data</h3>
<hr>
<div class="modal-body">
  <div class="form-group">
    <label class="control-label" for="exampleFormControlInput1"><b>Nama Tempat</b></label>
    <input type="text" name="nm_tempat" class="form-control border border-info" required/><br/>
  </div>
  <div class="form-group">
    <label class="control-label" for="desa"><b>Desa</b></label>
	  <select name="desa" class="form-control border border-info" required>
    <option value="">- Pilih -</option>
	  <?php
        $query="SELECT*FROM desa";
        $result=mysqli_query($koneksi,$query);
        while($data=mysqli_fetch_assoc($result)){
          echo'<option value="'.$data['id_desa'].'">'.$data['desa'].'</option>';
        }
        ?>
	  </select><br/>
      </div>
      <div class="form-group">
    <label class="control-label" for="jenis_wisata"><b>Jenis Wisata</b></label>
	  <select name="jenis_wisata" class="form-control border border-info" required>
    <option value="">- Pilih -</option>
	  <?php
        $query="SELECT*FROM jenis";
        $result=mysqli_query($koneksi,$query);
        while($data=mysqli_fetch_assoc($result)){
          echo'<option value="'.$data['id_jenis'].'">'.$data['jenis_wisata'].'</option>';
        }
        ?>
	  </select><br/>
      </div>
      <div class="form-group">
          <label class="control-label" for="alamat"><b>Alamat</b></label>
          <input type="text" name="alamat" class="form-control border border-info" required/><br/>
      </div>
      <div class="form-group">
          <label class="control-label" for="lat_long"><b>Latitude, Longitude</b></label>
          <input type="text" name="lat_long" class="form-control border border-info" required/><br/>
      </div>
      <div class="form-group">
          <label class="control-label" for="mrk_tempat"><b>Marker</b></label>
          <input type="file" name="mrk_tempat" class="form-control border border-info"required/><br/>
      </div>
      <div class="form-group">
          <label class="control-label" for="gbr_tempat"><b>Gambar</b></label>
          <input type="file" name="gbr_tempat" class="form-control border border-info"><br/>
      </div>
      <div class="form-group">
          <label class="control-label" for="pj_tempat"><b>Penanggungjawab</b></label>
          <input type="text" name="pj_tempat" class="form-control border border-info"/><br/>
      </div>
      <div class="form-group">
          <label class="control-label" for="ktk_tempat"><b>Kontak</b></label>
          <input type="text" name="ktk_tempat" class="form-control border border-info"/><br/>
      </div>
      <div class="form-group">
          <label class="control-label" for="fas_tempat"><b>Fasilitas</b></label>
          <textarea type="text" name="fas_tempat" row="7" cols="40" class="form-control border border-info"></textarea><br/>
      </div>
    <div class="form-group">
          <label class="control-label" for="info_tempat"><b>Informasi</b></label>
          <textarea type="text" name="info_tempat" row="7" cols="40" class="form-control border border-info"></textarea><br/>
    </div>
    <div class="form-group">
          <label class="control-label" for="harga"><b>Harga</b></label>
          <textarea type="text" name="harga" row="7" cols="40" class="form-control border border-info"></textarea><br/>
    </div>
    <div class="form-group">
          <label class="control-label" for="vr360"><b>View360</b></label>
          <input type="file" name="vr360" class="form-control border border-info"><br/>
      </div>
    </div>
    <div class="modal-footer">
    <input class="btn btn-danger mr-10" type="reset" Value="Bersihkan">
    <input class="btn btn-success" type="submit" Value="Simpan">
      </div>
			</form>
</div>
  </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" 
    crossorigin="anonymous"></script>
    <script type="text/javascript"src="admin.js"></script>
  </body>
</html>
