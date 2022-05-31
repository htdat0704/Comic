<?php


define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DB', 'app');

$con = mysqli_connect(HOST, USER, PASSWORD, DB) or die("Unable to Connect");
mysqli_set_charset($con,'utf8');
$email = $_GET['user_email'];

if(isset($_GET['email']))
{
	$ab = "SELECT * from users where email ='".$email."'";
	$s = mysqli_query($con,$ab);
	while($rpo = mysqli_fetch_array($s))
	{
	$idss = $rpo['id'];
	}
	$sql1= "UPDATE users set email = '" .$_GET['email'] ."' where id='".$idss."'";
	mysqli_query($con, $sql1);
	echo 'ok';
}
if(isset($_GET['name']))
{
	$sql1= "UPDATE users set name = '" .$_GET['name'] ."' where email='".$email."'";
	mysqli_query($con, $sql1);
	echo 'ok';
}
if(isset($_GET['pass']))
{
	$sql1= "UPDATE users set password = '" .$_GET['pass'] ."' where email='".$email."'";
	mysqli_query($con, $sql1);
	echo 'ok';
}





?>