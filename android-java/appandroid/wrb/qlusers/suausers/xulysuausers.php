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
if(isset($_GET["ten"]))
      {
          $sql1= "update users set name = '" .$_GET["ten"] ."' where id='".$_SESSION['id']."'";
          mysqli_query($con, $sql1);
      }
if(isset($_GET["email"]))
      {
          $sql1= "update users set email = '" .$_GET["email"] ."' where id='".$_SESSION['id']."'";
          mysqli_query($con, $sql1);
      }
if(isset($_GET["mk"]))
      {
          $sql1= "update users set password = '" .$_GET["mk"] ."' where id='".$_SESSION['id']."'";
          mysqli_query($con, $sql1);
      }
      header("location:../qlusers.php");
?>