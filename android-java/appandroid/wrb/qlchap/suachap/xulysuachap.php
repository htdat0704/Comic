<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$host = "localhost";
$namebase = "app";
$pass1 = "v~oT(I$";
$pass2= "SL!]7Dhpe";
$pass= $pass1.$pass2;
$username = "root";

$day ="d";
$month ="m";
$year ="Y";

$day1 = date($day, time());
$month1 = date($month, time());
$year1 = date($year, time());

$now = $day1.'-'.$month1.'-'.$year1;

$con= mysqli_connect("$host","$username","","$namebase");

mysqli_set_charset($con, 'UTF8');

$tensp= $_GET['sp'];

$non = (float) $tensp;

$chap = "Chap ".$tensp;

$sql1= "UPDATE chap set tentruyen = '" .$chap ."', ngaydang='$now',numbert='$non' where id='".$_SESSION['id']."'";
mysqli_query($con, $sql1);


$maxx = "SELECT * from chap where idtruyen='".$_SESSION['idtruyen']."'";
$conmax = mysqli_query($con,$maxx);
while ($rowm=mysqli_fetch_array($conmax))
{
	$a = (float) $rowm['numbert'];
	$b = 0;
	if($a>$b)
	{
		$b=$a;
	}
}

echo $a;
if($non >= $a)
{
$sqlcall= "UPDATE truyen set chap = '" .$chap ."' WHERE id='".$_SESSION['idtruyen']."'";
$conaaa=mysqli_query($con,$sqlcall);
}

header("location:../qlchap.php");
?>