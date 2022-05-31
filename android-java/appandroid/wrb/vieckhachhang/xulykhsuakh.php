<?php
session_start();
$con= mysqli_connect("localhost","root","","app");
mysqli_set_charset($con, 'UTF8');
if(isset($_GET["ten"]))
      {
          $sql1= "update users set name = '" .$_GET["ten"] ."' where id='".$_SESSION['idsuakh']."'";
          mysqli_query($con, $sql1);
          header("location:giaodienkhachhang.php");
      }
if(isset($_GET["pass"]))
      {
          $sql1= "update users set password = '" .$_GET["pass"] ."' where id='".$_SESSION['idsuakh']."'";
          mysqli_query($con, $sql1);
          header('location:../../homepage/dangxuat.php.php');
      }
if(isset($_GET["email"]))
      {
          $sql1= "update users set email = '" .$_GET["email"] ."' where id='".$_SESSION['idsuakh']."'";
          mysqli_query($con, $sql1);
          header("location:../../homepage/dangxuat.php.php");
      }
      
?>