<?php


define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DB', 'app');





$con = mysqli_connect(HOST, USER, PASSWORD, DB) or die("Unable to Connect");
mysqli_set_charset($con,'utf8');
$userName = $_GET['user_name'];
$userID = $_GET['user_id'];
$userPassword = $_GET['user_password'];


if($userName == '' || $userID == '' || $userPassword == ''){
	echo 'User Name, ID or Password can not be empty';
}else{
	$query = "select * from users where email = '$userID'";
	$recordExists = mysqli_fetch_array(mysqli_query($con, $query));
	if(isset($recordExists)){
		echo 'User already exists';
	}else{
		$query = "INSERT INTO users (name, email, password, idadmin) VALUES ('$userName', '$userID', '$userPassword', '0')";
		if(mysqli_query($con, $query)){
			echo 'User registered successfully';
			$imagelink = "http://192.168.1.11/appandroid/image/";
			$sqlcall="SELECT * from users where email='".$userID."' ";
			$conaaa=mysqli_query($con,$sqlcall);
			$rowidd=mysqli_fetch_array($conaaa);
			$name = $rowidd['id'];
			$link = $imagelink.$name."."."png";
			$myfile = fopen("image/".$rowidd['id'].".png",'w');
			$sqladd="UPDATE users SET anh = '$link' where id=".$name;
   			$conaa=mysqli_query($con,$sqladd);
			
		}else{
			echo 'oops! please try again!';
		}
	}


	mysqli_close($con);
}



?>