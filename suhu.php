<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Informasi Cuaca dan Suhu Kabupaten Polman</title>
    <link rel="stylesheet" href="fontawesome-free/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="style.css?v2">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"><style>
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
<center>
<div class="center">
    <h1>Cuaca Terkini Di Polewali Mandar</h1>
   <!-- weather widget start -->
   <div id="m-booked-custom-widget-66108"> 
   <div class="weather-customize" style="width:346px;">
   <div class="booked-weather-custom-160 color-009f5d" style="width:346px;" id="width5">
   <div class="booked-weather-custom-160-date"><?php echo date('l, d-m-Y');?> </div> 
   <div class="booked-weather-custom-160-main"> 
    <a target="_blank" href="https://hotelmix.id/weather/polewali-w646586" class="booked-weather-custom-160-city"> Cuaca di Polewali Mandar</a>
   <div class="booked-weather-custom-160-degree booked-weather-custom-C wmd18">
    <span><span class="plus">+</span>30</span>
   </div> <div class="booked-weather-custom-details"> 
    <p><span>Tinggi: <strong><span class="plus">+</span>30<sup>°</sup></strong></span>
    <span> Rendah: <strong><span class="plus">+</span>24<sup>°</sup></strong></span></p> 
    <p>Kelembapan: <strong>68%</strong></p> <p>Angin: <strong>SSW - 8 KPH</strong></p> 
    </div> 
    </div> 
    </div> 
    </div> 
    </div>
    <script type="text/javascript"> 
    var css_file=document.createElement("link");
    var widgetUrl = location.href; css_file.setAttribute("rel","stylesheet");
    css_file.setAttribute("type","text/css");
    css_file.setAttribute("href",'https://s.bookcdn.com/css/weather.css?v=0.0.1');
    document.getElementsByTagName("head")[0].appendChild(css_file);
    function setWidgetData_66108(data) { 
        if(typeof(data) != 'undefined' && data.results.length > 0) { 
        for(var i = 0; i < data.results.length; ++i) { 
            var objMainBlock = document.getElementById('m-booked-custom-widget-66108'); 
            if(objMainBlock !== null) { 
                var copyBlock = document.getElementById('m-bookew-weather-copy-'+data.results[i].widget_type);
                 objMainBlock.innerHTML = data.results[i].html_code; if(copyBlock !== null) objMainBlock.appendChild(copyBlock); 
                 } 
                 } 
                 } 
                 else { 
                    alert('data=undefined||data.results is empty'); 
                    } 
                    } 
                    var widgetSrc = "https://widgets.booked.net/weather/info?action=get_weather_info;ver=7;cityID=w646586;type=2;scode=37822;ltid=3457;domid=1168;anc_id=19207;countday=undefined;cmetric=1;wlangID=27;color=009f5d;wwidth=346;header_color=ffffff;text_color=333333;link_color=08488D;border_form=1;footer_color=ffffff;footer_text_color=333333;transparent=0;v=0.0.1";
                    widgetSrc += ';ref=' + widgetUrl;widgetSrc += ';rand_id=66108';
                    var weatherBookedScript = document.createElement("script"); 
                    weatherBookedScript.setAttribute("type", "text/javascript"); 
                    weatherBookedScript.src = widgetSrc; document.body.appendChild(weatherBookedScript) </script>
                    <!-- weather widget end -->
                    </div>
                  </center>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>