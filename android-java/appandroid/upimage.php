<?php 
	$host = "localhost";
	$namebase = "app";
	$pass1 = "v~oT(I$";
	$pass2= "SL!]7Dhpe";
	$pass= $pass1.$pass2;
	$username = "root";

	$con= mysqli_connect("$host","$username","","$namebase");


	
	$email = $_GET['email'];
	function get_file_extension($filename)
    {
      	return PATHINFO($filename, PATHINFO_EXTENSION);
    }

	$sqlcall="SELECT * from users where email='".$email."' ";
	$conaaa=mysqli_query($con,$sqlcall);
	$rowidd=mysqli_fetch_array($conaaa);
	$non = $rowidd['id'];

	$dir= "image/";
	$name = $non;
  	While(!file_exists($dir.$name."."."png"))
  	{
      $name= $name."a";
  	}
 	$name1 = $name."a";

	$filenames= $_FILES['uploaded_image']['tmp_name'];

	$destination= $dir.$name1."."."png";

	if(file_exists($dir.$name."."."png"))
	{
		unlink($dir.$name."."."png");
	}

	if(move_uploaded_file($filenames, $destination)){
		echo "Đã Load ảnh mới";
	}
	else{
		echo "Error";
	}
	$truyenlink = "http://192.168.1.5/appandroid/image/";
    $link = $truyenlink.$name1."."."png";

    $sqladd="UPDATE users SET anh = '$link' where id=".$non;
    $conaa=mysqli_query($con,$sqladd);

?>