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
	$_SESSION['user']=$_GET['user'];
	$_SESSION['pass']=$_GET['pass'];
	$sql = " SELECT * from admin where user='".$_GET['user']."'";
	$abc= mysqli_query($con , $sql) ;
	$row= mysqli_fetch_array($abc) ;
	
	if(($_SESSION['user']==$row['user'])&&($_SESSION['pass']==$row['pass']))
	{	
		$_SESSION['user']="sairoiki2a";
		header('location:../chuyentrang.php');
	}
	else{
		$_SESSION['user']="sairoikia";
		header('location:../dangnhap.php');
	}


?>