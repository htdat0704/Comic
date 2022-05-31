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

$dir= "../anh/";
$name = $xoane;
if(file_exists($dir.$name))
{
	 rmdir($dir.$name);
}

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

$sql = "SELECT * from chap where id='".$xoane."'";
$sqls = mysqli_query($con,$sql);
$ro = mysqli_fetch_array($sqls);
$so = (float) $ro['numbert'];

$maxxx = "SELECT * from chap where idtruyen='".$_SESSION['idtruyen']."' AND numbert <> $b";
$conmaxx = mysqli_query($con,$maxxx);
while ($rowmx=mysqli_fetch_array($conmaxx))
{
	$a = (float) $rowmx['numbert'];
	$c = 0;
	if($a>$c)
	{
		$c=$a;
	}
}
$chapc= "Chap ".$c;
if($b == $so)
{
$sqlcall= "UPDATE truyen set chap = '" .$chapc ."' WHERE id='".$_SESSION['idtruyen']."'";
$conaaa=mysqli_query($con,$sqlcall);
}

function recursiveDelete($str) {
    if (is_file($str)) {
        return @unlink($str);
    }
    elseif (is_dir($str)) {
        $scan = glob(rtrim($str,'/').'/*');
        foreach($scan as $index=>$path) {
            recursiveDelete($path);
        }
        return @rmdir($str);
    }
}
$dir = "../anh/".$_SESSION['idtruyen']."/".$xoane."/";
if(file_exists("../anh/".$_SESSION['idtruyen']."/".$xoane.""))
{
recursiveDelete($dir);
rmdir("../anh/".$_SESSION['idtruyen']."/".$xoane."");
}
$deleta="DELETE FROM chap WHERE id=".$xoane;
$conaaa=mysqli_query($con,$deleta);

$delet="DELETE FROM anh WHERE idchap=".$xoane;
$conaa=mysqli_query($con,$delet);
header('location:qlchap.php')
?>