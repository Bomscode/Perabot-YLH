<?php
require('connect.php');
 $fileMimes = array(
    'text/x-comma-separated-values',
    'text/comma-separated-values',
    'application/octet-stream',
    'application/vnd.ms-excel',
    'application/x-csv',
    'text/x-csv',
    'text/csv',
    'application/csv',
    'application/excel',
    'application/vnd.msexcel',
    'text/plain'
);

$csvFile = fopen($_FILES['csv']['tmp_name'], 'r');


fgetcsv($csvFile);
if (filesize($csvfile) == 0){
    echo "<script>alert('file is empty');</script>";
    echo"<script>location.replace('edituser.php')</script>";
    die;
}

if (!empty($_FILES['csv']['name']) && in_array($_FILES['csv']['type'], $fileMimes)){
 
while (($getData = fgetcsv($csvFile, 999, ",")) == TRUE)
{

            $email = $getData[0];
            $name = $getData[1];     
            $password = $getData[2];
            $aras = $getData[3]; 
            if(filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($name) <= 25 && strlen($password) <= 25 && strlen($email) <= 25){
            $query = "SELECT * FROM pengguna WHERE idpengguna = '$email'";

            $check = $con -> query($query);

            if ($check -> num_rows == 0 && !empty($_FILES['csv']['name'])){
                $con -> query("INSERT INTO pengguna (idpengguna, namapengguna, katalaluan, aras) VALUES ('$email' ,'$name' ,'$password', 'pengguna')");
            }else{
                echo "<script>alert('id in use');</script>";
                echo"<script>location.replace('edituser.php')</script>";
die;
            };
    }else{
        echo "<script>alert('file contains invalid data ');</script>";
        echo "<script>alert('file format [first line will be skipped] : <email> , <name> (less than 25 char)  , <password> (less than 25 char) ');</script>";
echo"<script>location.replace('edituser.php')</script>";
die;
    }
}

fclose($csvFile); 
$_FILES = array();
    }else{
        echo "<script>alert('please import a valid file (csv)');</script>";
echo"<script>location.replace('edituser.php')</script>";
die;
     
    }
echo "<script>alert('User(s) successfully imported');</script>";     
echo"<script>location.replace('edituser.php')</script>";
?>