<?php
session_start();
$host = "localhost";
$namebase = "app";
$pass1 = "v~oT(I$";
$pass2= "SL!]7Dhpe";
$pass= $pass1.$pass2;
$username = "root";

$id = $_GET['idtruyen'];

$conn = mysqli_connect("$host","$username","","$namebase");
mysqli_set_charset($conn,'utf8');

$sql = "SELECT * from truyen where id=$id";
$query = mysqli_query($conn,$sql);

$row = mysqli_fetch_array($query);
$tang = $row['likene'] + 1;

$sql1= "UPDATE truyen set likene = '$tang' where id='$id' ";
mysqli_query($conn, $sql1);


?>