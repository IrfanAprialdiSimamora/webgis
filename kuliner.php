<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.rtl.min.css" integrity="sha384-WJUUqfoMmnfkBLne5uxXj+na/c7sesSJ32gI7GfCk4zO4GthUKhSEGyvQ839BC51" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="admin/admin.css">
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
  <?php 
	if(isset($_GET['pesan'])){
		$pesan = $_GET['pesan'];
		if($pesan == "input"){
			echo "Data berhasil di input.";
		}else if($pesan == "update"){
			echo "Data berhasil di update.";
		}else if($pesan == "hapus"){
			echo "Data berhasil di hapus.";
		}
	}
	?>
  <section>
<div class="conten">
<h3>Tempat Makan</h3>
	<br/>
	<a class="btn btn-success" href="tambahwisata.php">+ Tambahkan Data</a><br></br>
	<table class="table table-striped table-responsive table-bordered">
		<tr>
			<th>No</th>
			<th>Nama Tempat Makan</th>
			<th>Latitude</th>
            <th>Longtitude</th>	
            <th>Marker</th>		
            <th>Gambar</th>
            <th>Penanggungjawab</th>		
            <th>Kontak</th>	
			      <th>Fasilitas</th>
            <th>Informasi</th>	
            <th>Desa</th>	
            <th>Jenis</th>
            <th>Aksi</th>	
		</tr>

		<?php 
		include "../koneksi.php";
		$query= "SELECT * FROM wisata,desa,jenis 
    WHERE wisata.id_desa=desa.id_desa AND wisata.id_jenis=jenis.id_jenis AND jenis.id_jenis=2";
		$result=mysqli_query($koneksi,$query);
		if(mysqli_num_rows($result)>0){
		$no = 1;
		while($data = mysqli_fetch_assoc($result)){
		?>
      <tr>
          <!--untuk menampilkannya berdasarkan field yang ada pada tabel data karyawan-->
          <td><?php echo $no; ?></td>
          <td><?php echo $data['nm_tempat']; ?></td>
          <td><?php echo $data['lat_tempat']; ?></td>
          <td><?php echo $data['long_tempat']; ?></td>
          <td><?php echo $data['mrk_tempat']; ?></td>
          <td><?php echo $data['gbr_tempat']; ?></td>
          <td><?php echo $data['pj_tempat']; ?></td>
          <td><?php echo $data['ktk_tempat'];?></td>
          <td><?php echo $data['fas_tempat']; ?></td>
          <td><?php echo $data['info_tempat']; ?></td>
          <td><?php echo $data['desa']; ?></td>
          <td><?php echo $data['jenis_wisata']; ?></td>
          <td>
		  <a class="btn btn-warning" href="editwisata.php?id_tempat=<?php echo $data['id_tempat']; ?>">Ubah</a>
		  <a class="btn btn-danger" href="hapuswisata.php?id_tempat=<?php echo $data['id_tempat']; ?>">Hapus</a>

		  </td>
      </tr>
		<?php 
		$no++;
		} 
		}?>
	</table>
</div>
</section>
  </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" 
    crossorigin="anonymous"></script>
    <script type="text/javascript"src="admin/admin.js"></script>
  </body>
</html>