<?php
session_start();

if(isset($_GET["trang"]))
{
	$trang =$_GET["trang"];
	settype($trang, "int");

}else{
	$trang = 1;
}
?>
<html lang="en">
<head>
	<meta charset="UTF-8">	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="//cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Alata&display=swap" rel="stylesheet">
    <style>
    	html, body {
	width: 100%;
	height: 100%;
	font-family: 'Alata', sans-serif;
	font-size: 18px;
	color: #222;
}
.navbar
{
	background-color:  #10a3cd !important;
	 
}
.navbar li a {
    color: white !important;
}
.phanmot
{
	background-color: #009fe3;
	display:block;
	color: #ffffff;
	text-align: center;
}
ul
{
	list-style-type: none;
}
.phanhai li a
{
	float: left;
	text-decoration: none;
	color: black;
	margin-top:0;
	padding: 5px;
}
.phanhai a:hover
{
	color: #009fe3;
}
.phanba div a
{
	text-decoration: none;
	color: black;
	position: absolute;
	left:44px;
	margin-top:15px;
	border: 1px solid black;
	background-color: #f4f4f4 ! important;
}
.phanba a:hover
{
	background-color: #009fe3 ! important;
}

.phanbon .row span.hop
{
	border: 1px solid black;
}

.phanbon .row .giamgia
{
	text-align: center;
	border: 1px solid black;
	border-radius: 20px;
	background-color: #b2b2b2 !important
}
.view a:hover
{
	background-color: #009fe3;
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
.nut
{
	background-color: #009fe3;
	font-size: 20px;
	color: white;
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

.panel{
	margin-bottom:20px;
	background-color:#fff;
	border:1px solid transparent;
	border-radius:4px;
	-webkit-box-shadow:0 1px 1px rgba(0,0,0,.05);
	box-shadow:0 1px 1px rgba(0,0,0,.05)
}
.panel-body{
	padding:15px
}
.panel-heading{
	padding:10px 15px;
	border-bottom:1px solid transparent;
	border-top-left-radius:3px;
	border-top-right-radius:3px}
.panel-footer{
	padding:10px 12px;
	background-color:#f5f5f5;
	border-top:1px solid #ddd;
	border-bottom-right-radius:3px;
	border-bottom-left-radius:3px
}
.panel-default{
	border-color:#ddd
	}
.panel-default>.panel-heading{
	color:#333;
	background-color:#f5f5f5;
	border-color:#ddd
	}
.panel-default>.panel-heading+.panel-collapse>.panel-body{
	border-top-color:#ddd
	}
.panel-default>.panel-heading .badge{
	color:#f5f5f5;
	background-color:#333
	}
.panel-default>.panel-footer+.panel-collapse>.panel-body{
		border-bottom-color:#ddd
	}
    </style>
</head>
<body>
	<?php 
		$_SESSION['idtruyen']=$_GET['id'];
		$id=$_GET['id'];
		$con=mysqli_connect("localhost","root","","app");
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

		$sql ="SELECT * from truyen where id='$id'";
	 	mysqli_set_charset($con, 'UTF8');
	 	$ketqua=mysqli_query($con,$sql);
	 	$dong=mysqli_fetch_array($ketqua);
	 	$dir="../wrb/anh/".$_GET['id']."/";
	 	$anhne = $_GET['id'];
		while (!file_exists($dir.$anhne.".png")) {
			$anhne = $anhne."a";
		}
		?>
		<div class="container-fluid">
		<div class="row" style="background-color: #E6E6E6">
			<div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xs-1">
	<img src='images/abc.png'  class="img-thumbnail img-responsiv sticky-top" style="width:auto; height:auto; margin-top:100px; margin-bottom:100px">
		</div>
		<div class="col-10 col-sm-10 col-md-10 col-lg-10">
			
				<a   href="product.php"><button type="button" class="btn btn-link" style="border-color:white!important"><i  class="fa fa-mail-reply-all"></i> </button></a>
			
<!--content-->
<div class="phanbon">
	
		<div class="row">
			<div class="col-12 col-sx-12 col-sm-12 col-md-12 col-lg-4">
				<img class="img-fluid img-thumbnail img-responsive" style="width:380px; height:300px" src="<?php echo $dir.$anhne?>.png"/>

			</div>
			<div class="col-12 col-sx-12 col-sm-12 col-md-12 col-lg-4">
				<p ><span style="font-size: 22px; font-weight: bold;"><?php echo $dong['ten'] ?></span><br></p>
				<p ><span style="font-size: 20px; font-weight: bold;"><?php echo number_format($dong['luotxem']) ?> lượt xem</span></p>
					<p > <span style="font-size: 20px;font-style: bold ;font-weight: bold;">Mô tả truyện:</span><br><span style="font-size: 18px;"><?php echo $dong['noidung'] ?></span></p>
				
				
			</div>
				<div class="col-12 col-sx-12 col-sm-12 col-md-12 col-lg-4">
		
				<ul class="list-group list-group-flush">
				<?php
				$sotin1trang = 10;
           		$from = ($trang - 1  ) * $sotin1trang;
            	if($from<0) $from=0;
            	$qr = "SELECT * FROM chap where idtruyen = $id LIMIT $from, $sotin1trang";
            	$ds=mysqli_query($con,$qr);
            	while($rowsp= mysqli_fetch_array($ds))
      			   {  ?>
      				<li class="list-group-item">
      				<a href="doctruyen.php?id=<?php echo $rowsp['id'] ?>">
					<span style="font-size: 15px; font-weight: bold;"><?php echo ($rowsp['tentruyen'])?></span></li>
					</a>
					
      			
      			<?php
      			}
				?>
				
			</div>
					
	</div>
</div>

</div>
<div class="col-1 col-sm-1 col-md-1 col-lg-1">
	<img src='images/bcd.png'  class="img-thumbnail img-responsiv sticky-top" style="width:auto; height:auto; margin-top:100px; margin-bottom:100px">
		</div>
		</div class="row" >
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
        <div class="col-12 col-sm-6 col-md-6 col-lg-6">
          <small>© Copyright DDaH Buy Online – 01326 340226</small>
        </div>
      </div>
    </div>
  </div>  
  </div>
</footer>


<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</script>
</body>
</html>