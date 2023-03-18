<?php
   include('koneksi.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($koneksi,"select user from tb_user where user = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['user'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:index.php");
      die();
   }
?>