<?php
require('connect.php');
$idproduk = $_POST["idproduk"];
$idpengguna = $_SESSION["idpengguna"];
if(empty($idproduk) ){
    echo "<script>
    alert('no produk selected');
    location.replace('pilihan.php');
    </script>";
    die;
}
$removepilih = "DELETE FROM pilihanpengguna WHERE idproduk = '$idproduk' AND idpengguna = '$idpengguna'";
$result = $con -> query($removepilih);
if($result){
    echo "<script>
    alert('pilihan deleted');
    location.replace('pilihan.php');
    </script>";
    die;
}
?>
