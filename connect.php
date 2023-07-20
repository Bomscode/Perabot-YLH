<?php
$host="localhost";
$user="root";
$password="";
$database="perabot ylh"; 

$con=mysqli_connect($host,$user,$password,$database);
    if (mysqli_connect_errno()){
        echo "Proses sambung ke pangkalan data gagal";
        exit();
    }
    session_start();
?>