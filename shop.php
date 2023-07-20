
  <!DOCTYPE html>
  <html lang="en">
  <?php
  require ('print.php');
  require ('connect.php');
  require('upbar.php');
 $harga = $con -> real_escape_string($_POST["harga"] ?? null);
 $jenama = $con ->real_escape_string($_POST["jenama"] ?? null);
 $jenis = $con -> real_escape_string($_POST["jenis"] ?? null);
 $color = $con -> real_escape_string($_POST["color"] ?? null);
$array = array($jenis,$color);
$line = "SELECT * FROM produk ";
if($harga != "------------" || $jenama != "none" || $jenis != "none" || $color != "none"){
$line = $line . "WHERE";
if ($jenama != "none" && !empty($jenama)){
  $line = $line . " jenama = '$jenama'";
}

if ($harga != "------------" && !empty($harga)){
  $harga = str_replace("below RM","",$harga);
  if(substr($line,-1) != "E"){
    $line = $line . " AND";
  }
  $line = $line . " harga  <  $harga";
}

for ($i=0;$i <= 1 ; $i++){
  $var = $array[$i];
if ($var != "none" && !empty($var)){
  if(substr($line,-1) != "E"){
    $line = $line . " AND";
  }
  $line = $line . " detail LIKE '%$var%'";
}
}
}

  $forimage = "2";
   echo'<div class ="block"></div>';
   $search = $con -> real_escape_string($_POST["search"] ?? null);
   if(strpos($search,"%") !== false){
    $search = str_replace("%" , "\%",$search);
   }
    if ($search == null){
    $search1 = "SELECT * FROM produk ";
    }else{
      $search1 = "SELECT * FROM produk where namaproduk LIKE '%$search%' ";
    }
    if(!empty($harga) || !empty($jenama) || !empty($jenis) || !empty($color) || !empty($size)){
      $search1 = $line;
    };
    $result = $con -> query($search1);
    $rowcount=mysqli_num_rows($result);
    if ($result -> num_rows == 0 && $search != null){
       echo '<script>alert("no item found")</script>';
   }else{
    for($i = 1;$i <= $rowcount; $i++){
      $row = $result -> fetch_assoc();
      $idproduk = $row['idproduk'];
      $jenama = $row['jenama'];
      $namaproduk = $row['namaproduk'];
      $detail = $row['detail'];
      $harga = $row['harga'];
      $gambar = $row['gambar'];
      $harga = "RM" . $harga;
      echo "
   <table id = '$idproduk' onclick = 'selecttable(this.id)'> 
   <td colspan = $forimage ><img src = $gambar></td>
   <tr>
     <td>namaproduk</td>
     <th>$namaproduk</th>
     </tr>
     <tr>
     <td>jenama</td>
     <th>$jenama</th>
     </tr>
     <tr>
     <td>detail</td>
     <th>$detail</th>
   </tr>
   <tr>
     <td>harga</td>
     <th>$harga</th>
     </tr>
   </table>
    ";
  }
}
if($_SESSION["aras"] == "pekerja"){
  echo'
<div class="searchbar">
<button type = "button" class = "searchbutton" onclick="filter()">filter</button>
<button type = "button" class = "searchbutton" onclick = "editproduk()">edit produk</button>
<button type = "button" class = "searchbutton" onclick=" edituser()">edit user</button>
<form action = "shop.php" method="post">
<input type="text" name="search" placeholder="Search...">
</form>
</div>
';
}if($_SESSION["aras"] == "pengguna"){
  echo'
  <div class="searchbar">
  <button type = "submit" class = "searchbutton" onclick="filter()">filter</button>
<button type = "button" class = "searchbutton" onclick= "pilih()">pilih</button>
<button type = "button" class = "searchbutton" onclick= "pilihan()">pilihan</button>
  <form action = "shop.php" method="post">
  <input type="text" name="search" placeholder="Search..." >
  </form>
  </div>
  ';
}

if($_SESSION["aras"] == null){
  echo'
  <div class="searchbar">
  <button type = "submit" class = "searchbutton" onclick="filter()">filter</button>
  <form action = "shop.php" method="post">
  <input type="text" name="search" placeholder="Search..." >
  </form>
  </div>
  ';
}
  ?>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  </head>
  <body>
    <form method = "POST" id ="pilihform" action = "pilih.php" style = "display : none">
    <input name = "pilih" id ="pilihval" style = "display : none">
</form>
   <form id = "filter" class = "filter" method = "POST" >
    <div class = "close">
   <img src = "./image/x.png" width = "50px" height = "50px" onclick = "closeform()" style = "margin-left: 92%">
