<?php
require ('connect.php');
$name = $con -> real_escape_string($_POST['name']);
if(!isset($_SERVER['POST']['redirected']) && empty($name)){
    echo"
    <script>
    history.go(-1);
    </script>";
    die();
     }
$password = $con -> real_escape_string($_POST['password']);
$signe = "SELECT * FROM pengguna WHERE idpengguna = '$name' AND katalaluan = '$password'";
$result = $con -> query($signe);
$row = $result -> fetch_assoc();
if ($result -> num_rows == 0){
    echo "<script>
     window.location = 'signin.php'
     alert('Nama atau katalaluan salah')
     </script>";
     die;
}else{
    echo "<script>
     window.location = 'mainmenu.php'
     </script>";
    $_SESSION["idpengguna"] = $row['idpengguna'];
    $_SESSION["namapengguna"] = $row['namapengguna'];
    $_SESSION["katalaluan"] = $row['katalaluan'];
    $_SESSION["aras"] = $row['aras'];
}