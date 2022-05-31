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
$tensp= $_GET['ten'];
$mtsp=$_GET['noidung'];
$sqladd="INSERT INTO truyen(ten, noidung,chap) VALUES ('$tensp','$mtsp','Chap 0')";
$conaa=mysqli_query($con,$sqladd);
$sqlcall="select * from truyen where ten='".$tensp."' and noidung='".$mtsp."' and chap='Chap 0' ";
$conaaa=mysqli_query($con,$sqlcall);
$rowidd=mysqli_fetch_array($conaaa);

$name = $rowidd['id'];

$dir = "../../anh/";
if(!file_exists($dir.$name))
{
	mkdir($dir.$name);
}
$_SESSION['id']=$rowidd['id'];
header('location:themanhtruyen.php')
?>