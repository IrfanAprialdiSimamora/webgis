<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User</title>
    <link rel="stylesheet" href="fontawesome-free/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <style>
        /* ukuran peta */
        #mapid {
            height: 100%; /* 60px adalah ketinggian navbar */
            width: 100%;
            position: absolute;
            bottom: 0;
            z-index: -1; /* agar peta di bawah navbar */
        }
        .jumbotron{
            height: 100%;
            border-radius: 0;
        }
        body{
            background-color: #ebe7e1;
        }
    </style>
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
      <form action="caripeta.php" class="d-flex" role="search" method="GET">
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
<div id="mapid"></div>
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>

        <script>
        // set lokasi latitude dan longitude, lokasinya kota palembang 
        var mymap = L.map('mapid').setView([-3.418840,119.314690], 12);   
        //setting maps menggunakan api mapbox bukan google maps, daftar dan dapatkan token      
        L.tileLayer(
            'https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 19,
		attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
	    }).addTo(mymap);


        // buat variabel berisi fugnsi L.popup 
        var popup = L.popup();

        // buat fungsi popup saat map diklik
        function onMapClick(e) {
            popup
                .setLatLng(e.latlng)
                .setContent("koordinatnya adalah " + e.latlng
                    .toString()
                    ) //set isi konten yang ingin ditampilkan, kali ini kita akan menampilkan latitude dan longitude
                .openOn(mymap);

            document.getElementById('latlong').value = e.latlng //value pada form latitde, longitude akan berganti secara otomatis
        }
        mymap.on('click', onMapClick); //jalankan fungsi
        <?php
        include "koneksi.php";  //koneksi ke database
        $tampil = mysqli_query($koneksi, "select * from wisata"); //ambil data dari tabel lokasi
        while($hasil = mysqli_fetch_array($tampil)){ ?>
        var icon1=L.icon({
          iconUrl:'admin/upload/<?php echo $hasil['mrk_tempat'];?>',
          iconSize: [30, 45],
        });
        //melooping data menggunakan while
        //menggunakan fungsi L.marker(lat, long) untuk menampilkan latitude dan longitude
        //menggunakan fungsi str_replace() untuk menghilankan karakter yang tidak dibutuhkan
        L.marker([<?php echo str_replace(['[', ']', 'LatLng', '(', ')'], '', $hasil['lat_long']); ?>], {icon:icon1}).bindPopup(`<?php echo 
                '<center>
                <h3>'.$hasil['nm_tempat'].'</h3>
                <img src="admin/upload/'.$hasil['gbr_tempat'].'" width="280px" height="128px">
                <br>'.$hasil['alamat'].'<br>
                <strong>'.$hasil['pj_tempat'].'</strong><br>
                <a class="btn btn-info" href="tampil.php?id_tempat='.$hasil['id_tempat'].'">Detail</a>
                <a class="btn btn-warning" href="percobaan/'.$hasil['vr360'].'">View360</a>
                </center>'; ?>`).addTo(mymap);
        <?php } ?>
    
    // menambahkan marker pada lokasi pengguna
		function onLocationFound(e) {
			var radius = e.accuracy / 2;

			L.marker(e.latlng).addTo(mymap)
				.bindPopup("Kamu berada pada " + radius + " meter dari titik ini").openPopup();

			L.circle(e.latlng, radius).addTo(mymap);
		}

		// menampilkan pesan jika lokasi pengguna tidak ditemukan
		function onLocationError(e) {
			alert(e.message);
		}

		// memanggil fungsi geolocation untuk mendapatkan lokasi pengguna
		mymap.on('locationfound', onLocationFound);
		mymap.on('locationerror', onLocationError);
		mymap.locate({setView: true, maxZoom: 12});
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>