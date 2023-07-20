<?php
require ('connect.php');
$name = $con -> real_escape_string($_POST['name']);
$email = $con -> real_escape_string($_POST['email']);
$password = $con -> real_escape_string($_POST['password']);
if(filter_var($email, FILTER_VALIDATE_EMAIL)){
$signcheck = "SELECT * FROM pengguna WHERE idpengguna = '$name' OR namapengguna = '$name' ";
$result1 = $con -> query($signcheck);
if ($result1 -> num_rows == 0 ){
$signe  = "INSERT INTO pengguna (idpengguna, namapengguna, katalaluan, aras) VALUES ('$email' ,'$name' ,'$password', 'pengguna' ) ";
$result = $con -> query($signe);
if($result){
    echo "<script>
     window.location = 'signin.php'
     alert('Pendaftaran berjaya')
     </script>";
}
}else{
    echo "<script>
     window.location = 'register.php'
     alert('pendaftaran gagal email telah digunakan')
     </script>";
}
}else{
    echo "<script>
    window.location = 'register.php'
    alert('please enter valid email')
    </script>";
}
































