<?php
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
   .upbar {
  height: 101px;
  width: 100%;
  background-color: #333333;
  position: fixed;
  top : 0px;
  z-index: 1;
}
.barbutton {
  transition-duration: 0.4s;
  height :101px;
  width : 200px;
  background-color: #333333; 
  color: white; 
  border: 2px solid #333333;
  
  font-size : 30px ;
}
.barbutton:hover {
  background-color: white;
  color: #333333;
}

.dropdown {
  position: relative;
  display: inline-block;
}
.dropdown:hover .dropdown-content {
  display: block;
}
.dropdown-content {
  display: none;
  position: absolute;
  min-width: 160px;
}
.dropdown-content a {
  background-color: #333333;
  color : white;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

body{
  margin: 0;
  height: 100%;
  width: 100%;
  }
  
.dropdown-content a:hover {
  transition-duration: 0.4s;
  background-color: white;
  color : #333333 ;
}
.align {
  margin: 0;
  position: absolute;
  top: 0%;
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
  left : 700px;
  -ms-transform: translateX(-50%);
  transform: translateX(-50%);
}
</style>
<body>
<img id = "bgimg2" src = "./bgimage/ModernOrange.png" style = "position : fixed; z-index : -1 ; opacity : 40% ; width : 100% ; height : 100% ; top :0px;">
</body>
<script>
  function shop(){
    location.replace("shop.php")
  }
  function mainmenu(){
    location.replace("mainmenu.php")
  }

  function custom(){
    location.replace("custom.php")
  }
</script>
</html>
<?php
if($_SESSION["aras"] == null) {
  echo'
  <div class="upbar">
  <img src="./image/icon.png" alt="My lovely Home" width="360" height="101">
  <div class="align">
    <button type="button" class="barbutton" onclick = "shop()">Kedai</button>
    <button type="button" class="barbutton" onclick = "mainmenu()">Menu</button>
  <div class = "dropdown">
      <button type="button" class="barbutton" >Akaun</button>
        <div class = "dropdown-content">
          <a href="signin.php">log masuk</a>
          <a href="register.php">daftar</a>
        </div>
    </div>
    </div>
    </div>';
}else if ($_SESSION["aras"] == "pengguna" || $_SESSION["aras"] == "admin" ){
  echo'
  <div class="upbar">
    <img src="./image/icon.png" alt="My lovely Home" width="360" height="101">
    <div class="align">
      <button type="button" class="barbutton" onclick = "shop()" >Kedai</button>
      <button type="button" class="barbutton" onclick = "mainmenu()" >Menu</button>
    <div class = "dropdown">
  <button type="button" class="barbutton" >Akaun</button>
    <div class = "dropdown-content">
      <a href="profile.php">Profil</a>
      <a href="signin.php">log keluar</a>
    </div>
  </div>
  </div>
  </div>';
  $kunci = $_SESSION["idpengguna"];
if(isset($_POST["font"])){
  $font = $_POST["font"];
  $insert = "UPDATE pengguna SET font = '$font' WHERE idpengguna = '$kunci'";
  $con ->query($insert);
}
if(isset($_POST["bg"])){
  $bg = $_POST["bg"];
  $bg = str_replace(" ","",$bg);
  $insert = "UPDATE pengguna SET latar = '$bg' WHERE idpengguna = '$kunci'";
  $con ->query($insert);
}
if(isset($_POST["opacity"])){
  $opa = $_POST["opacity"];
  $insert = "UPDATE pengguna SET keterlihatan = '$opa' WHERE idpengguna = '$kunci'";
  $con ->query($insert);
}
$getbg = "SELECT * FROM pengguna WHERE idpengguna= '$kunci'";
$result = $con -> query($getbg);
$row = $result -> fetch_assoc();
$font = $row['font'];
$gotbg = $row['latar'];
$opacity = $row['keterlihatan'];
if($gotbg != null){
  echo"
  <script>
  document.getElementById('bgimg2').src = './bgimage/' + '$gotbg' + '.png';
  </script>";
}
if($font != null){
  echo"
  <script>
  var cssStyle = document.createElement('style');
  cssStyle.type = 'text/css';
  var rules = document.createTextNode('*{font-family :' + '$font' + '}');
  cssStyle.appendChild(rules);
  document.getElementsByTagName('style')[0].appendChild(cssStyle);
  </script>
  ";
  }
  if($opacity != null){
    echo"
    <script>
    document.getElementById('bgimg2').style.opacity = '$opacity' + '%';
    </script>";
  }
}
  
?>