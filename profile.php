
  <!DOCTYPE html>
  <html lang="en">
  <style>
table {
  border-collapse: collapse;
  width: 600px;
  font-family: "Lucida Console", "Courier New", monospace;
  margin-top: 500px; 
  border : 5px solid black ;
  margin-left: auto; 
  margin-right: auto;
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

.circle {
  height: 300px;
  width: 300px;
  border : 2px solid #333333;
  background-color: transparent;
  border-radius: 50%;
  top : 150px ;
  left : 500px ;
  position : fixed ;
}

img[name="ha"] {
  height: 300px;
  width: 300px;
  border : 2px solid #333333;
  border-radius: 50%;
  top : 150px ;
  left : 500px ;
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

</style>
<?php
require('connect.php');
require('upbar.php');

$kunci = $_SESSION["idpengguna"];
$getimage = "SELECT * FROM pengguna WHERE idpengguna = '$kunci'";
$result = $con -> query($getimage);
$row = $result -> fetch_assoc();
$picture = $row['picture']; 
$idpengguna = htmlentities($row['idpengguna']);
$namapengguna = htmlentities($row['namapengguna']);
$katalaluan = htmlentities($row['katalaluan']);
$aras = $row['aras'];
$picname = "ha";
if($picture != null){
  echo "<img src = $picture name = $picname alt = $picture>";
  };
 echo "
 <table id = 'table'>
 <tr>
   <td>E-mail</td>
   <th>$idpengguna</th>
   </tr>
   <tr>
   <td>Name</td>
   <th>$namapengguna</th>
   </tr>
   <tr>
   <td>password</td>
   <th>$katalaluan</th>
 </tr>
 <tr>
   <td>aras</td>
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
</script>