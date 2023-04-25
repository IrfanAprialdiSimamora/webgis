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
    <link rel="stylesheet" type="text/css" href="admin.css?v2">
    <link rel="stylesheet" href="../fontawesome-free/css/all.min.css">
    <title>Admin</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-lght bg-warning fixed-top">
    <a class="navbar-brand " href="dassbord.php">Selamat Datang Admin | <b>WEBGIS Polman</b></a>
    <ul>
    <ul>
      
      </ul>
    </ul>
    <form action="cari.php" class="d-flex" role="search" method="GET">
        <input name="cari" class="form-control me-2" type="text" placeholder="Cari" aria-label="Search">
        <button class="btn-ligth" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
      </form>
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
    <a class="nav-link text-white" href="dassbord.php"><i class="fa-solid fa-gauge-high mr-2"></i> Beranda<hr class="bg-secondary"></a>
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
<br/>
<h3>Hasil Review Wisatawan</h3>
	<a class="btn btn-success" href="pesan.php"><i class="fa-solid fa-eye m-2"></i>Lihat Pesan Pengunjung</a><br></br>
    <div style="border: 1px dashed red; padding: 20px; width: 99%; height: 105px;">
    <pre>Ket: Untuk kolom fasilitas,internet,keadaan jalanan, dan pelayanan jika:
     Nilai kurang atau sama dengan 1 artinya kurang baik
     Nilai kurang atau sama dengan 2 dan lebih besar dari 1  artinya cukup baik
     Nilai kurang atau sama dengan 3 dan lebih besar dari 2  artinya sangat baik</pre>
    </div><br/>
  <div class="table-responsive">
	<table class="table table-striped table-bordered table-hover">
    <tr>
      <th>No</th>
      <th>Nama Tempat</th>
      <th>Jumlah Tanggapan</th>
      <th>Fasilitas</th>
      <th>Internet</th>
      <th>Keadaan Jalan</th>
      <th>Pelayanan</th>
      <th>Aksi</th>
    </tr>
	<?php 
	include "../koneksi.php";
	$query= "SELECT wisata.id_tempat,nm_tempat, COUNT(id_komen) AS jumlah,AVG(fasilitas) AS rfasilitas, AVG(internet) AS rinternet, AVG(jalanan) AS rjalanan, AVG(pelayanan) AS rpelayanan
    FROM wisata,komentar WHERE wisata.id_tempat=komentar.id_tempat GROUP BY wisata.id_tempat";
	$result=mysqli_query($koneksi,$query);
	if(mysqli_num_rows($result)>0){
	$no = 1;
	while($data = mysqli_fetch_assoc($result)){
	?>
      <tr>
          <!--untuk menampilkannya berdasarkan field yang ada pada tabel data karyawan-->
          <td align="center"><?php echo $no."."; ?></td>
          <td><?php echo $data['nm_tempat']; ?></td>
          <td><?php echo $data['jumlah']; ?></td>
          <td><?php echo number_format($data['rfasilitas'],2); ?></td>
          <td><?php echo number_format($data['rinternet'],2); ?></td>
          <td><?php echo number_format($data['rjalanan'],2); ?></td>
          <td><?php echo number_format($data['rpelayanan'],2); ?></td>
          <td align="center">
          <a class="btn btn-success btn-sx" href="hapuskomen.php?id_tempat=<?php echo $data['id_tempat']; ?>">
          <i class="fa-solid fa-check"></i>Telah Diperbaiki</a></td>
      </tr>
		<?php 
		$no++;
		} 
		}?>
	</table>
  </div>
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