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
  font-family: "Lucida Console", "Courier New", monospace;
}

.vertical-center {
  margin: 0;
  position: absolute;
  top: 60%;
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
 
}

.button {
  width: auto;
  background-color: #333333;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-family: "Lucida Console", "Courier New", monospace;
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

a:hover{
  color : white;
}
</style>
<body>

<form class = "vertical-center" action="check.php" method="post">
<div><div class = "button">E-mail :</div><input type="text" name="name" required></div>
<div><div class = "button">Password :</div><input type="password" name="password" required></div>
<button type="submit" class = "button">log masuk</button>
<p><a href="register.php">tak ada akaun? daftar sini</a></p>
</form>

</body>
</html>
