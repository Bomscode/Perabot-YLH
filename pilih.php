<?php
require('connect.php');
$idproduk = $_POST["pilih"];
if(!isset($_SERVER['POST']['redirected']) && empty($idproduk)){
    echo"
    <script>
    history.go(-1);
    </script>";
    die();
     }
$idpengguna = $_SESSION["idpengguna"];
if($idpengguna == "admin"){
    echo"<script> alert('admin tak boleh pilih');
    location.replace('shop.php'); 
    </script>";
    die;
}
$checkpilih = "SELECT * FROM pilihanpengguna WHERE idpengguna = '$idpengguna'";
$result = $con -> query($checkpilih);
$rowcount=mysqli_num_rows($result);
for($i = 0; $i < $rowcount ; $i++){
$row = $result -> fetch_assoc();
$checkproduk = $row['idproduk'];
if($checkproduk == $idproduk){
    echo"<script> alert('produk sudah dipilih');
    location.replace('shop.php'); 
    </script>";
    die;
}
}
$addpilih = "INSERT INTO pilihanpengguna  (idpengguna,idproduk)  VALUES ('$idpengguna','$idproduk')";
$con -> query($addpilih);
echo"<script> alert('produk berjaya dipilih');
location.replace('shop.php'); 
</script>"; 
?>