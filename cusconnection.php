<?php
$servername="localhost";
$username="root";
$password="";
$dbname="hema";

$conn=mysqli_connect($servername,$username,$password,$dbname);
if($conn){
//echo "connection ok";
}
else{
    echo "connection failes".mysqli_connect_error();
}
?>