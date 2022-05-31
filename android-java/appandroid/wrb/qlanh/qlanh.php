<?php
session_start();

$host = "localhost";
$namebase = "app";
$pass1 = "v~oT(I$";
$pass2= "SL!]7Dhpe";
$pass= $pass1.$pass2;
$username = "root";
if(isset($_GET["idchap"]))
{
$_SESSION['idchap']=$_GET["idchap"];
}
$con= mysqli_connect("$host","$username","","$namebase");
mysqli_set_charset($con, 'UTF8');
$_SESSION['id']='0';
if(isset($_GET["trang"]))
{
	$trang =$_GET["trang"];
	settype($trang, "int");

}else{
	$trang = 1;
}
?>
<!DOCTYPE html>
<html lang="en">
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
    <link href="../csss/font-awesome.min.css" rel="stylesheet">
    <link href="../csss/bootstrap.min.css" rel="stylesheet">
    <link href="../csss/templatemo-style.css" rel="stylesheet">
    
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
          <img src="../qltruyen/image/profile-photo.jpg" alt="Profile Photo" class="img-responsive">  
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
            <li><a href="../qltruyen/qltruyen.php" ><i class="fa fa-home fa-fw"></i>Quản lí Truyện</a></li>
            <li><a href="../qlchap/qlchap.php" ><i class="fa fa-dashboard fa-fw"></i>Quản lí Chap</a></li>
            <li><a href="../qlusers/qlusers.php"><i class="fa fa-users fa-fw"></i>Quản Lí khách hàng</a></li>
            <li><a href="../dangxuat.php"><i class="fa fa-eject fa-fw"></i>Đăng xuất </a></li>
          </ul>  
        </nav>
      </div>
      <!-- Main content --> 
      <div class="templatemo-content col-1 light-gray-bg">
        <div class="templatemo-top-nav-container">
          <div class="row">
            <nav class="templatemo-top-nav col-lg-12 col-md-12">
              <ul class="text-uppercase">
                <li><a href="../qltruyen/qltruyen.php" class="active">Quản lí</a></li>
              </ul>  
            </nav> 
          </div>
        </div>
    
        <div class="templatemo-content-container">
          <div class="templatemo-content-widget no-padding">
            <div class="panel panel-default table-responsive">
           	<br>
           	<div class="text-center"><a href="#" class="templatemo-edit-btn">Danh sách Ảnh</a>
           		<a href="themanh/themanh.php" class="templatemo-edit-btn">Thêm Ảnh</a></div>
            <br>
            <br>
              <div class="text-center"><h1>Danh sách Ảnh</h1></div>
              <br>
              <table class="table table-striped table-bordered templatemo-user-table">
                <thead>
                  <tr>
                  	
                    <td class="text-center">ID </td>
                    <td class="text-center">Ảnh </td>
                    <td class="text-center">Sửa</td>
                    <td class="text-center">Xóa</td>

                  </tr>
                </thead>
                <tbody>
                 
                                  
                  <?php 
                  $sotin1trang = 9;
                  $from = ($trang - 1  ) * $sotin1trang;
                  if($from<0) $from=0;
                  $qr = "SELECT * FROM anh where idchap=".$_SESSION['idchap']." LIMIT $from, $sotin1trang";
                  $ds=mysqli_query($con,$qr);
                  $dir="../anh/".$_SESSION['idtruyen']."/".$_SESSION['idchap']."/";
                  $xoa="Xóa Thành công";
                      while ($row=mysqli_fetch_array($ds))
                      {
                        
                        $from++;
                      $name= $row['id'];
                      While(!file_exists($dir.$name."."."png"))
                       {
                         $name= $name."a";
                        } 

                          echo"<tr>";
                           echo'<td class="text-center">'.$from.'</td>';
                           echo'<td class="text-center"><div class="text-center"><img src="'.$dir.$name.'.png" class="img-fluid img-thumbnail img-responsive" style="width:auto; height:200px;"><br>
                           </a></div></td>';
                           echo'<td class="text-center"><a href="suaanh/suaanh.php?id='.$row['id'].'" class="templatemo-edit-btn" style="color:blue">Sửa</a></td>';
                           echo'<td class="text-center"><a href="deleteanh.php?id='.$row['id'].'" class="templatemo-edit-btn" style="color:red" onclick= "alert('.$xoa.');">Xóa</a></td>';
                            echo"</tr>";
                      }
                        
                  ?>

                </tbody>
              </table> 
				<div class="pagination-wrap">
            <ul class="pagination">
            	<?php
				$x = mysqli_query($con,"SELECT * FROM anh where idchap=".$_SESSION['idchap']."");
				$tongsotin = mysqli_num_rows($x);
				$sotrang = ceil($tongsotin / $sotin1trang);
				for($t=1; $t<=$sotrang; $t++){
				echo "<li><a href='qlanh.php?trang=$t'>$t</a></li>";
				}
					?>
            </ul>
          </div>   
            </div>                          
          </div>     
          </div>     
        
    <!-- JS -->
    <script type="text/javascript" src="jss/jquery-1.11.2.min.js"></script>      <!-- jQuery -->
    <script type="text/javascript" src="jss/templatemo-script.js"></script>      <!-- Templatemo Script -->
    <script>
      $(document).ready(function(){
        // Content widget with background image
        var imageUrl = $('img.content-bg-img').attr('src');
        $('.templatemo-content-img-bg').css('background-image', 'url(' + imageUrl + ')');
        $('img.content-bg-img').hide();        
      });
    </script>
  </body>
</html>