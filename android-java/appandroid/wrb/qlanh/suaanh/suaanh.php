<?php
session_start();
$host = "localhost";
$namebase = "app";
$pass1 = "v~oT(I$";
$pass2= "SL!]7Dhpe";
$pass= $pass1.$pass2;
$username = "root";

if(isset($_GET['id'])){
$_SESSION['anh']=$_GET['id'];
}

$con=  mysqli_connect("$host","$username","","$namebase");
mysqli_set_charset($con, 'UTF8');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Visual Admin Dashboard - Manage Users</title>
    <meta name="description" content="">
    <meta name="author" content="templatemo">
    <!-- 
    Visual Admin Template
    https://templatemo.com/tm-455-visual-admin
    -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
    <link href="../../csss/font-awesome.min.css" rel="stylesheet">
    <link href="../../csss/bootstrap.min.css" rel="stylesheet">
    <link href="../../csss/templatemo-style.css" rel="stylesheet">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
<body>
     <div class="templatemo-flex-row">
      <div class="templatemo-sidebar">
        <header class="templatemo-site-header">
          <div class="square"></div>
          <h1>Admin</h1>
        </header>
        <div class="profile-photo-container">
          <img src="../../qltruyen/image/profile-photo.jpg" alt="Profile Photo" class="img-responsive">  
          <div class="profile-photo-overlay"></div>
        </div>      
        <!-- Search box -->
        <form class="templatemo-search-form" role="search">
          <div class="input-group">
              <button type="submit" class="fa fa-search"></button>
              <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">           
          </div>
        </form>
        <div class="mobile-menu-icon">
            <i class="fa fa-bars"></i>
        </div>
        <nav class="templatemo-left-nav">          
          <ul>
            <li><a href="../../qltruyen/qltruyen.php" ><i class="fa fa-home fa-fw"></i>Quản lí Truyện</a></li>
            <li><a href="../../qlchap/qlchap.php" ><i class="fa fa-dashboard fa-fw"></i>Quản lí Chap</a></li>
            <li><a href="../../qlusers/qlusers.php"><i class="fa fa-users fa-fw"></i>Quản Lí khách hàng</a></li>
            <li><a href="../../dangxuat.php"><i class="fa fa-eject fa-fw"></i>Đăng xuất </a></li>
          </ul>  
        </nav>
      </div>
      <!-- Main content --> 
      <div class="templatemo-content col-1 light-gray-bg">
        <div class="templatemo-top-nav-container">
          <div class="row">
            <nav class="templatemo-top-nav col-lg-12 col-md-12">
              <ul class="text-uppercase">
                <li><a href="../../qltruyen/qltruyen.php" class="active">Quản lí</a></li>
              </ul>  
            </nav> 
          </div>
        </div>
 <div class="templatemo-content-container">
          <div class="templatemo-content-widget no-padding">
            <br>
            <div class="text-center"><a href="../qlanh.php?id=<?php echo $_SESSION['idchap']?>" class="templatemo-edit-btn">Danh sách</a>
              <a href="#" class="templatemo-edit-btn">Sửa Ảnh</a>
            <br>
            <br><br>
              <div class="text-center"><h1>Sửa Ảnh</h1></div>
            <br>
            <div class="container">
            	 <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
            <label class="control-label col-sm-2" >Tải ảnh :</label>
            <div class="col-sm-6">
            <input  type="file" class="form-control" name="filename" value=""><br><input  name="submit" type="submit" value="Tải ảnh">    <a href="../qlanh.php" class="templatemo-edit-btn">Bỏ qua</a>  
            </div>
            </div>
            </form>
        
    </div>
<?php
      	function get_file_extension($filename)
      	{
      		return PATHINFO($filename, PATHINFO_EXTENSION);
      	}
      
	$dir='../../anh/'.$_SESSION['idtruyen'].'/'.$_SESSION['idchap'].'/';
  $name = $_SESSION['anh'];
  While(!file_exists($dir.$name."."."png"))
  {
      $name= $name."a";
  }

  $name1 = $name."a";
	if (isset($_POST['submit'])){	
		$filenames= $_FILES['filename']['tmp_name'];
		$duoi= get_file_extension($_FILES['filename']['name']);
		//$name =  $_SESSION['anh'];
		$destination= $dir.$name1."."."png";
		if(($duoi=='jpg')||($duoi=='png')||($duoi=='jpeg')||($duoi=='gif'))
		{
			if(file_exists($dir.$name."."."jpg"))
			{
				unlink($dir.$name."."."jpg");
			}
			if(file_exists($dir.$name."."."png"))
			{
				unlink($dir.$name."."."png");
			}
			if(file_exists($dir.$name."."."jpeg"))
			{
				unlink($dir.$name."."."jpeg");
			}
			if(file_exists($dir.$name."."."gif"))
			{
				unlink($dir.$name."."."gif");
			}	
			move_uploaded_file($filenames, $destination);
			echo "<script type='text/javascript'>alert('Tải ảnh thành công');</script>";
			echo '<div class="text-center" style="color:blue " >Upfile thành công</div>';
			echo '<br><div class="text-center"><a href="../qlanh.php" class="templatemo-edit-btn">Hoàn thành</a></div><br>';
		}
		else{
			echo '<div class="text-center" style="color:red " >file không chấp nhận chỉ chấp nhận đuôi file |jpg|png|jpeg|gif| </div>';
		}
    $truyenlink = "http://192.168.43.231/appandroid/wrb/anh/".$_SESSION['idtruyen']."/".$_SESSION['idchap']."/";
    $link = $truyenlink.$name1."."."png";
    $sqladd="UPDATE anh SET anh = '$link' where id=".$_SESSION['anh'];
    $conaa=mysqli_query($con,$sqladd);
	}
?>


          	
 </div>
</div>
</div>

</body>
</html>