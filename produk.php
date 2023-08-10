<?php
require('connect.php');
require('upbar.php');
require('print.php');
if($_SESSION["aras"] != "admin"){
  echo"
  <script>
  history.go(-1);
  </script>";
}
echo'<div class = "block"></div>
<div class="searchbar">Produk</div>';

$forimage ="2"; 
   $search1 = "SELECT * FROM produk";
$result = $con -> query($search1);
$rowcount=mysqli_num_rows($result);
?>
  <?php
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
<table> 
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
?>
<style>
    .block {
  opacity : 0;
  width : 100% ;
  height : 170px ;
}
table {
  border-collapse: collapse;
  width: 25%;
  height: 300px;
  
  border : 5px solid #333333 ;
  float : left;
}

td img{
    margin-left: auto;
    margin-right: auto;
    height : 100px ;
    width : 200px ;
    object-fit : contain;
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
  
  font-size : 15px ;
  text-align: center;
  border: 2px solid black;
  -ms-transform: translate();
}

.searchbutton:hover {
  color : #333333;
  background-color : white;
}
.searchbar  {
  color : white;
  font-size : 30px;
  text-align : center;
  height:50px ;
  width: 100%;
  background-color: #333333;
  position: fixed;
  top : 101px;
  border : 2px solid black ;
  z-index: 0;  
  
}
</style>