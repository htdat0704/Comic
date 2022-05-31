<?php 
	$host = "localhost";
	$namebase = "app";
	$pass1 = "v~oT(I$";
	$pass2= "SL!]7Dhpe";
	$pass= $pass1.$pass2;
	$username = "root";

	$con= mysqli_connect("$host","$username","","$namebase");

	$idtruyen = $_GET['idtruyen'];
	$idchap = $_GET['idchap'];
	$so = (float) $_GET['tienchap'];

	$query = "SELECT * from chap where numbert > $so and idtruyen= '$idtruyen' ";
	$query2 = "SELECT * from chap where numbert > $so and idtruyen= '$idtruyen' ORDER BY numbert DESC";
	$q = mysqli_query($con, $query2);
	$recordExists = mysqli_fetch_array(mysqli_query($con, $query));
	if(isset($recordExists)){
		while ($rowm=mysqli_fetch_array($q))
		{
			$a = $rowm['id'];
			$b = $rowm['numbert'];
		}
	}else{
		$b = $so;
		$a = $idchap;
	}
	echo $b."-".$a;
?>