<?php
require('connect.php');
$idproduk = $_POST["idproduk"];
if(!isset($_SERVER['POST']['redirected']) && empty($idproduk)){
    echo"
    <script>
    history.go(-1);
    </script>";
    die();
     }
$idpengguna = $_SESSION["idpengguna"];
$removepilih = "DELETE FROM pilihanpengguna WHERE idproduk = '$idproduk' AND idpengguna = '$idpengguna'";
$result = $con -> query($removepilih);
if($result){
    echo "<script>
    alert('pilihan berjaya dipadamkan');
    location.replace('pilihan.php');
    </script>";
    die;
}
?>
