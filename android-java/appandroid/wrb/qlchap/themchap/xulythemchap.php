<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$host = "localhost";
$namebase = "app";
$pass1 = "v~oT(I$";
$pass2= "SL!]7Dhpe";
$pass= $pass1.$pass2;
$username = "root";
$con= mysqli_connect("$host","$username","","$namebase");
mysqli_set_charset($con, 'UTF8');

$day ="d";
$month ="m";
$year ="Y";

$day1 = date($day, time());
$month1 = date($month, time());
$year1 = date($year, time());

$now = $day1.'-'.$month1.'-'.$year1;


$tensp= $_GET['ten'];

$bar = (float) $tensp;

$chap = "Chap ".$tensp;

$idtt = $_SESSION['idtruyen'];

$sqladd="INSERT INTO chap(tentruyen,idtruyen,ngaydang,numbert) VALUES ('$chap','$idtt','$now','$bar') ";
$conaa=mysqli_query($con,$sqladd);

$qr = "SELECT * FROM truyen where id=".$_SESSION['idtruyen']." ";
$conaaaa=mysqli_query($con,$qr);
$row=mysqli_fetch_array($conaaaa);

$cat = substr($row['chap'], 5);
$barr = (float) $cat;

if($barr < $bar)
{
$sqlcall= "UPDATE truyen set chap = '" .$chap ."' WHERE id='".$_SESSION['idtruyen']."'";
$conaaa=mysqli_query($con,$sqlcall);
}

$sqll = "SELECT * from chap where idtruyen='$idtt' and tentruyen='$chap'";
$la = mysqli_query($con,$sqll);
$r = mysqli_fetch_array($la);
$name = $r['id'];
$dir = "../../anh/".$_SESSION['idtruyen']."/";
mkdir($dir.$name);
header('location:../qlchap.php?id='.$_SESSION['idtruyen'].'');
?>