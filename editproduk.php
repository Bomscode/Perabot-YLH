  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php  
  require ('connect.php');
  require ('upbar.php');
  ?>
  </head>
  <style>
    .scrollbar {
        left :2%;
        top: 170px;
        position : fixed;
        height : 450px;
        width : 671px;
        border : 10px solid black;
        overflow : auto ;
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

form[name = "search"] input{
  background-color: white;
  height : 48px ;
  width: auto;
  padding: 12px 20px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  
  font-size : 15px;
  position: fixed;
  left : 500px ;
  top : 105px;
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
  transition-duration: 0.4s;
  background-color: white;
  color : #333333 ;
}

form[class="editform"] input{
  padding: 12px 20px;
  margin: 8px 0;
  border-radius: 4px;
  box-sizing: border-box;
  
  font-size: 1em;
}
form[class="editform"] input[name = "what"]:hover {
  transition-duration: 0.2s;
  background-color: white;
  color : #333333 ;
} 
.editbutton {
  background-color: #333333;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  
}

.editbuttondelete {
  background-color: red;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  
}

.editform{
  position : fixed;
  left :820px;
  top: 170px;
}
table {
  border-collapse: collapse;
  width: 100%;
  height: 300px;
  
  border : 10px solid #333333 ;
  float : left ;
  position : static ;
}

th, td {
  text-align: left;
  padding: 8px;
  border : 1px solid black ;
  background-color: white;
}

.square {
  height : 170px;
   width : 250px;
   float : left;
  border : 2px solid #333333;
  z-index : -1;
  object-fit : contain ;
}
.formpos {
  border : 2px solid #333333;
  background-color: transparent;
  float : left;
  height : 170px;
   width : 250px;
  right : 2%;
  top: 0px;
  z-index : 2;
}
input[id="picvalue"],[id = "idprodukval"]{
  opacity : 0;
  position : absolute;
}
input[value="save"],input[value="delete"],img[name="plus"],div[id="save1"],div[id="delete1"]{
  display : none;
}
.vertical_center {
  background-color : #838282 ;
  position: absolute;
  height : 75px;
  width : 75px;
  border-radius: 50%;
  top : 90px ;
  left : 90px ;
  display: none;
}
input[type='file'] {
  opacity: 0;
}

.formpos:hover .vertical_center{
  display : block;
}

.plus {
border : 2px solid black;
height : 60px;
width : 60px;
position : absolute;
left : 50%;
top : 175px;
content:url(./image/plus.png);
}

body{
  display : flex;
}
.plus:hover   {
transition-duration : 0.5s;
content:url(./image/plus2.png);
}

select {
  display : none;
  padding: 12px 20px;
  margin: 12px 0;
  background-color: black;
  font : white;
  border-radius: 2px;
  color: white;
  font-size: 23px;
  
  padding-top: 2px;
  padding-bottom: 2px;
  border : 2px solid black;
  max-height: 50px;
}

.scrolltab  {
  left : 3%;
  position : fixed;
  width: 640px;
  background-color: #333333;
  color: white;
  font-size: 23px;
  
  padding-top: 6px;
  padding-bottom: 6px;
  text-align : center;
}

    </style>
  <body onload="forid()">
    <div class= "searchbar">
      <button class = "searchbutton" onclick = "location.href = 'produk.php'">Senarai Produk</button>
    <form name = "search" action = "editproduk.php" method="post">
    <input type="text" name="search" placeholder="Cari..." >
</form>
    </div>
   <div class = "scrollbar">
    <div class = "scrolltab" >Pilih Produk untuk kemaskini</div>
    <?php
    if($_SESSION["aras"] != "admin"){
      echo"
      <script>
      history.go(-1);
      </script>";
    }
   $forimage = "2";   
   $search = $_POST["search"] ?? null;
    if ($search == null){
    $search1 = "SELECT * FROM produk ";
    }else{
      $search1 = "SELECT * FROM produk WHERE namaproduk LIKE '%$search%' ";
    }
    $result = $con -> query($search1);
    $rowcount=mysqli_num_rows($result);
    if ($result -> num_rows == 0 && $search != null){
       echo '<script>alert("no item found")</script>';
   }else{
    for($i = 1;$i <= $rowcount; $i++){
      $row = $result -> fetch_assoc() ;
     $idproduk = $row['idproduk'];
  $jenama = $row['jenama'];
  $namaproduk = $row['namaproduk'];
  $detail = $row['detail'];
  $harga = $row['harga'];
  $gambar = $row['gambar'];
      $harga = "RM" . $harga;
      $fortable1 = "selecttable(this.id)";
      echo "
      <table onclick =  '$fortable1' onchange = 'change()' tabindex='1' id = '$idproduk'>
      <td colspan = $forimage><img src = $gambar style = 'object-fit : contain' width = '150px' height = '150px'></td>
      <tr>
        <td>produk id</td>
        <th>$idproduk</th>
        </tr>
      <tr>
        <td>Jenama</td>
        <th>$jenama</th>
        </tr>
        <tr>
        <td>Nama Produk</td>
        <th>$namaproduk</th>
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
} ?> </div>
<a href = "editproduk.php"><img id = "plus"name = "plus" class = "plus"></a>
<form class = "editform" action = "saveproduk.php" method="post" enctype="multipart/form-data">  
<div class = "editbutton" style = "width : 465px" id = "formtab"></div>
<div class = "formpos" >
<img class = "square" id = "produkpic" onerror = "unload()"> 
  <div class = "vertical_center" id = "hi" >
    <label for="add"><img src="./image/camera.png"  height = "75px" width = "75px"></label>
    <input type="file" id="add" name = "madd" accept="image/png" oninput="loadFile(event)">
  </div>
</div>
<input id = "picvalue" name = "produkpic"> 
<div style = " float : left; width : 100px" class = "editbutton" id="idproduk"></div>
<input id = "idprodukval" name = "idprodukval"> 
<div style = "float:left ; margin : 5px"><div class = "editbutton">nama produk</div><input id="namaproduk" name="namaproduk" maxlength = "15" required></div>
<div style = "float:left ; margin : 5px"><div class = "editbutton">jenama</div><input  id="jenama2" name="jenama" maxlength = "15" ><select id = "jenama1" name="jenama">
      </select></div>
<div style = "float:left ; margin : 5px"><div class = "editbutton">detail</div><input  id="detail" name="detail" maxlength = "25" required></div>
<div style = "float:left ; margin : 5px"><div class = "editbutton">harga (RM)</div><input min="1" type = "number" id="harga" name="harga" max = "9999" required></div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div style = "float:left ; margin : 5px" id = "save1"><input type="submit" class = "editbutton" name = "what" value = "save" id = "save"></div>
<div style = "float:left ; margin : 5px" id = "delete1"><input type="submit" class = "editbuttondelete" name = "what" value = "delete" id= "delete" onclick = "return confirm('Are you sure you want to delete this item')"></div>
<div style = "float:left ; margin : 5px"><input type="submit" class = "editbutton" name = "what" value = "addproduk" id = "addproduk"></div>
<div style = "float:left ; margin : 5px"><input type="submit" class = "editbutton" name = "what" value = "discard" id = "discard"  onclick = "return confirm('Are you sure you want to discard')"></div>
</form>
  </body>
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
   document.getElementById('jenama1').add(option);
   </script>";
 };
 ?>
  <script>
    function selecttable(x){
      var table =  document.getElementsByTagName("table");
      for(i = 0; i < table.length ; i++){
      document.getElementsByTagName("table")[i].style.borderColor = "#333333";
      }
     document.getElementById(x).style.borderColor = "blue";
     document.getElementById("produkpic").src = document.getElementById(x).querySelector("td").querySelector("img").src;
     let picturevalue = document.getElementById(x).querySelector("td").querySelector("img").src.replace(/^.*[\\\/]/, "./image/")
     document.getElementById("picvalue").value = picturevalue;        
     document.getElementById("idproduk").innerHTML = "id:".concat(document.getElementById(x).querySelector("th").innerHTML);
     document.getElementById("idprodukval").value =  document.getElementById(x).querySelector("th").innerHTML;
     document.getElementById("jenama1").value = decode(document.getElementById(x).querySelectorAll("th")[1].innerHTML);
     document.getElementById("namaproduk").value = decode(document.getElementById(x).querySelectorAll("th")[2].innerHTML);
     document.getElementById("detail").value = decode(document.getElementById(x).querySelectorAll("th")[3].innerHTML);
     document.getElementById("harga").value = document.getElementById(x).querySelectorAll("th")[4].innerHTML.replace("RM","");
     document.getElementById("plus").style.display = "inline";
     document.getElementById("save").style.display = "inline";
     document.getElementById("save1").style.display = "inline";
     document.getElementById("delete").style.display = "inline";
     document.getElementById("delete1").style.display = "inline";
     document.getElementById("jenama1").style.display = "inline";
     document.getElementById("addproduk").style.display = "none";
     document.getElementById("discard").style.display = "none";
     document.getElementById("jenama2").style.display = "none";
  document.getElementById("jenama1").disabled = false ;
  document.getElementById("save").disabled = false;
     document.getElementById("delete").disabled = false;
     document.getElementById("formtab").innerHTML = "Edit Produk";
    }
    function another(){
       document.getElementById("form2").submit();
    }
  var loadFile = function(event) {
    var file = event.target.files[0];
    const acceptedImageTypes = ['image/png'];
    if(acceptedImageTypes.includes(file['type'])){
  document.getElementById('produkpic').src = URL.createObjectURL(event.target.files[0]);
    }else{
      alert("please choose a png file");
      document.getElementById('add').value = "";
      document.getElementById("picvalue").value = "";
    }
};
 function unload(){
  alert("unable to load image");
      document.getElementById('add').value = "";
      document.getElementById("picvalue").value = "";
 }
function forid(){
      document.getElementById('add').value = "";
  document.getElementById("jenama1").disabled = true ;
  document.getElementById("save").disabled = true;
     document.getElementById("delete").disabled = true;
  document.getElementById("idproduk").innerHTML = "Produk Baharu";
  document.getElementById("formtab").innerHTML = "Tambah Produk";
}

    </script>
