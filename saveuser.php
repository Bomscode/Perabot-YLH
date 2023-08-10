<?php
require ('connect.php');
if(!isset($_SERVER['POST']['redirected']) && !isset($_POST["what"])){
  echo"
  <script>
  history.go(-1);
  </script>";
  die();
   }
if($_POST["what"] == "simpan"){
      
  $idpengguna = $con -> real_escape_string($_POST['idpengguna']);
      $namapengguna = $con -> real_escape_string($_POST['namapengguna']);
      $katalaluan = $con -> real_escape_string($_POST['katalaluan']);
      $aras = $con -> real_escape_string($_POST['aras']);
      if($idpengguna == $_SESSION["idpengguna"]){
        if($_SESSION["aras"] == "admin"){
          if($aras != $_SESSION["aras"]){
             echo "<script>
             window.location = 'edituser.php';
             alert('Admin tidak boleh edit aras diri');
             </script>";
             die;
             }}}
      if($idpengguna == $_SESSION["idpengguna"]){
        $_SESSION["namapengguna"] = $namapengguna;
        $_SESSION["katalaluan"] = $katalaluan;
        $_SESSION["aras"] = $aras;
      }
      $file = $_FILES['madd']['name'];    
      $updateinfo = "UPDATE pengguna SET namapengguna = '$namapengguna' , katalaluan = '$katalaluan' , aras = '$aras'  WHERE idpengguna = '$idpengguna'";
      $con -> query($updateinfo);
if(!empty($file)){
$getimage = "SELECT * FROM pengguna WHERE idpengguna = '$idpengguna'";
$result = $con -> query($getimage);
$row = $result -> fetch_assoc();
$picture = $row['picture']; 
  if ($picture != null){
    if(file_exists($picture)){
    unlink($picture);
    }
  }

  $file = './pfpimage/' . basename($_FILES['madd']['name']);
  $file = str_replace(" ","_",$file); 
  $scanimage = "SELECT * FROM pengguna WHERE picture = '$file' AND NOT idpengguna = '$idpengguna'";
  $result1 = $con -> query($scanimage);
  if($result1 -> num_rows == 0){
    move_uploaded_file($_FILES['madd']['tmp_name'], $file);
    $file = str_replace(" ","_",$file); 
    $image = "UPDATE pengguna SET picture = '$file' WHERE idpengguna = '$idpengguna'";
    $con -> query($image);
  }
  $no = 0;
  while($result1 -> num_rows != 0 ){
    $no = $no + 1;
    $file = "./pfpimage/" . basename($_FILES['madd']['name'],".png");
    $file = str_replace(" ","_",$file);
    $file = $file . "({$no}).png";
    $image = "UPDATE pengguna SET picture = '$file' WHERE idpengguna = '$idpengguna'";
    $con -> query($image);
    $scanimage = "SELECT * FROM pengguna WHERE picture = '$file' AND NOT idpengguna = '$idpengguna'";
    $result1 = $con -> query($scanimage);
  }
  $file = str_replace(" ","_",$file);
  $updateinfo2 = "UPDATE pengguna SET picture = '$file' WHERE idpengguna = '$idpengguna'";
  $con -> query($updateinfo2);
  move_uploaded_file($_FILES['madd']['tmp_name'], $file);
  $_FILES = array();
  $_FILES = null;
  !empty($_POST);
}
if ($_SESSION["aras"] == "admin"){
echo "<script>
window.location = 'edituser.php'
alert('User updated');
</script>";
}else if($_SESSION["aras"] == "pengguna"){
    echo "<script>
window.location = 'profile.php'
alert('User updated');
</script>";
} 
}
if($_POST["what"] == "hapus"){
     $idpengguna = $_POST["idpengguna"];
     if($_SESSION["aras"] == "admin"){
     if($idpengguna == $_SESSION["idpengguna"]){
        echo "<script>
        alert('You cannot delete yourself as an admin');
window.location = 'edituser.php';
        </script>";
        die;
        }}
    $scanimage = "SELECT * FROM pengguna WHERE idpengguna = '$idpengguna'";
     $result1 = $con -> query($scanimage);
     $row = $result1 -> fetch_assoc();
     $picture = $row['picture'];
     unlink($picture);
     $delete = "DELETE FROM pengguna WHERE idpengguna = '$idpengguna'";
     $con -> query($delete);
     $delete = "DELETE FROM pilihanpengguna WHERE idpengguna = '$idpengguna'";
     $con -> query($delete);
     if ($_SESSION["aras"] == "admin"){
   echo "<script>
   window.location = 'edituser.php'
   alert('User deleted');
   </script>";
        }
        if($_SESSION["aras"] == "pengguna"){
            echo "<script>
        window.location = 'register.php'
        alert('User deleted');
        </script>";
        } 
} 

?>