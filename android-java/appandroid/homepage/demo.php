<?php 
session_start();
?>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">   
    <link href="https://fonts.googleapis.com/css?family=Alata&display=swap" rel="stylesheet"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
   <style>
   	body{
	width: 100%;
	height: 100%;
	font-family: 'Alata', sans-serif;
	background-color: #E6E6E6;
	}
.navbar
{
  background-color: #10a3cd !important;
   
}
.navbar li a {
    color: white !important;
}
.phanba .row
{
	text-align: center;
}
.phanba .row .gia
{
	font-size: 20px;
	color:  #009fe3;
	font-weight: bold;
}
.phanba .row .giax
{
	font-size: 20px;
	font-weight: bold;
}
.phanba .row .nut
{
	background-color: #009fe3;
	font-size: 20px;
	color: white;
}
footer {
  background-color: #10a3cd ;
  color: #d5d5d5;

}
.row #psau
{
  margin-left:40px;
}
 span.button
{
  background-color: blue;
  color: white;
}
.row #psau #name
{
  margin-left: 40px;
}
.phantam
{
  margin-top:30px;
  font-size:15px;
}
ul
{
  list-style-type: none;
}
.phantam .row ul li a
{
  text-decoration: none;
  color:white;
}
.title
{
  color: black;
  font-weight: bold;
  font-size:15px;
}
#mot a:hover
{
  color: #3cc9c9;
}
.phanchinh .row ul li img
{
  list-style-type: none;
  float: right;
  padding: 3px; 
}
@media screen and (max-width: 576px)
{
  .phanchinh .row #hinhanh
  {
    display: none;
  }
}
@media screen and (max-width: 768px)
{
  .phanchinh .row #hinhanh
  {
    display: none;
  }
}
.navbar li a:hover{
	border: 1px solid;
  box-shadow: inset 0 0 20px rgba(255, 255, 255, 0.5), 0 0 20px rgba(255, 255, 255, 0.2);
  outline-color: rgba(255, 255, 255, 0);
  outline-offset: 15px;
  text-shadow: 1px 1px 2px #427388;
  padding: 5px;
	}
	body{
	width: 100%;
	height: 100%;
	
	background-color: #E6E6E6;
	}
	.carousel-inner img {
	width: 100%;
	height:auto;
	}
	@media (max-width: 576px){
	.carousel.inner img {
	width: 100%;
	} }
	.sax{
	width:100%;
	height:auto;
	}
	.htd{
	border-top: 2px solid rgb(62,44,100) !important;
	width: 90%;
	margin-bottom: 2rem;
	}
	.etc{
  	font-size:400%;
  }
/*Ipad ngang(1024 x 768)*/
@media screen and (max-width: 1024px){
  .etc{
  	font-size:51px;
  }
}
/*Ipad dọc(768 x 1024)*/
@media screen and (max-width: 768px){
    .etc{
  	font-size:30px;
  }
}
/*Tablet nhỏ(480 x 640)*/
@media screen and (max-width: 480px){
    .etc{
  	font-size:20px;
  }
}
/*Iphone(480 x 640)*/
@media screen and (max-width: 320px){
    .etc{
  	font-size:12px;
  }
}
/*Smart phone nhỏ*/
@media screen and (max-width: 240px){
    .etc{
  	font-size:10px;
  }
}

	</style>

</head>
<body>
	
		<?php 
		$con= mysqli_connect("localhost","root","","app");
		mysqli_set_charset($con, 'UTF8');
		if(isset($_SESSION['user'])) 
		{
		$als= "SELECT * from users where email='".$_SESSION['user']."'";
		$ax= mysqli_query($con,$als);
		$row= mysqli_fetch_array($ax);
		}
		if((isset($_SESSION['user']))&&(isset($_SESSION['pass']))&&(isset($_SESSION['admin'])))
		{

		if(($_SESSION['user']==$row['email'])&&($_SESSION['pass']==$row['password'])&&($_SESSION['admin']=='0'))
		{	
		include('layouts/headerlogin.php');
		}
		if(($_SESSION['user']==$row['email'])&&($_SESSION['pass']==$row['password'])&&($_SESSION['admin']=='1'))
		{	
		include('layouts/headerloginadmin.php');
		}
	}
	else include('layouts/header.php');

		?>
		<div class="container-fluid">
		<div class="row" style="background-color: #E6E6E6">
			<div class="col-1 col-sm-1 col-md-1 col-lg-1">
	<img src='images/abc.png'  class="img-thumbnail img-responsiv sticky-top" style="width:auto; height:auto; margin-top:100px; margin-bottom:100px">
		</div>
		<div class="col-10 col-sm-10 col-md-10 col-lg-10">
<div id="slides" class="carousel slide" data-ride="carousel">
	<ul class="carousel-indicators">
		<li data-target="#slides" data-slide-to="0" class="active"></li>
		<li data-target="#slides" data-slide-to="1"></li>
		<li data-target="#slides" data-slide-to="2"></li>
		
	</ul>
	<div class="carousel-inner" class="row">
		<div class="carousel-item active col-xs-12">
			<img src="images/imageslide1.png">	
				
		</div>
		<div class="carousel-item ">
			<img src="images/imageslide2.png">	
				
		</div>
		<div class="carousel-item ">
			<img src="images/imageslide3.png">
				
		</div>

	</div>

