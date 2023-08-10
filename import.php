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
                echo "<script>alert('id telah didaftarkan');</script>";
                echo"<script>location.replace('edituser.php')</script>";
die;
            };
    }else{
        if (filesize($csvfile) == 0){
            echo "<script>alert('fail adalah kosong');</script>";
            echo"<script>location.replace('edituser.php')</script>";
            die;
        }
        echo "<script>alert('fail mengandungi data tidak sah ');</script>";
        echo "<script>alert('fail format [line pertama akan skip] : <e-mel> , <nama> (kurang daripada 25 char)  , <password> (kurang daripada 25 char) ');</script>";
echo"<script>location.replace('edituser.php')</script>";
die;
    }
}

fclose($csvFile); 
$_FILES = array();
    }else{
        echo "<script>alert('sila import fail yang sah (csv)');</script>";
echo"<script>location.replace('edituser.php')</script>";
die;
     
    }
echo "<script>alert('Pengguna berjaya diimport');</script>";     
echo"<script>location.replace('edituser.php')</script>";
?>