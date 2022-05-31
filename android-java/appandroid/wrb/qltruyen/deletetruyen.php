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
$delet="DELETE FROM truyen WHERE id=".$xoane;
$conaa=mysqli_query($con,$delet);

$delan= " SELECT * from chap where idtruyen =".$xoane;
$conae=mysqli_query($con,$delan);

while ($rowa=mysqli_fetch_array($conae)) {
	$anh = "DELETE from anh where idchap=".$rowa['id'];
	$conaac=mysqli_query($con,$anh);
	$name = $rowa['id'];	
}

$dele="DELETE FROM chap WHERE idtruyen=".$xoane;
$conaaa=mysqli_query($con,$dele);
$name = $xoane;
$dirrr='../anh/'.$xoane.'/';

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
if(file_exists('../anh/'.$name))
{
	recursiveDelete($dirrr);
	rmdir('../anh/'.$name);
}
header('location:qltruyen.php')
?>