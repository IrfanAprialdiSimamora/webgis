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
<h2>Ubah Data Wisata</h2>
<table class="table table-responsive table-striped">
<?php
  include("../koneksi.php"); 
  //untuk mengambil value dari paramater id=
  $no=$_GET['id_tempat'];
  //query sql untuk menampilkan data berdasarkan id
  $query="SELECT * FROM wisata WHERE id_tempat='".$no."'";
  $result=mysqli_query($koneksi,$query);
  //menampilkan data dari query database berbentuk array an ditampilkan di form
  if (mysqli_num_rows($result) > 0){
	$data = mysqli_fetch_assoc($result);
  $nama = $data['nm_tempat'];
  $lat = $data['lat_tempat'];
  $long = $data['long_tempat'];
  $name_m=$data['mrk_tempat'];
  $name_g=$data['gbr_tempat'];
  $pj = $data['pj_tempat'];
  $ktk = $data['ktk_tempat'];
  $fas = $data['fas_tempat'];
  $inf = $data['info_tempat'];
  $desa = $data['id_desa'];
}

 //syntax php untuk edit data ke database
 if (isset($_POST['edit'])) {
    //$query="UPDATE wisata SET
    $nama=$_POST['nm_tempat'];
    $lat=$_POST['lat_tempat'];
    $long=$_POST['long_tempat'];
    $marker=$_FILES['marker']['name'];
    $sumber_m=$_FILES['marker']['tmp_name'];
    $gambar=$_FILES['gambar']['name'];
    $sumber_g=$_FILES['gambar']['tmp_name'];
    $folder='./upload/';
    $pj=$_POST['pj_tempat'];
    $ktk=$_POST['ktk_tempat'];
    $fas=$_POST['fas_tempat'];
    $inf=$_POST['info_tempat'];
    $desa=$_POST['desa'];
   if($marker!=''){
      move_uploaded_file($sumber_m,$folder.$marker);
      $update=mysqli_query($koneksi, "UPDATE wisata SET 
      nm_tempat='".$nama."',
      lat_tempat='".$lat."',
      long_tempat='".$long."',
      mrk_tempat='".$marker."',
      pj_tempat='".$pj."',
      ktk_tempat='".$ktk."',
      fas_tempat='".$fas."',
      info_tempat='".$inf."',
      id_desa='".$desa."'
      WHERE id_tempat='".$no."'
      ");
   }
   elseif($gambar!=''){
    move_uploaded_file($sumber_g,$folder.$gambar);
      $update=mysqli_query($koneksi, "UPDATE wisata SET 
      nm_tempat='".$nama."',
      lat_tempat='".$lat."',
      long_tempat='".$long."',
      gbr_tempat='".$gambar."',
      pj_tempat='".$pj."',
      ktk_tempat='".$ktk."',
      fas_tempat='".$fas."',
      info_tempat='".$inf."',
      id_desa='".$desa."'
      WHERE id_tempat='".$no."'
      ");
   }
   else{
    $update=mysqli_query($koneksi, "UPDATE wisata SET 
    nm_tempat='".$nama."',
    lat_tempat='".$lat."',
    long_tempat='".$long."',
    pj_tempat='".$pj."',
    ktk_tempat='".$ktk."',
    fas_tempat='".$fas."',
    info_tempat='".$inf."',
    id_desa='".$desa."'
    WHERE id_tempat='".$no."'
    ");
   }
    //WHERE id_tempat='$no'";
    //$result=mysqli_query($koneksi,$query);
	
  if ($query) {
   echo "data berhasil disimpan";
   $query="SELECT * FROM wisata WHERE id_tempat='".$no."'";
   $result=mysqli_query($koneksi,$query);
   //menampilkan data dari query database berbentuk array an ditampilkan di form
   echo " <center> <b> <font color = 'red' size = '4'> <p> Data Berhasil disimpan </p> </center> </b> </font> <br/>
  <meta http-equiv='refresh' content='2; url=wisata.php'/> ";
  }else{
   echo "data gagal disimpan".mysql_error();
  }
 }
?>
 <!--form edit -->
 <form action="" method="POST" enctype="multipart/form-data">
  <tr>
   <td>Nama Tempat</td>
   <td><input type="text" name="nm_tempat" size="30" value="<?php echo $nama; ?>"></td>
  </tr>
  <tr>
   <td>Latitude</td>
   <td><input type="text" name="lat_tempat" size="30" value="<?php echo $lat; ?>"></td>
  </tr>
  <tr>
   <td>Longtitude</td>
   <td><input type="text" name="long_tempat" size="30" value="<?php echo $long; ?>"></td>
  </tr>
  <tr>
   <td>Marker</td>
   <td>
   <img src="upload/<?php echo $data['mrk_tempat'] ?>" width="150px" height="120px" />
   <input type="hidden" name="mrk" value="<?php echo $name_m; ?>">
   <input type="file" name="marker" size="30"> 
   </td>
  </tr>
  <tr>
   <td>Gambar</td>
   <td>
   <img src="upload/<?php echo $data['gbr_tempat'] ?>" width="150px" height="120px" />
   <input type="hidden" name="gbr" value="<?php echo $name_g; ?>">
   <input type="file" name="gambar" size="30">
   </td>
  </tr>
  <tr>
   <td>Penanggungjawab</td>
   <td><input type="text" name="pj_tempat" size="30" value="<?php echo $pj; ?>"></td>
  </tr>
  <tr>
   <td>Kontak</td>
   <td><input type="text" name="ktk_tempat" size="30" value="<?php echo $ktk; ?>"></td>
  </tr>
  <tr>
   <td>Fasilitas</td>
   <td><input type="text" name="fas_tempat" size="30" value="<?php echo $fas; ?>"></td>
  </tr>
  <tr>
   <td>Informasi</td>
   <td><input type="text" name="info_tempat" size="30" value="<?php echo $inf; ?>"></td>
  </tr>
  <tr><td>Desa</td>
    <td>
	  <select name="desa">
	  <?php
        $query="SELECT*FROM desa";
        $result=mysqli_query($koneksi,$query);
        while($data=mysqli_fetch_assoc($result)){
          echo'<option value="'.$desa.'">'.$data['desa'].'</option>';
        }
        ?>
	  </select>
    </td></tr>
  <td><input class="btn btn-primary" type="submit" name="edit" Value="Simpan" alignment="right">
      <a class="btn btn-danger" href = 'dassbord.php'> Kembali </a>
  </td>
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