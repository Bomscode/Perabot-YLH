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
  font-family: "Lucida Console", "Courier New", monospace;
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
  font-family: "Lucida Console", "Courier New", monospace;
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
  <img src = "./image/bg.png" style = "position : fixed; z-index : -1 ; opacity : 40% ; width : 100% ; height : 100% ; top :0px;">
</body>
<script>
  function shop(){
    location.replace("shop.php")
  }
  function mainmenu(){
    location.replace("mainmenu.php")
  }
</script>
</html>
<?php
if($_SESSION["aras"] == null) {
  echo'
  <div class="upbar">
  <img src="./image/icon.png" alt="My lovely Home" width="360" height="101">
  <div class="align">
    <button type="button" class="barbutton" onclick = "shop()" >shop</button>
    <button type="button" class="barbutton" onclick = "mainmenu()" >menu</button>
  <div class = "dropdown">
      <button type="button" class="barbutton" >account</button>
        <div class = "dropdown-content">
          <a href="signin.php">sign in</a>
          <a href="register.php">register</a>
        </div>
    </div>
    </div>
    </div>';
}else if ($_SESSION["aras"] == "pengguna" || $_SESSION["aras"] == "pekerja" ){
  echo'
  <div class="upbar">
    <img src="./image/icon.png" alt="My lovely Home" width="360" height="101">
    <div class="align">
      <button type="button" class="barbutton" onclick = "shop()" >shop</button>
      <button type="button" class="barbutton" onclick = "mainmenu()" >main menu</button>
    <div class = "dropdown">
  <button type="button" class="barbutton" >account</button>
    <div class = "dropdown-content">
      <a href="profile.php">Profile</a>
      <a href="signin.php">log out</a>
    </div>
  </div>
  </div>
  </div>';
  }
?>