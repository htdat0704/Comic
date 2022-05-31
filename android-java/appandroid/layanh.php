<?php
session_start();
$host = "localhost";
$namebase = "app";
$pass1 = "v~oT(I$";
$pass2= "SL!]7Dhpe";
$pass= $pass1.$pass2;
$username = "root";

$idchap = $_GET['idchap'];

$conn = mysqli_connect("$host","$username","","$namebase");
mysqli_set_charset($conn,'utf8');

$sql = "SELECT * from anh where idchap = $idchap ORDER BY id ASC ";

$query = mysqli_query($conn,$sql);

$arr = array();

while($row = mysqli_fetch_array($query)){

    array_push($arr,$row['anh']);
    
}

$json = json_encode($arr);
echo $json;



?>