<?php 
require ('print.php');
require ('connect.php') ;
require ('upbar.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>

.buttons{
  transition-duration: 0.4s;
  height :50px;
  width : auto ;
  background-color: #333333; 
  color: white; 
  font-family: "Lucida Console", "Courier New", monospace;
  font-size : 15px ;
  border: 2px solid black;
  left : 0px;
  text-align: center;
}

.buttons:hover {
  transition-duration: 0.4s;
  background-color: white;
  color : #333333 ;
}
table {
  table-layout: fixed;
  width : 100%;
  border-collapse: collapse;
  font-family: "Lucida Console", "Courier New", monospace;
  border : 4px solid black ;
}

form{
  float : left;
  height : 1px;
}
th{
  width : 33%;
  border : 2px solid black ;
  text-align: left;
  padding: 8px;
  background-color : white;
}
    .scrollbar {
        display : block;
        height : 300px;
        width : 99%;
        border : 10px solid black;
        overflow : auto ;
    }
    .invis{
        display : none;
    }
    input[type="file"]{
      opacity : 0;
      position : absolute;
    }
    .square{
        opacity : 0;
        width : 100%;
        height : 92px;
    }
    .title{
        background-color : #333333;
        font-family: "Lucida Console", "Courier New", monospace;
        color : white ;
        font-size : 30px;
    }
    </style>
    
<body onload = "reset()">
         <form action = "import.php" id = "import" method = "POST" enctype = "multipart/form-data">
            <input type="file" id = "import1" name = 'csv' oninput='submit()'>
          </form>
    <form  action = "editprofile.php" id = "userform" class = "invis" method = "POST">
        <input id = "idpengguna"  name = "idpengguna" type = "text">
    </form>
    <div class = "square"></div>
    <div class = "scrollbar">
        <div class = "title">
        Pengguna
          <button class = 'buttons' onclick = "trigger1()">import</button>
          <button class = 'buttons' onclick = "submitform()">edit user</button>
        </div>
        
        <?php
        $getpengguna = "SELECT * FROM pengguna WHERE aras = 'pengguna'";
   $result = $con -> query($getpengguna);
   if ($result -> num_rows > 0){
    for($i = 1;$i <= mysqli_num_rows($result); $i++){
    $row = $result -> fetch_assoc();
    $idpengguna = htmlentities($row['idpengguna']);
$namapengguna = htmlentities($row['namapengguna']);
$katalaluan = htmlentities($row['katalaluan']);
    $aras = $row['aras'];
    echo "
    <table  onclick = 'selecttable(this.id)' id = $idpengguna>
      <th>$idpengguna</th>
      <th>$namapengguna</th>
      <th>$katalaluan</th>
      <th>$aras</th>
    </table>
     ";
}
}
?>
    </div>
    <div class = "scrollbar"> 
        <div class = "title">Pekerja</div>
        <?php
        $getpengguna = "SELECT * FROM pengguna WHERE aras = 'pekerja'";
        $result = $con -> query($getpengguna);
        if ($result -> num_rows > 0){
            for($i = 1;$i <= mysqli_num_rows($result); $i++){
            $row = $result -> fetch_assoc();
            $idpengguna = htmlentities($row['idpengguna']);
        $namapengguna = htmlentities($row['namapengguna']);
        $katalaluan = htmlentities($row['katalaluan']);
            $aras = $row['aras'];
            echo "
            <table  onclick = 'selecttable(this.id)' id = $idpengguna>
              <th>$idpengguna</th>
              <th>$namapengguna</th>
              <th>$katalaluan</th>
              <th>$aras</th>
            </table>
             ";
        }
}
?>
    </div>
</body>
<script>
    function selecttable(x){
      var table =  document.getElementsByTagName("table");
      for(i = 0; i < table.length ; i++){
      document.getElementsByTagName("table")[i].style.borderColor = "black";
      }
     document.getElementById(x).style.borderColor = "blue";  
     document.getElementById("idpengguna").value = document.getElementById(x).querySelector("th").innerHTML;
    }

    function submitform(){
      document.getElementById("userform").submit();
    }

    function reset(){
      document.getElementById('userform').reset();
    }
    function trigger1(){
    document.getElementById('import1').click();
    }
    </script>
</html>