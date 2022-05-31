<?php
session_start();
$host = "localhost";
$namebase = "app";
$pass1 = "v~oT(I$";
$pass2= "SL!]7Dhpe";
$pass= $pass1.$pass2;
$username = "root";


class Chp {
    function __construct($id,$ten,$ngaydang,$numbert){
    	$this->id=$id;
        $this->tap=$ten;
        $this->ngaydang=$ngaydang;
        $this->numbert=$numbert;
    }
}

$idtruyen = $_GET['id'];

$conn = mysqli_connect("$host","$username","","$namebase");
mysqli_set_charset($conn,'utf8');

$sql = "SELECT * from chap where idtruyen = $idtruyen ORDER BY numbert DESC";

$query = mysqli_query($conn,$sql);

$arr = array();

while($row = mysqli_fetch_array($query)){
    $id = $row['id'];
    $ten = $row['tentruyen'];
    $chap = $row['ngaydang'];
    $numbert=$row['numbert'];
    
    
    array_push($arr,new Chp($id,$ten,$chap,$numbert));
    
}

$json = json_encode($arr);
echo $json;


?>