<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbase= "teknikservis";
/*
$servername = "localhost";
$username = "gespox";
$password = "123456";
$dbase="teknikservis12";
*/
try{
    $conn=new PDO("mysql:host=$servername;dbname=$dbase;charset=utf8","$username","$password");
}catch (PDOException $error){
    echo "VERI TABANI BAGLANTISI SAGLANAMADI !";
    die($error->getMessage());
}
?>
