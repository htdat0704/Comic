<?php
session_start();
$con= mysqli_connect("localhost","root","","app");
mysqli_set_charset($con, 'UTF8');

$user=$_GET['email'];
$_SESSION['idu']=$_GET['email'];
$mk=$_GET['mk'];
$ten=$_GET['ten'];
$admin="0";

$sql="INSERT INTO users(email, password, name, idadmin) VALUES('$user','$mk','$ten','$admin')";
$ketqua=mysqli_query($con,$sql);
header('location:dangnhap.php');

?>