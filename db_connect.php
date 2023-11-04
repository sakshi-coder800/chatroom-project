<?php
$servername="localhost";
$usernam="root";
$password="";
$database="chatroom";
//  creating databse connection
$conn =mysqli_connect($servername,$usernam,$password,$database);

// check connection 
if(!$conn){
    die("Failed to connect " .mysqli_connect_error());
}
?>