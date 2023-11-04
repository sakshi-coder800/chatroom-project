<?php
$room=$_POST['room'];

// connecting to the database
include 'db_connect.php';

// Execute sql to check whether room exists 

$sql = "SELECT msg,stime, ip FROM `message` WHERE room = '$room'"; // $roomname given by get parameter 
$res="";
$result =mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0)
{  // fetch all columns
    while($row =mysqli_fetch_assoc($result)){ // '$row' become an array any u can access all details
        $res=$res . '<div class="container">';
        $res=$res . $row['ip'];
        $res=$res . " says <p>" .$row['msg'];
        $res=$res . '</p> <span class="time-right">'.$row["stime"] . '</span></div>'; // this div similar to chat div 
    }
}
echo $res;
?>