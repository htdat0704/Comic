<?php
session_start();
$host = "localhost";
$namebase = "app";
$pass1 = "v~oT(I$";
$pass2= "SL!]7Dhpe";
$pass= $pass1.$pass2;
$username = "root";


class Truyen {
    function __construct($id,$ten,$chap,$anh,$noidung,$luotxem,$likene,$unlike){
    	$this->id=$id;
        $this->ten=$ten;
        $this->chap=$chap;
        $this->anh=$anh;
        $this->noidung=$noidung;
        $this->luotxem=$luotxem;
        $this->likene=$likene;
        $this->unlike=$unlike;
    }
}
$conn = mysqli_connect("$host","$username","","$namebase");
mysqli_set_charset($conn,'utf8');

$sql = "SELECT * from truyen ORDER BY id DESC";
$query = mysqli_query($conn,$sql);

$arr = array();

while($row = mysqli_fetch_array($query)){
    $id = $row['id'];
    $ten = $row['ten'];
    $chap = $row['chap'];
    $anh = $row['anh'];
    $nd = $row['noidung'];
    $lxem = number_format($row['luotxem']);
    $like = $row['likene'];
    $un = $row['unlike'];
    
    array_push($arr,new Truyen($id,$ten,$chap,$anh,$nd,$lxem,$like,$un));
    
}

$json = json_encode($arr);
echo $json;


?>