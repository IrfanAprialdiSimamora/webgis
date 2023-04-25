<?php
 include("koneksi.php");
?>
<!DOCTYPE html> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Login</title>

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="stile.css" rel="stylesheet">
    <link rel="stylesheet" href="fontawesome-free/css/all.min.css">

  </head>
   <body>
   <div align="center">
	<div class="col-md-4 col-md-offset-4 form-login">
   <div class="outter-form-login">
   <i class="fa-solid fa-globe"></i>
        <div class="logo-login">
        </div>
        <form method = 'POST' action = 'm_daftar.php'>
            <h4 class="text-center title-login">REGISTER AKUN WEBGIS POLMAN</h4>
     <div class="form-group">
          <label class="control-label" for="namalengkap">Nama Lengkap</label>
          <input type="text" name="namalengkap" class="form-control" required/><br/>
      </div>
      <div class="form-group">
          <label class="control-label" for="user">Alamat Email</label>
          <input type="text" name="user" class="form-control" required/><br/>
      </div>
      <div class="form-group">
          <label class="control-label" for="passcode">Password</label>
          <input type="text" name="passcode" class="form-control"required/><br/>
      </div>
      <div class="form-group">
          <label class="control-label" for="level">Apakah Anda Yakin Untuk Mendaftar?</label>
          <input type="checkbox" name="level" value="client" required>
      </div>
      <br>
         <input type="submit" class="btn btn-block btn-info" value="DAFTAR" name="submit" />
    <br>
    <br>
     <a href="login.php">Anda sudah punya akun?</a>
            </form>
        </div>
    </div>
</div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
   </body>
</html>