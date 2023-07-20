<?php 
require('connect.php');
require('upbar.php');
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
<table onclick = 'selecttable(this.id)' id = '$idproduk'> 
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
$row = $result -> fetch_assoc();
  }
}else{
    echo"<p>no produk yet</p>";
}
?>
<style>
  .searchbutton {
    float : left;
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
  p{
    font-size : 50px;
    font-family: 'Lucida Console', 'Courier New', monospace;
    color : #333333;
  text-align: center;
  }
    table {
  border-collapse: collapse;
  width: 25%;
  height: 300px;
  font-family: "Lucida Console", "Courier New", monospace;
  border : 5px solid #333333 ;
  float : left ;
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

th, td {
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
        height : 50px;
        text-align : center;
        background-color : #333333 ;
  font-family: "Lucida Console", "Courier New", monospace;
    }
    </style>
 <form  action = "removepilih.php" id = "userform" style = "display : none" method = "POST">
        <input id = "idproduk"  name = "idproduk" type = "text">
    </form>
    <div class = "box">
    <button type = "button" class = "searchbutton" onclick= "remove()">Remove</button>Pilihan Pengguna</div>
    <script>
      function selecttable(x){
      var table =  document.getElementsByTagName("table");
      for(i = 0; i < table.length ; i++){
      document.getElementsByTagName("table")[i].style.borderColor = "#333333";
      }
     document.getElementById(x).style.borderColor = "blue";
     document.getElementById("idproduk").value = x;
    }

    function remove(){
      document.getElementById("userform").submit();
    }
    </script>