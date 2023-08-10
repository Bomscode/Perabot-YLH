<html>
<?php
require('connect.php');
$_SESSION = array() ;
$_SESSION["aras"] = null;
  require ('upbar.php');
  ?>
<style>
  input, select {
  width: auto;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

.button{
  width: 50%;
  background-color: #333333;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  
}

.button[type="submit"]:hover {
  background-color: white;
  color: #333333;
}

body {
    display: flex;
    flex-direction: column;
    align-items: center;
}


.vertical-center {
  margin: 0;
  position: absolute;
  top: 25%;
}

a:hover{
  color : white;
}

</style>
<body>

<form class = "vertical-center" action="check1.php" method="post">
<div><div class = "button">Nama :</div><input type="text" name="name" maxlength="25" required><br></div>
<div><div class = "button">E-mel :</div> <input type="email" name="email" minlength = "8" maxlength="25" required><br></div>
<div><div class = "button">Katalaluan :</div><input type="password" name="password" minlength = "8" maxlength="25" required><br></div>
<button type="submit" class = "button">daftar</button>
<p><a href="signin.php">dah ada akaun? log masuk</a></p>
</form>

</body>
</html>