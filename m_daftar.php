<?php
error_reporting(E_ALL ^ E_NOTICE);
include "koneksi.php";
if(isset($_POST['submit'])){
    $nama = $_POST['namalengkap'];
    $user = $_POST['user'];
    $pass = $_POST['passcode'];
    $status = $_POST['level'];

    $cek_user=mysqli_query($koneksi,"SELECT * FROM tb_user WHERE user='$user'");
    $cek_login=mysqli_num_rows($cek_user);

    if($cek_login>0){
        echo "<script>
            alert('Username telah terdaftar');
            window.location='daftar.php';
        </script>";
    }
    else{
        $query="INSERT INTO tb_user VALUES 
        ('','$nama','$user','$pass','$status') " ;
        $hasil=mysqli_query($koneksi,$query);
        if ($hasil){   
        //header ('location:pelanggan.php');
        echo " <center> <b> <font color = 'red' size = '4'> <p> Data Berhasil disimpan </p> </center> </b> </font> <br/>
        <meta http-equiv='refresh' content='2; url= login.php'/> ";
        } else { echo "Data gagal disimpan
        <meta http-equiv='refresh' content='2; url= daftar.php'/> ";
        }
            }
        }
?>