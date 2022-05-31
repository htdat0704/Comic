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

$_SESSION["id"] = $_GET['id'] ;
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
          <img src="../image/profile-photo.jpg" alt="Profile Photo" class="img-responsive">  
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
            <li><a href="../qltruyen.php" ><i class="fa fa-home fa-fw"></i>Quản lí Truyện</a></li>
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
                <li><a href="../qltruyen.php" class="active">Quản lí</a></li>
              </ul>  
            </nav> 
          </div>
        </div>
 <div class="templatemo-content-container">
          <div class="templatemo-content-widget no-padding">
            <br>
              <div class="text-center"><h1>Sửa thông tin truyện</h1></div>
            <br>
          	<?php 
          	$qlkhs="select * from truyen where id=".$_SESSION['id']; 
          	$roa= mysqli_query($con,$qlkhs);
          	$row= mysqli_fetch_array($roa);
          	?>
          	<div class="container">
        	<form class="form-horizontal" action="xulysuatruyen.php" method="get">
        	<div class="form-group">
       		<label class="control-label col-sm-2" >Tên Truyện:</label>
        	<div class="col-sm-7">
        	<input  type="text" class="form-control" name="sp" placeholder="<?php echo $row["ten"]; ?>"><input onclick= "alert('Sửa thành công');" type="submit" value="Thay đổi">      
        	</div>
        	</div>
        	</form>
    	</div>
        <div class="container">
            <form class="form-horizontal" action="xulysuatruyen.php" method="get">
            <div class="form-group">
            <label class="control-label col-sm-2" >Nội dung truyện:</label>
            <div class="col-sm-7">
            <input  type="text" class="form-control" name="mtsp" placeholder="<?php echo $row["noidung"]; ?>"><input onclick= "alert('Sửa thành công');" type="submit" value="Thay đổi">      
            </div>
            </div>
            </form>
        </div>
        <div class="container">
            <form class="form-horizontal" action="xulysuatruyen.php" method="get">
            <div class="form-group">
            <label class="control-label col-sm-2" >Lượt thích:</label>
            <div class="col-sm-7">
            <input  type="number" class="form-control" name="likene" placeholder="<?php echo $row["likene"]; ?>"><input onclick= "alert('Sửa thành công');" type="submit" value="Thay đổi">      
            </div>
            </div>
            </form>
        </div>
        <div class="container">
            <form class="form-horizontal" action="xulysuatruyen.php" method="get">
            <div class="form-group">
            <label class="control-label col-sm-2" >Lượt không thích:</label>
            <div class="col-sm-7">
            <input  type="number" class="form-control" name="unlike" placeholder="<?php echo $row["unlike"]; ?>"><input onclick= "alert('Sửa thành công');" type="submit" value="Thay đổi">      
            </div>
            </div>
            </form>
        </div>
    </div>
    <div class="container">
            <form class="form-horizontal" action="suaanhtruyen.php" method="post" >
            <div class="form-group">
            <label class="control-label col-sm-7" >Tải ảnh mới >>> </label>
            <div class="col-sm-2">
            <input class="templatemo-edit-btn"  type="submit" value="Tải ảnh">      
            </div>
            </div>
            </form>
        </div>


          	
 </div>
</div>
</div>

</body>
</html>