<?php
require('connect.php');
$idproduk = $_POST["pilih"];
$idpengguna = $_SESSION["idpengguna"];
if(empty($idproduk)){
    echo"<script> alert('no produk selected');
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
    echo"<script> alert('produk has already been selected');
    location.replace('shop.php'); 
    </script>";
    die;
}
}
$addpilih = "INSERT INTO pilihanpengguna  (idpengguna,idproduk)  VALUES ('$idpengguna','$idproduk')";
$con -> query($addpilih);
echo"<script> alert('produk added');
location.replace('shop.php'); 
</script>"; 
?>