</div>
<br><br>
<hr class="htd">

<div class="container-fluid">
    <div class="row">
    	<div class="col-12 col-sm-12 col-md-12 col-lg-12">
    	<div class="jumbotron">
    		
  <span class="badge badge-danger etc" > &nbsp Truyện mới &nbsp </span>
  <br>
  <br>
  <div class="row">
 		<?php 
			
            $qr = "SELECT * FROM truyen ORDER BY id DESC LIMIT 8 ";
            $ds=mysqli_query($con,$qr);
			$dir="../wrb/anh/";
			
			
				while($rowsp= mysqli_fetch_array($ds))
				{
				$dir="../wrb/anh/".$rowsp['id']."/";
				$anhne = $rowsp['id'];
				while (!file_exists($dir.$anhne.".png")) {
					$anhne = $anhne."a";
				}
				?>
				<div class="col-12 col-sm-12 col-md-3 col-lg-3">

					<div class="card" style="width: auto;height: 510px; margin-top: 10px ">
						
					<a href="pages.php?id=<?php echo $rowsp['id'] ?>"><img  class="card-img-top " style="width: 225px ;height: 220px  " src="<?php echo $dir.$anhne?>.png"/></a>
					
					<div style="width: auto;height: 60px; margin-left: 10px; margin-top: 5px ">
					<span style="font-size: 18px; font-weight: bold"><?php echo $rowsp['ten']?></span></div>
					<ul class="list-group list-group-flush"><li class="list-group-item">
					<span style="font-size: 14px; font-weight: bold;"><?php echo number_format($rowsp['luotxem'])?> VIEW</span></li>
					<li class="list-group-item">
						<?php
						echo '<span style="font-size: 18px; font-weight: bold; color:blue">'.$rowsp['likene'].' Like </span>';
						?><br> 
						<?php
						echo '<span style="font-size: 18px; font-weight: bold; color:red">'.$rowsp['unlike'].' Dislike</span>';
					
						?>
					</li>
					</ul>
					<div  style="width: auto;height: 100px; margin-top: 30px ">
					<center>
   					 <a href="pages.php?id=<?php echo $rowsp['id'] ?>" class="card-link"><span style="background-color: #dc3545 !important;font-size: 18px" class="badge badge-secondary ">Xem truyện</span></a>
   							
   					</center>
  					</div>
				</div>
				</div>
		

				<?php 
				}			 
                    ?>
    </div>  
                   
				<?php

				?>
				<br>
  <p class="lead">
  	<div class="text-center"> 
    <a style="background-color: #dc3545 !important;" class="btn btn-primary btn-lg" href="spmoi.php" role="button">Xem thêm</a>
</div>
  </p>
</div>
</div>
 </div>
</div>

<br>
<hr class="htd">
<div class="container-fluid">
    <div class="row">
    	<div class="col-12 col-sm-12 col-md-12 col-lg-12">
    	<div class="jumbotron">
  <span class="badge badge-success etc">  &nbsp Nhiều lượt xem &nbsp </span>
 <br>
  <br>
  <div class="row">
 		<?php 
			
            $qr = "SELECT * FROM truyen ORDER BY luotxem DESC LIMIT 8 ";
            $ds=mysqli_query($con,$qr);
			$dir="../wrb/anh/";
			
			
				while($rowsp= mysqli_fetch_array($ds))
				{
				$dir="../wrb/anh/".$rowsp['id']."/";
				$anhne = $rowsp['id'];
				while (!file_exists($dir.$anhne.".png")) {
					$anhne = $anhne."a";
				}
				?>
				<div class="col-12 col-sm-12 col-md-3 col-lg-3">

					<div class="card" style="width: auto;height: 510px; margin-top: 10px ">
						
					<a href="pages.php?id=<?php echo $rowsp['id'] ?>"><img  class="card-img-top " style="width: 225px ;height: 220px  " src="<?php echo $dir.$anhne?>.png"/></a>
					
					<div style="width: auto;height: 60px; margin-left: 10px; margin-top: 5px ">
					<span style="font-size: 18px; font-weight: bold"><?php echo $rowsp['ten']?></span></div>
					<ul class="list-group list-group-flush"><li class="list-group-item">
					<span style="font-size: 14px; font-weight: bold;"><?php echo number_format($rowsp['luotxem'])?> VIEW</span></li>
					<li class="list-group-item">
						<?php
						echo '<span style="font-size: 18px; font-weight: bold; color:blue">'.$rowsp['likene'].' Like </span>';
						?><br> 
						<?php
						echo '<span style="font-size: 18px; font-weight: bold; color:red">'.$rowsp['unlike'].' Dislike</span>';
					
						?>
					</li>
					</ul>
					<div  style="width: auto;height: 100px; margin-top: 30px ">
					<center>
   					 <a href="pages.php?id=<?php echo $rowsp['id'] ?>" class="card-link"><span style="background-color: #dc3545 !important;font-size: 18px" class="badge badge-secondary ">Xem truyện</span></a>
   							
   					</center>
  					</div>
				</div>
				</div>
		

				<?php 
				}			 
                    ?>
    </div>  
                   
				<?php

				?>
				<br>
  <p class="lead">
  	<div class="text-center"> 
    <a style="background-color: #28a745 !important;" class="btn btn-primary btn-lg" href="banchay.php" role="button">Xem thêm</a>
