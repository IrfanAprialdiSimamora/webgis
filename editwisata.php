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

  <section>
  <div class="jumbotron">
<h2>Ubah Data Wisata</h2>
<hr>
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
  $alamat = $data['alamat'];
  $lat = $data['lat_long'];
  $name_m=$data['mrk_tempat'];
  $name_g=$data['gbr_tempat'];
  $pj = $data['pj_tempat'];
  $ktk = $data['ktk_tempat'];
  $fas = $data['fas_tempat'];
  $inf = $data['info_tempat'];
  $harga = $data['harga'];
  $desa = $data['id_desa'];
  $name_v=$data['vr360'];
}

 //syntax php untuk edit data ke database
 if (isset($_POST['edit'])) {
    //$query="UPDATE wisata SET
    $nama=$_POST['nm_tempat'];
    $alamat = $data['alamat'];
    $lat=$_POST['lat_long'];
    $marker=$_FILES['marker']['name'];
    $sumber_m=$_FILES['marker']['tmp_name'];
    $gambar=$_FILES['gambar']['name'];
    $sumber_g=$_FILES['gambar']['tmp_name'];
    $folder='./upload/';
    $pj=$_POST['pj_tempat'];
    $ktk=$_POST['ktk_tempat'];
    $fas=$_POST['fas_tempat'];
    $inf=$_POST['info_tempat'];
    $harga = $data['harga'];
    $desa=$_POST['desa'];
    $virtual=$_FILES['virtual']['name'];
    $sumber_v=$_FILES['virtual']['tmp_name'];
   if($marker!=''){
      move_uploaded_file($sumber_m,$folder.$marker);
      $update=mysqli_query($koneksi, "UPDATE wisata SET 
      nm_tempat='".$nama."',
      alamat='".$alamat."',
      lat_long='".$lat."',
      mrk_tempat='".$marker."',
      pj_tempat='".$pj."',
      ktk_tempat='".$ktk."',
      fas_tempat='".$fas."',
      info_tempat='".$inf."',
      harga='".$harga."',
      id_desa='".$desa."'
      WHERE id_tempat='".$no."'
      ");
   }
   elseif($gambar!=''){
    move_uploaded_file($sumber_g,$folder.$gambar);
      $update=mysqli_query($koneksi, "UPDATE wisata SET 
      nm_tempat='".$nama."',
      alamat='".$alamat."',
      lat_long='".$lat."',
      gbr_tempat='".$gambar."',
      pj_tempat='".$pj."',
      ktk_tempat='".$ktk."',
      fas_tempat='".$fas."',
      info_tempat='".$inf."',
      harga='".$harga."',
      id_desa='".$desa."'
      WHERE id_tempat='".$no."'
      ");
   }
   elseif($virtual!=''){
    move_uploaded_file($sumber_v,$folder.$virtual);
      $update=mysqli_query($koneksi, "UPDATE wisata SET 
      nm_tempat='".$nama."',
      alamat='".$alamat."',
      lat_long='".$lat."',
      pj_tempat='".$pj."',
      ktk_tempat='".$ktk."',
      fas_tempat='".$fas."',
      info_tempat='".$inf."',
      harga='".$harga."',
      id_desa='".$desa."',
      vr360='".$virtual."'
      WHERE id_tempat='".$no."'
      ");
   }
   else{
    $update=mysqli_query($koneksi, "UPDATE wisata SET 
    nm_tempat='".$nama."',
    alamat='".$alamat."',
    lat_long='".$lat."',
    pj_tempat='".$pj."',
    ktk_tempat='".$ktk."',
    fas_tempat='".$fas."',
    info_tempat='".$inf."',
    harga='".$harga."',
    id_desa='".$desa."'
    WHERE id_tempat='".$no."'
    ");
   }
    //WHERE id_tempat='$no'";
    //$result=mysqli_query($koneksi,$query);
	
  if ($query) {
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
 <div class="modal-body">
 <div class="form-group">
  <label class="control-label" for="nm_tempat"><strong>Nama Tempat</label>
  <input type="text" name="nm_tempat" class="form-control border border-info" size="30" value="<?php echo $nama; ?>"><br/>
   </div>
    <div class="form-group">
      <label class="control-label" for="alamat">Alamat</label>
      <input type="text" name="alamat" class="form-control border border-info" size="30" value="<?php echo $alamat; ?>"><br/>
      </div>
   <div class="form-group">
   <label class="control-label" for="lat_tempat">Latitude, Longitude</label>
   <input type="text" name="lat_long" class="form-control border border-info" size="30" value="<?php echo $lat; ?>"><br/>
   </div>
   <div class="form-group">
   <label class="control-label" for="mrk_tempat">Marker</label>
   <img src="upload/<?php echo $data['mrk_tempat'] ?>" width="50px" height="40px" />
   <input type="hidden" name="mrk" class="form-control border border-info" value="<?php echo $name_m; ?>">
   <input type="file" name="marker"><br/><br/>
   </div>
   <div class="form-group">
   <label class="control-label" for="gbr_tempat">Gambar</label>
   <img src="upload/<?php echo $data['gbr_tempat'] ?>" width="50px" height="40px" />
   <input type="hidden" name="gbr" class="form-control border border-info" value="<?php echo $name_g; ?>">
   <input type="file" name="gambar"><br/><br/>
   </div>
   <div class="form-group">
   <label class="control-label" for="pj_tempat">Penanggungjawab</label>
   <input type="text" name="pj_tempat" class="form-control border border-info" size="30" value="<?php echo $pj; ?>"><br/>
   </div>
   <div class="form-group">
   <label class="control-label" for="ktk_tempat">Kontak</label>
   <input type="text" name="ktk_tempat" class="form-control border border-info" size="30" value="<?php echo $ktk; ?>"><br/>
   </div>
   <div class="form-group">
   <label class="control-label" for="fas_tempat">Fasilitas</label>
   <textarea type="text" name="fas_tempat" class="form-control border border-info" row="7" cols="40">
   <?php
        include("../koneksi.php"); 
        $no=$_GET['id_tempat'];
        $query="SELECT * FROM wisata WHERE id_tempat='".$no."'";
        $result=mysqli_query($koneksi,$query);
        while($data=mysqli_fetch_assoc($result)){
          echo $data['fas_tempat'];
        }
        ?>
   </textarea><br/>
   </div>
   <div class="form-group">
   <label class="control-label" for="info_tempat">Informasi</label>
   <textarea type="text" name="info_tempat" class="form-control border border-info" row="7" cols="40">
   <?php
        include("../koneksi.php"); 
        $no=$_GET['id_tempat'];
        $query="SELECT * FROM wisata WHERE id_tempat='".$no."'";
        $result=mysqli_query($koneksi,$query);
        while($data=mysqli_fetch_assoc($result)){
        echo $data['info_tempat'];
        }
        ?>
   </textarea><br/>
   </div>
   <div class="form-group">
   <label class="control-label" for="harga">Harga</label>
   <textarea type="text" name="harga" class="form-control border border-info" row="7" cols="40">
   <?php
        include("../koneksi.php"); 
        $no=$_GET['id_tempat'];
        $query="SELECT * FROM wisata WHERE id_tempat='".$no."'";
        $result=mysqli_query($koneksi,$query);
        while($data=mysqli_fetch_assoc($result)){
        echo $data['harga'];
        }
        ?>
   </textarea><br/>
   </div>
   <div class="form-group">
   <label class="control-label" for="id_desa">Desa</label>
	  <select name="desa" class="form-control border border-info">
    <option value="<?php echo $desa; ?>">- Tetap -</option>
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
   <label class="control-label" for="vr360">Virtual Reality</label>
   <input type="hidden" name="vr" class="form-control border border-info" value="<?php echo $name_v; ?>">
   <input type="file" name="virtual"><br/><br/>
   </div>
    </div>
    <div class="modal-footer">
      <input class="btn btn-success m-1" type="submit" name="edit" Value="Simpan" alignment="right">
      <a class="btn btn-danger" href = 'admin/dassbord.php'> Kembali </a>
  </div>
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