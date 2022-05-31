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
if(isset($_GET["sp"]))
      {
          $sql1= "update truyen set ten = '" .$_GET["sp"] ."' where id='".$_SESSION['id']."'";
          mysqli_query($con, $sql1);
      }
if(isset($_GET["mtsp"]))
      {
          $sql1= "update truyen set noidung = '" .$_GET["mtsp"] ."' where id='".$_SESSION['id']."'";
          mysqli_query($con, $sql1);
      }
if(isset($_GET["likene"]))
      {
          $sql1= "update truyen set likene = '" .$_GET["likene"] ."' where id='".$_SESSION['id']."'";
          mysqli_query($con, $sql1);
      }
if(isset($_GET["unlike"]))
      {
          $sql1= "update truyen set unlike = '" .$_GET["unlike"] ."' where id='".$_SESSION['id']."'";
          mysqli_query($con, $sql1);
      }
      header("location:../qltruyen.php");
?>