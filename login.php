<?php
   include("koneksi.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($koneksi,$_POST['user']);
      $mypassword = mysqli_real_escape_string($koneksi,$_POST['passcode']); 
      
      $sql = "SELECT id FROM tb_user WHERE user = '$myusername' and passcode = '$mypassword'";
      $result = mysqli_query($koneksi,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row;
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         //session_register("user");
         $_SESSION['login_user'] = $myusername;
         
         header("location: admin/dassbord.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
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
            <form action="" class="inner-login" method="post">
            <h4 class="text-center title-login">SISTEM INFORMASI GEOGRAFIS POLMAN</h4>
                <div class="form-group">
                    <input type="text" class="form-control" name="user" placeholder="Username">
                </div>
                  <br>
                <div class="form-group">
                    <input type="password" class="form-control" name="passcode" placeholder="Password">
                </div>
                  <br>
                <input type="submit" class="btn btn-block btn-custom-green" value="LOGIN" />
                <br>
                <br>
                <a href="daftar.php">Anda belum punya akun?</a>
            </form>
        </div>
    </div>
</div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
   </body>
</html>