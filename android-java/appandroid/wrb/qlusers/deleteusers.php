<?php
session_start();
$host = "localhost";
$namebase = "app";
$pass1 = "v~oT(I$";
$pass2= "SL!]7Dhpe";
$pass= $pass1.$pass2;
$username = "root";


$con= mysqli_connect("$host","$username","","$namebase");

mysqli_set_charset($con, 'UTF8');
$xoane= $_GET['id'];

$name = $xoane;
$dir="../../image/";
While(!file_exists($dir.$name."."."png"))
{
$name= $name."a";
} 
if(file_exists($dir.$name."."."png"))
{
	unlink($dir.$name."."."png");
}

$delet="DELETE FROM users WHERE id=".$xoane;
$conaa=mysqli_query($con,$delet);
header('location:qlusers.php')
?>