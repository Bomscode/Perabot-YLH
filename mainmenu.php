<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<?php
require('connect.php');
require ('upbar.php');
  ?>
<body>
  <div class = "bg"> 
  <img src = "./image/trolley.png" style = "float:left" object-fit = "contain" width = "300px" height = "300px">
  <h1 class = "textes">Kedai Perabot Terbaik di dunia</h1><br><br><br><br><br>
  <button class = "searchbutton" onclick ="location.href = 'shop.php'">Shop Terus</button><br><br>
  <p class = "textes">discount setiap minggu , marilah gunakan website ini</p>
  <img src = "./image/discount.png" style = "position : absolute; right : 50px; top : 0px;" object-fit = "contain" >
  </div>

  <?php
  if($_SESSION["aras"] == "pengguna" || $_SESSION["aras"] == "admin"){
    ?>
  <div class = "bg">
  <br><br><br>
  <h1 class = "textes">Tambah Gambar Profil</h1><br><br><br><br><br>
  <li>tukar kelihatan halaman anda</li>
  <button class = "searchbutton" style = "position : absolute ; left : 500px ; top : 130px" onclick ="location.href = 'profile.php'">Profil</button>
  <img src = "./image/mainpage2.png"  object-fit = "contain" height = "250px" style=" position : absolute ;right : 200px ; top : 50px">
  </div>
  <?php
  }else{
    ?>
    <div class = "bg">
  <br><br><br>
  <h1 class = "textes">Cepatlah Buat Akaun</h1><br><br><br><br><br>
  <li>Pilihan Pengguna ✔</li>
  <li>Profil Picture Unik ✔</li>
  <li>Senang dan cepat ✔</li>
  <button class = "searchbutton" style = "position : absolute ; left : 500px ; top : 30px" onclick ="location.href = 'register.php'">Daftar</button>
  <button class = "searchbutton" style = "position : absolute ; left : 500px ; top : 170px" onclick ="location.href = 'signin.php'">Log Masuk</button>
  <img src = "./image/mainpage2.png"  object-fit = "contain" height = "250px" style=" position : absolute ;right : 200px ; top : 50px">
  </div>';
  <?php
  }
  ?>
</body>
</html>
<style>
  .textes{
    margin-left : 50px;
    float : left ; 
    color : white ; 
  
  }

  li{
    margin-left : 50px;
    font-size : 25px;
    color : white ; 
  
  }
  .bg{
    width : 100%;
    height : 300px;
    margin-top : 300px;
    position : relative ;
    background-color : #333333 ;
  }
  
.searchbutton {
  transition-duration: 0.4s;
  height :100px;
  width : auto ;
  background-color: #333333; 
  color: white; 
  
  font-size : 30px ;
  text-align: center;
  margin-left : 50px;
  border: 2px solid black;
}

.searchbutton:hover {
  transition-duration: 0.4s;
  background-color: white;
  color : #333333 ;
}
 </style>