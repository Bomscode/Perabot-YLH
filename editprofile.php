
<!DOCTYPE html>
  <html lang="en">
  <style>

.circle {
  height: 300px;
  width: 300px;
  border : 2px solid #333333;
  background-color: transparent;
  border-radius: 50%;
  top : 200px ;
  left : 300px ;
  position : fixed ;
}

img[name="ha"] {
  height: 300px;
  width: 300px;
  border : 2px solid #333333;
  border-radius: 50%;
  top : 200px ;
  left : 300px ;
  position : fixed ;
}

.vertical_center {
  margin: 0;
  background-color : #838282 ;
  position: absolute;
  height : 100px;
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
.editbutton {
  width: auto;
  height: auto;
  background-color: #333333;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  
}

.editbuttondelete {
  width: auto;
  height: auto;
  background-color: red;
  color: white;
  padding: 14px 20px;
  border: none;
  border-radius: 4px;
  
}

input[name="idpengguna"],input[id="aras1"]{
  display : none;
}

select {
  background-color: black;
  font : white;
  border-radius: 2px;
  color: white;
  font-size: 25px;
  
  padding-top: 2px;
  padding-bottom: 2px;
  border : 2px solid black;
  max-height: 50px;
}

.editform{
  position : fixed;
  right : 450px;
  top: 100px;
  float : left;
}

form[class="editform"] input[name = "what"]:hover {
  transition-duration: 0.2s;
  background-color: white;
  color : #333333 ;
} 

form[class="editform"] input {
  padding: 12px ;
  margin: 8px 0;
  border-radius: 4px;
  box-sizing: border-box;
  
  font-size: 1em;
}
</style>
<?php
require('connect.php');
require('upbar.php');
$idpengguna = $_POST["idpengguna"];
$getimage = "SELECT * FROM pengguna WHERE idpengguna = '$idpengguna'";
$result = $con -> query($getimage);
$row = $result -> fetch_assoc();
$picture = $row['gambar']; 
$picname = "ha";
  echo "<img src = '$picture' id = 'userpic' onerror = 'unload()' name = '$picname' alt = '$picture'>";
  
  ?>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<?php 
$idpengguna = $_POST["idpengguna"];
$getuserinfo = "SELECT * FROM pengguna WHERE idpengguna = '$idpengguna'";
$result2 = $con -> query($getuserinfo);
$row2 = $result2 -> fetch_assoc();
$idpengguna = htmlentities($row2['idpengguna']);
$namapengguna = htmlentities($row2['namapengguna']);
$katalaluan = htmlentities($row2['katalaluan']);
$aras = $row2['aras'];
if($aras == "pengguna"){
  $aras2 = "admin";
}
if($aras == "admin"){
  $aras2 = "pengguna";
}
if ($_SESSION["aras"] == "pengguna"){
    echo"
      <form class = 'editform' action = 'saveuser.php' method='post' enctype='multipart/form-data'>
        <div class = 'circle'>
          <div class = 'vertical_center' id = 'hi'>
            <label  for='add'><img src='./image/camera.png'  height = '100px' width = '100px'></label>
            <input type='file' id='add' name = 'madd' accept='image/png' oninput='loadFile(event,this)'>
          </div>
        </div>   
        <div class = 'editbutton'>$idpengguna</div> 
        <input name = 'idpengguna' value = '$idpengguna'>
        <input id = 'aras1' name = 'aras' value = '$aras'>
        <div class = 'editbutton'>nama pengguna</div><input name='namapengguna' maxlength='25' value = '$namapengguna' required>
        <div class = 'editbutton'>katalaluan</div><input name='katalaluan' minlength = '8' maxlength='25' value = '$katalaluan' required>  
        <div class = 'editbutton'>aras : pengguna</div>
        <input type='submit' class = 'editbutton' name = 'what' value = 'simpan'>
        <input type='submit' class = 'editbuttondelete' name = 'what' value = 'hapus' onclick = 'return confirm('Are you sure you want to delete account?')'>
      </form>
    ";
}else if ($_SESSION["aras"] == "admin"){
    {
      echo"
        <form class = 'editform' action = 'saveuser.php' method='post' enctype='multipart/form-data'>
          <div class = 'circle' >
            <div class = 'vertical_center' id = 'hi'>
              <label  for='add'><img src='./image/camera.png'  height = '100px' width = '100px'></label>
              <input type='file' id='add' name = 'madd' accept='image/png' oninput='loadFile(event,this)'>
            </div>
          </div>
        <div class = 'editbutton'>'$idpengguna'</div>    
        <input name = 'idpengguna' value = '$idpengguna'>
        <div class = 'editbutton'>nama pengguna</div><input name='namapengguna' maxlength='25' value = '$namapengguna' required>
        <div class = 'editbutton'>katalaluan</div><input name='katalaluan' minlength = '8' maxlength='25'  value = '$katalaluan' required> 
       <div class = 'editbutton'>aras</div><select style = 'display : block' name='aras' value = '$aras'><option selected>$aras</option><option>$aras2</option></select>
       <input type='submit' class = 'editbutton' name = 'what' value = 'simpan'>
       <input type='submit' class = 'editbuttondelete' name = 'what' value = 'hapus' onclick = 'return confirm('Are you sure you want to delete account?')'>
</form>
    ";
    }
}
?>
  </head>
  <body>
  </body>
  </html>
  <script>

var loadFile = function(event) {
    var file = event.target.files[0];
    const acceptedImageTypes = ['image/png'];
    if(acceptedImageTypes.includes(file['type'])){
  document.getElementById('userpic').src = URL.createObjectURL(event.target.files[0]);
    }else{
      alert("please choose a png file");
      location.reload();
    }
};


function unload(){
  if(document.getElementById('add').value != ""){
  alert("unable to load image");
  location.reload();
  }
 }
</script>