</div>
    <div class = "buttontitle">FILTER</div>
    <div class = "filterbutton">
    <div class = "buttons">Jenama</div>
    <select class = "select" id = "jenama" name="jenama">
      </select>
    </div>
    <div class = "filterbutton">
    <div class = "buttons">Warna</div>
      <select class = "select"  name="color">
        <option>none</option>
        <option>Merah</option>
        <option>Jingga</option>
        <option>Kelabu</option>
        <option>Hijau</option>
        <option>Biru</option>
        <option>Coklat</option>
        <option>hitam</option>
        <option>putih</option>
      </select>
    </div>
    <div class = "filterbutton">
    <div class = "buttons">Jenis</div>
      <select class = "select" name="jenis">
        <option>none</option>
        <option>Meja</option>
        <option>Kerusi</option>
        <option>Katil</option>
        <option>Pintu</option>
        <option>Tingkap</option>
        <option>Permaidani</option>
        <option>Almari</option>
      </select>
    </div>
    <div class = "filterbutton">
    <div class = "buttons">Harga</div>
      <select  id= "harga" onfocus = "createlist(this.id)" name="harga">
      <option>------------</option>
      </select>
    </div>
    <button class = "searchbutton" style = "margin-top : 30px; font-size : 30px ; margin-left : 40%" formaction="shop.php">filter</button>
  </form>
  </body>
  <style>
    select {
  background-color: black;
  font : white;
  background-position: center right;
  background-repeat: no-repeat;
  border: 1px solid #AAA;
  border-radius: 2px;
  color: white;
  font-size: 25px;
  font-family: "Lucida Console", "Courier New", monospace;
  padding-top: 2px;
  padding-bottom: 2px;
  border : 2px solid black;
  max-height: 50px;
}
.buttontitle{
  display : block;
  margin-left : 40%;
  font-family: "Lucida Console", "Courier New", monospace;
  color : white;
  font-size : 30px ;
  background-color : #333333;
}

.buttons{
  font-family: "Lucida Console", "Courier New", monospace;
  color : white;
  font-size : 30px ;
  background-color : #333333;
}
.filter{
  border : 4px solid black;
  height : 500px;
  width : 600px;
  background-color : #333333;
  display : none;
  position : fixed;
  top : 100px;
  left : 28%;
}    
  .searchbar  {
  height:50px ;
  width: 100%;
  background-color: #333333;
  position: fixed;
  top : 101px;
  border : 2px solid black ;
  z-index: 0;
}
td img{
   display: block;
    margin-left: auto;
    margin-right: auto;
    height : 100px ;
    width : 200px ;
    object-fit : contain;
}
input[name="search"] {
  background-color: white;
  height : 48px ;
  width: auto;
  padding: 12px 20px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  font-family: "Lucida Console", "Courier New", monospace;
  font-size : 15px;
  position: fixed;
  left : 500px ;
  top : 105px;
}
form[id="filter"] input{
  font-size : 25px ;
  background-color: white;
  border: 1px solid #ccc;
  border-radius: 2px;
  font-family: "Lucida Console", "Courier New", monospace;
}
.block {
  opacity : 0;
  width : 100% ;
  height : 300px ;
}

table {
  border-collapse: collapse;
  width: 25%;
  height: 300px;
  font-family: "Lucida Console", "Courier New", monospace;
  border : 5px solid #333333 ;
  float : left ;
}

th, td {
  text-align: left;
  padding: 8px;
  border : 1px solid black ;
  background-color: white;
}
.searchbutton {
  transition-duration: 0.4s;
  height :50px;
  width : auto ;
  background-color: #333333; 
  color: white; 
  font-family: "Lucida Console", "Courier New", monospace;
  font-size : 15px ;
  text-align: center;
  border: 2px solid black;
  -ms-transform: translate();
}

.searchbutton:hover {
  transition-duration: 0.4s;
  background-color: white;
  color : #333333 ;
}

 a {
  background-color: #333333;
  color : white;
  padding: 12px 16px;
  text-decoration: none;
  font-family: "Lucida Console", "Courier New", monospace;
  display: block;
}

img[src = "./image/x.png"]:hover {
transition-duration : 0.5s;
content:url(./image/x2.png);
}

.filterbutton{
  float : left ; 
  margin-left: 4%;
  margin-right : 4%;
  margin-top : 50px ;
  margin-bottom : 5px;
}
</style>
  </html>
  <?php
   $getjenama = "SELECT nama FROM jenama";
   $jenamaresult = $con -> query($getjenama); 
   $rowcount=mysqli_num_rows($jenamaresult);
   for($i = 0; $i < $rowcount;$i++){  
   $jenamarow = $jenamaresult -> fetch_assoc();
    $jenama1 = $con -> real_escape_string($jenamarow['nama']);
   echo"
   <script>
   
   function decode(str) {

    let txt = new DOMParser().parseFromString(str, 'text/html');
    
    return txt.documentElement.textContent;
    
    }

   var option = document.createElement('option');
   var option = document.createElement('option');
   option.text = decode('$jenama1') ;
   document.getElementById('jenama').add(option);
   </script>";
 };
 ?>
  <script>
    function editproduk(){
      location.replace("editproduk.php");
    }
    function filter(){
      document.getElementById("filter").style.display = "block";
      document.body.style.pointerEvents = "none" ;
      document.getElementById("filter").style.pointerEvents = "auto" ;
    }
   
    function createlist(x){
      var option = document.createElement("option");
      document.getElementById(x).remove(option);
      for (i = 1; i <= 9999 ;  i++){
      var option = document.createElement("option");
      option.text = "below RM".concat(i);
      document.getElementById(x).add(option);
      }
    }

    function edituser(){
      location.replace("edituser.php");
    }

    function pilihan(){
      location.replace("pilihan.php");
    }

    function pilih(){
      document.getElementById("pilihform").submit();
    }
    function selecttable(x){
      var table =  document.getElementsByTagName("table");
      for(i = 0; i < table.length ; i++){
      document.getElementsByTagName("table")[i].style.borderColor = "#333333";
      }
     document.getElementById(x).style.borderColor = "blue";
     document.getElementById("pilihval").value = x;
    }
    
    function closeform(){
      document.getElementById("filter").style.display = "none";
      document.body.style.pointerEvents = "auto" ;
    }

</script>