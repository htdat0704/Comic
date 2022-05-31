<?php
session_start();
$idchap = $_SESSION['idchap'];
$idtruyen = $_SESSION['idtruyen'];
$con=mysqli_connect("localhost","root","","app");
mysqli_set_charset($con, 'UTF8');
$sql= "SELECT * FROM chap where id = $idchap";
$ds=mysqli_query($con,$sql);
$rowsp = mysqli_fetch_array($ds);
$tapchap = trim($rowsp['tentruyen']);
$sochap = (double)strstr($tapchap, ' ');

	$query = "SELECT * from chap where numbert > $sochap and idtruyen= '$idtruyen' ";
	$query2 = "SELECT * from chap where numbert > $sochap and idtruyen= '$idtruyen' ORDER BY numbert DESC";
	$q = mysqli_query($con, $query2);
	$recordExists = mysqli_fetch_array(mysqli_query($con, $query));
	if(isset($recordExists)){
		while ($rowm=mysqli_fetch_array($q))
		{
			$a = $rowm['id'];
		}
	}else{
		$a = $idchap;
	}
header('location:doctruyen.php?id='.$a.'');
?>