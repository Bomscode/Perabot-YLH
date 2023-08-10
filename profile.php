<?php
require('connect.php');
require('upbar.php');
if($_SESSION["aras"] == null){
  echo"
      <script>
      history.go(-1);
      </script>";
}
?>
  <!DOCTYPE html>
  <html lang="en">
  <style>
table {
  position : absolute;
  left : 2%;
  border-collapse: collapse;
  width: 600px;
  top : 75%;
  border : 5px solid black ;
}

select {
  background-color: black;
  font : white;
  background-position: center right;
  background-repeat: no-repeat;
  border: 1px solid #AAA;
  border-radius: 2px;
  color: white;
  font-size: 25px;
  border : 2px solid black;
  max-height: 50px;
}

.buttons{
  margin : 5px;
  color : white;
  font-size : 20px ;
  background-color : #333333;
}

th, td {
  border : 2px solid black ;
  text-align: left;
  padding: 8px;
}

th{
  background-color : white;
}
td {
  background-color: #333333;
  color: white;
}
img{
  object-fit : fill;
}
.circle {
  left : 10%;
  height: 300px;
  width: 300px;
  border : 2px solid #333333;
  background-color: transparent;
  border-radius: 50%;
  top : 20%;
  position : fixed ;
}

img[name="ha"] {
  height: 300px;
  width: 300px;
  border : 2px solid #333333;
  border-radius: 50%;
  left : 10%;
  top : 20%;
  position : fixed ;
}


.invis{
        display : none;
}
.vertical_center {
  margin: 0;
  background-color : #838282 ;
  position: absolute;
  height :100px;
  width : 100px;
  top: 35%;
  border-radius: 50%;
  -ms-transform: translateY(-0%);
  transform: translateY(-0%);
  -ms-transform: translateX(98%);
  transform: translateX(98%);
  display: none;
}
input[type='file'] {
  opacity: 0;
}

.circle:hover .vertical_center{
  display : block;
}

.custom{

  font-size : 30px;
  color : white;
  text-align : center;
  position : absolute;
  background-color : #333333;
  border : 5px solid black;
  width : 50%;
  height : 75%;
  top : 20%;
  right : 1%;
}
</style>
<form class = "custom" method = "POST" action = "profile.php">kelihatan
    <div class = "filterbutton">
    <div class = "buttons">Fon</div>
      <select id = "font" oninput = "tempor2(this.value)" class = "select" name="font">
        <option>Ariel</option>
        <option>Times New Roman</option>
         <option>Fantasy</option>
         <option>Verdana</option>
         <option>Tahoma</option>
         <option>Brush Script MT</option>
         <option>Garamond</option>
         <option>Georgia</option>
         <option>Courier New</option>
      </select>
    </div>
    <div id = "tempfont" style = "margin-bottom : 5px;">Sample</div>
    <div class = "buttons">Latar</div>
    <input name = "opacity" type = "range" id = "opa" oninput = "changeopa(this.value)">
      <select id = "bgimg" oninput = "tempor(this.value)" style = "width : 300px" class = "select" name="bg">
        <option>ModernOrange</option>
        <option>WoodenHouse</option>
        <option>SnowyDay</option>
        <option>ModernRelax</option>
        <option>Clock</option>
        <option>GrayMap</option>
        <option>BrownComplex</option>
        <option>CozyRoom</option>
        <option>ModernWhite</option>
        <option>PurpleBackground</option>
        <option>ModernGray</option>
        <option>Restaurant</option>
      </select>
      <img id = "tempbg" src = "./bgimage/" style = "margin-top : 5%; height : 200px ; width : 300px ; border : 1px solid black; object-fit : fill;">
    </div>
    <button type = submit class = "buttons">save</button>
    </form>
 <?php
$kunci = $_SESSION["idpengguna"];
$getimage = "SELECT * FROM pengguna WHERE idpengguna = '$kunci'";
$result = $con -> query($getimage);
$row = $result -> fetch_assoc();
$picture = $row['picture']; 
$font = $row['font'];
$bg = $row['latar'];
$opa = $row['keterlihatan'];
$idpengguna = htmlentities($row['idpengguna']);
$namapengguna = htmlentities($row['namapengguna']);
$katalaluan = htmlentities($row['katalaluan']);
$aras = $row['aras'];
$picname = "ha";
if($font != null){
  echo"<script>
  document.getElementById('tempfont').style.fontFamily = '$font';
  document.getElementById('font').value = '$font';
  </script>";
}
if($bg != null){
  echo"<script>
  document.getElementById('tempbg').src = './bgimage/' + '$bg' + '.png';
  document.getElementById('bgimg').value = '$bg';
  </script>";
}else{
  echo"
  <script>
  document.getElementById('tempbg').src = './bgimage/ModernOrange.png';
  </script>";
}
if($opa != null){
  echo"<script>
  document.getElementById('opa').value = '$opa';
  document.getElementById('tempbg').style.opacity = '$opa' + '%';
  </script>";
}
if($picture != null){
  echo "<img src = $picture name = $picname alt = $picture>";
  };
 echo "
 <table id = 'table'>
 <tr>
   <td>E-mel</td>
   <th>$idpengguna</th>
   </tr>
   <tr>
   <td>Nama</td>
   <th>$namapengguna</th>
   </tr>
   <tr>
   <td>Katalaluan</td>
   <th>$katalaluan</th>
 </tr>
 <tr>
   <td>Aras</td>
   <th>$aras</th>
   </tr>
 </table>
  ";
  ?>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <form action = "editprofile.php" id = "userform" class = "invis" method = "POST">
        <input id = "idpengguna"  name = "idpengguna" type = "text">
    </form>
    <div class = "circle" >
        <div class = "vertical_center" id = "hi" >
            <img src="./image/camera.png"  height = "100px" width = "100px" onclick = "submit()">
        </div>
    </div>
  </head>
  <body>
  </body>
  </html>
  <script>
function submit() {
     document.getElementById("idpengguna").value =  document.getElementById('table').querySelector("th").innerHTML;
     document.getElementById("userform").submit();
}

function tempor(x){
  x = x.replace(" ","");
   document.getElementById("tempbg").src = "./bgimage/" + x + ".png";
}

function tempor2(x){
  document.getElementById("tempfont").style.fontFamily = x;
}

function changeopa(x){
  document.getElementById("tempbg").style.opacity = x + '%';
}
</script>