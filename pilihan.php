<?php 
require('print.php');
require('connect.php');
require('upbar.php');
if($_SESSION["aras"] != "pengguna"){
  echo"
  <script>
  history.go(-1);
  </script>";
}
echo "<div class = 'block'></div>";
$idpengguna = $_SESSION["idpengguna"];
$getproduk = "SELECT * FROM pilihanpengguna WHERE idpengguna = '$idpengguna'";
$result = $con -> query($getproduk);
if($result -> num_rows > 0){
$row = $result -> fetch_assoc();
$rowcount = mysqli_num_rows($result);
$hi2 = $row['idpengguna'];
$hi = $row['idproduk'];
for($i = 0; $i < $rowcount; $i++){
$hi2 = $row['idpengguna'];
$hi = $row['idproduk'];
if($idpengguna == $hi2){
$search1 = "SELECT * FROM produk WHERE idproduk = '$hi'";
$result1 = $con -> query($search1);
  $row2 = $result1 -> fetch_assoc();
  $idproduk = $row2['idproduk'];
  $jenama = $row2['jenama'];
  $namaproduk = $row2['namaproduk'];
  $detail = $row2['detail'];
  $harga = $row2['harga'];
  $gambar = $row2['gambar'];
  $harga = "RM" . $harga;
  $forimage = "2";
  echo "
  <table id = '$idproduk' onmouseout = 'diselect()' onmouseover = 'selecttable(this.id)'> 
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
    <td colspan = $forimage>
    <button type = 'button' class = 'padambutton' onclick= 'remove()'>padam</button>
    </td>
  </table>
   ";
}
$row = $result -> fetch_assoc();
  }
}else{
    echo"<p>masih tak ada produk</p>";
}
?>
<style>
  .padambutton{
  transition-duration: 0.4s;
  height :20px;
  background-color: #333333; 
  color: white; 
  
  font-size : 15px ;
  text-align: center;
  border: 2px solid black;
}


.padambutton:hover {
  transition-duration: 0.4s;
  background-color: white;
  color : #333333 ;
}
  p{
    font-size : 50px;
    font-family: 'Lucida Console', 'Courier New', monospace;
    color : #333333;
  text-align: center;
  }

td img{
   display: block;
    margin-left: auto;
    margin-right: auto;
    height : 100px ;
    width : 200px ;
    object-fit : contain;
}

.block {
  opacity : 0;
  width : 100% ;
  height : 160px ;
}


table {
  border-collapse: collapse;
  width: 25%;
  height: 300px;
  
  border : 5px solid #333333 ;
  float : left ;
}



th,td {
  height : 49px;
  text-align: left;
  padding: 8px;
  border : 1px solid black ;
  background-color: white;
}

    .box{
        font-size : 30px;
        position : absolute;
        top : 101px;
        color : white ;
        width : 100%;
        height:53px ;
        text-align : center;
        background-color : #333333 ;
  
    }
    </style>
 <form  action = "removepilih.php" id = "userform" style = "display : none" method = "POST">
        <input id = "idproduk"  name = "idproduk" type = "text">
    </form>
    <div class = "box">Pilihan Pengguna</div>
    <script>
      function selecttable(x){
      var table =  document.getElementsByTagName("table");
      for(i = 0; i < table.length ; i++){
      document.getElementsByTagName("table")[i].style.borderColor = "#333333";
      }
     document.getElementById(x).style.borderColor = "blue";
     document.getElementById("idproduk").value = x;
    }

    function diselect(){
      var table =  document.getElementsByTagName("table");
      for(i = 0; i < table.length ; i++){
      document.getElementsByTagName("table")[i].style.borderColor = "#333333";
      }
    }

    function remove(){
      document.getElementById("userform").submit();
    }
    </script>