</div>
  </p>
</div>
</div>
 </div>
</div>

<br>
<hr class="htd">
<div class="container-fluid">
    <div class="row">
    	<div class="col-12 col-sm-12 col-md-12 col-lg-12">
    	<div class="jumbotron">
  <span class="badge badge-primary etc"> &nbsp Tất cả truyện &nbsp </span>
  <br>
  <br>
  <div class="row">
 		<?php 
			
            $qr = "SELECT * FROM truyen LIMIT 12 ";
            $ds=mysqli_query($con,$qr);
	
			
			
				while($rowsp= mysqli_fetch_array($ds))
				{
				$dir="../wrb/anh/".$rowsp['id']."/";
				$anhne = $rowsp['id'];
				while (!file_exists($dir.$anhne.".png")) {
					$anhne = $anhne."a";
				}
				?>
				<div class="col-12 col-sm-12 col-md-3 col-lg-3">

					<div class="card" style="width: auto;height: 510px; margin-top: 10px ">
						
					<a href="pages.php?id=<?php echo $rowsp['id'] ?>"><img  class="card-img-top " style="width: 225px ;height: 220px  " src="<?php echo $dir.$anhne?>.png"/></a>
					
					<div style="width: auto;height: 60px; margin-left: 10px; margin-top: 5px ">
					<span style="font-size: 18px; font-weight: bold"><?php echo $rowsp['ten']?></span></div>
					<ul class="list-group list-group-flush"><li class="list-group-item">
					<span style="font-size: 14px; font-weight: bold;"><?php echo number_format($rowsp['luotxem'])?> VIEW</span></li>
					<li class="list-group-item">
						<?php
						echo '<span style="font-size: 18px; font-weight: bold; color:blue">'.$rowsp['likene'].' Like </span>';
						?><br> 
						<?php
						echo '<span style="font-size: 18px; font-weight: bold; color:red">'.$rowsp['unlike'].' Dislike</span>';
					
						?>
					</li>
					</ul>
					<div  style="width: auto;height: 100px; margin-top: 30px ">
					<center>
   					 <a href="pages.php?id=<?php echo $rowsp['id'] ?>" class="card-link"><span style="background-color: #dc3545 !important;font-size: 18px" class="badge badge-secondary ">Xem truyện</span></a>
   							
   					</center>
  					</div>
				</div>
				</div>
		

				<?php 
				}			 
                    ?>
    </div>  
                   
				<?php

				?>
				<br>
  <p class="lead">
  	<div class="text-center"> 
    <a style="background-color: #007bff !important;" class="btn btn-primary btn-lg" href="Product.php" role="button">Xem thêm</a>
</div>
  </p>
</div>
</div>
 </div>
</div>







		</div>
		<div class="col-1 col-sm-1 col-md-1 col-lg-1">
	<img src='images/bcd.png'  class="img-thumbnail img-responsiv sticky-top" style="width:auto; height:auto; margin-top:100px; margin-bottom:100px">
		</div>
	</div >
<footer>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12" >
        
      </div>
    </div>
    <div class="phantam">
    <div class="row">
      <div class="col-12 col-sm-4 col-md-4 col-lg-4" id="mot">
        <ul>
          <li class="title">Company</li>
          <li><a href="">About Us</a></li>
          <li><a href="">Blog</a></li>
          <li><a href="">Trade Registration</a></li>
          <li><a href="">Contacts</a></li>
          <li><a href="">Sitemap</a></li>
        </ul>
      </div>
      <div class="col-12 col-sm-4 col-md-4 col-lg-4" id="mot">
        <ul>
          <li class="title">Customer Service</li>
          <li><a href="">Delivery Information</a></li>
          <li><a href="">Terms & Conditions</a></li>
          <li><a href="">Privacy Policy</a></li>
        </ul>
      </div>
      
      <div class="col-12 col-sm-4 col-md-4 col-lg-4" id="mot">
        <ul>
          <li class="title">Constantine Stores Ltd</li>
          <li><i class="fa fa-map" aria-hidden="true"></i>133 Nguyễn Minh Châu, Quận Ngũ Hành Sơn, Đà Nẵng</li>
          <li><i class="fa fa-phone" aria-hidden="true"></i>(+44) 096 41 99 811 </li>
          <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="">ddah@gmail.com</a></li>
        </ul>
      </div>
    </div>
</div>

    <div class="phanchinh">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
          <small>© Copyright DDaH Read Online – 01326 340226</small>
        </div>
        
      </div>
    </div>
  </div>  
  </div>
</footer>


</body>
</html>
