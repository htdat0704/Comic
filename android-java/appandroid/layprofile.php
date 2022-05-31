<?php
session_start();
$host = "localhost";
$namebase = "app";
$pass1 = "v~oT(I$";
$pass2= "SL!]7Dhpe";
$pass= $pass1.$pass2;
$username = "root";


class profile {
    function __construct($email,$name,$password,$anh){
    	$this->email=$email;
    	$this->name=$name;
        $this->password=$password;
        $this->anh=$anh;
        
    }
}

$name = $_GET['email'];

$conn = mysqli_connect("$host","$username","","$namebase");
mysqli_set_charset($conn,'utf8');

$sql = "SELECT * from users where email = '$name' ";
$query = mysqli_query($conn,$sql);

$arr = array();

while($row = mysqli_fetch_array($query)){
    $id = $row['email'];
    $ten = $row['name'];
    $chap = $row['password'];
    $anh = $row['anh'];
    
    
    array_push($arr,new profile($id,$ten,$chap,$anh));
    
}

$json = json_encode($arr);
echo $json;


?>