<?php
require ('connect.php');
if($_POST["what"] == "save"){
  $idproduk = $con -> real_escape_string($_POST['idprodukval']);
      if($idproduk == null){
        echo "<script>
        window.location = 'editproduk.php'
        alert('no produk selected');
        </script>";
        die;
      }
  
      
      $namaproduk = $con -> real_escape_string($_POST['namaproduk']);
      $namaproduk = htmlspecialchars($namaproduk, ENT_QUOTES);
      $jenama = $con -> real_escape_string($_POST['jenama']);
      $jenama = htmlspecialchars($jenama);
      $detail = $con -> real_escape_string($_POST['detail']);
      $detail = htmlspecialchars($detail, ENT_QUOTES);
      $harga = $con -> real_escape_string($_POST['harga']);
      $picture = $_POST['produkpic'];
      $file = $_FILES['madd']['name'];
      if(empty($namaproduk) || empty($jenama) || empty($detail) || empty($harga)){
        echo "<script>
      alert('input incomplete');
      window.location = 'editproduk.php'
      </script>";
      die;
      }
      if(empty($picture) && empty($file)){
        echo "<script>
      alert('input incomplete');
      window.location = 'editproduk.php'
      </script>";
      die;
      }
      if(preg_match("/[a-z]/i", $harga)){
        echo "<script>
        alert('invalid input');
        window.location = 'editproduk.php'
        </script>";
        die;
    }
      $updateinfo = "UPDATE produk SET gambar = '$picture' , namaproduk = '$namaproduk' , jenama = '$jenama' , detail = '$detail' , harga = '$harga' WHERE idproduk = '$idproduk'";
      $con -> query($updateinfo);
      
if($file != null && !empty($file)){
$getimage = "SELECT * FROM produk WHERE idproduk = '$idproduk'";
$result = $con -> query($getimage);
$row = $result -> fetch_assoc();
$picture = $row['gambar']; 
  if ($picture != null){
    if(file_exists($picture)){
    unlink($picture);
    }
  }

  $file = './image/' . basename($_FILES['madd']['name']);
  $file = str_replace(" ","_",$file); 
  $scanimage = "SELECT * FROM produk WHERE gambar = '$file' AND NOT idproduk = '$idproduk'";
  $result1 = $con -> query($scanimage);
  if($result1 -> num_rows == 0){
    move_uploaded_file($_FILES['madd']['tmp_name'], $file);
    $file = str_replace(" ","_",$file); 
    $image = "UPDATE produk SET gambar = '$file' WHERE idproduk = '$idproduk'";
    $con -> query($image);
  }
  $no = 0;
  while($result1 -> num_rows != 0 ){
    $no = $no + 1;
    $file = "./image/" . basename($_FILES['madd']['name'],".png");
    $file = str_replace(" ","_",$file);
    $file = $file . "({$no}).png";
    $image = "UPDATE produk SET gambar = '$file' WHERE idproduk = '$idproduk'";
    $con -> query($image);
    $scanimage = "SELECT * FROM produk WHERE gambar = '$file' AND NOT idproduk = '$idproduk'";
    $result1 = $con -> query($scanimage);
  }
  $file = str_replace(" ","_",$file);
  move_uploaded_file($_FILES['madd']['tmp_name'], $file);
  $_FILES = array();
  $_FILES = null;
  !empty($_POST);
}
echo "<script>
window.location = 'editproduk.php'
alert('produk saved successfully');
</script>";
}
if($_POST["what"] == "delete"){
     $idproduk = $_POST["idprodukval"];
     $jenama = $con -> real_escape_string($_POST["jenama"]);
     $jenama = htmlspecialchars($jenama);
     $scanimage = "SELECT * FROM produk WHERE idproduk = '$idproduk'";
     $result1 = $con -> query($scanimage);
     $row = $result1 -> fetch_assoc();
     $picture = $row['gambar'];
     unlink($picture);
     $delete = "DELETE FROM produk where idproduk = '$idproduk'";
     $con -> query($delete);
     $deletepilihan = "DELETE FROM pilihanpengguna where idproduk = '$idproduk'";
       $con -> query($deletepilihan);
     $checkjenama = "SELECT * FROM produk where jenama = '$jenama'";
     $result = $con -> query($checkjenama);
     if($result -> num_rows == 0 && $jenama != "none"){
       $deletejenama = "DELETE FROM jenama where nama = '$jenama'";
       $con -> query($deletejenama);
     }
   echo "<script>
window.location = 'editproduk.php'
alert('produk deleted');
</script>"; 
}
if($_POST["what"] == "addproduk"){
  $namaproduk = $con -> real_escape_string($_POST['namaproduk']);
  $namaproduk = htmlentities($namaproduk, ENT_QUOTES);
  $jenama = $con -> real_escape_string($_POST['jenama']);
  $jenama = htmlspecialchars($jenama, ENT_QUOTES);
  $detail = $con -> real_escape_string($_POST['detail']);
  $detail = htmlentities($detail, ENT_QUOTES);
  $harga = $con -> real_escape_string($_POST['harga']);
  $picture  = $_FILES['madd']['name'];
   if(empty($namaproduk) || empty($jenama) || empty($detail) || empty($harga) || empty($picture)){
    echo "<script>
  alert('input incomplete');
  history.go(-1);
  </script>";
  die;
  }

  if(preg_match("/[a-z]/i", $harga)){
    echo "<script>
history.go(-1);
    alert('invalid input');
    </script>";
    die;
}
    $file = './image/' . basename($_FILES['madd']['name']);
    $file = str_replace(" ","_",$file);
    $scanimage = "SELECT * FROM produk WHERE gambar = '$file'";
    $result1 = $con -> query($scanimage);
    $no = 0;
    while($result1 -> num_rows > 0){
    $no = $no + 1;
    $file = "./image/" . basename($_FILES['madd']['name'],".png");
    $file = str_replace(" ","_",$file);
    $file = $file . "({$no}).png";
    $scanimage = "SELECT * FROM produk WHERE gambar = '$file'";
    $result1 = $con -> query($scanimage);
    }
    move_uploaded_file($_FILES['madd']['tmp_name'], $file);
  
    $updateinfo = "INSERT INTO produk (namaproduk,jenama,detail,harga,gambar)  VALUES ('$namaproduk','$jenama','$detail','$harga','$file')";
    $con -> query($updateinfo);
    $checkjenama = "SELECT * FROM jenama WHERE nama = '$jenama'";
    $checkjenamaresult = $con -> query($checkjenama);
    if($checkjenamaresult -> num_rows == 0){
    $updateinfo = "INSERT INTO jenama (nama)  VALUES ('$jenama')";
    $con -> query($updateinfo);
    }
    $_FILES = array();
    $_FILES = null;
    !empty($_POST);
     echo "<script>
    window.location = 'editproduk.php'
    alert('produk added');
    </script>";  
  }  
if($_POST["what"] == "discard"){
  echo "<script>
  window.location = 'editproduk.php'
  </script>";
}
?>