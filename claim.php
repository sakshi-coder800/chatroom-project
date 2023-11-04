<?php
// Getting the value of post parameters
$room =$_POST['room'];
// checking for string size 
if(strlen($room)>20 or strlen($room)<5){
    $message="please choose a name between 5 to 20 characters";
    echo '<script language="javascript">';
    echo 'alert("'.$message.'");';
    echo 'window.location="http://localhost/chatroom";';
    echo '</script>';
}
// checking whether the room name is alphanumeric // without space
else if(!ctype_alnum($room)){
    $message ="please choose an alphanumeric room name";
    echo '<script language="javascript">';
    echo 'alert("'.$message.'");';
    echo 'window.location="http://localhost/chatroom";';
    echo '</script>';
}
else{
    // connecting to the database
    include 'db_connect.php';
}

echo "let's chat now";

// check if room already exists 
$sql ="SELECT *FROM `rooms` WHERE roomname='$room'"; 
$result =mysqli_query($conn,$sql); // execute the sql query
if($result){
    if(mysqli_num_rows($result)>0 ){ // this function return number of rows  // means how many rows return with this if this is greater than 0 
        $message="please choose a different room name. This room is already  claimed";
        echo '<script language="javascript">';
        echo 'alert("'.$message.'");';
        echo 'window.location="http://localhost/chatroom";';
        echo '</script>';
    } 
    else{ 
        // bcz room already not inserted so we insert a room
        $sql = "INSERT INTO `rooms` (`roomname`, `stime`) VALUES ('$room', CURRENT_TIMESTAMP);"; // store data in database
        if(mysqli_query($conn,$sql)){ // execute the query

            $message="Your room is ready and you can chat now !";
            echo '<script language="javascript">';
            // echo "plese send me or move me";
            echo 'alert("'.$message.'");';
            // echo 'window.location="http://localhost/all php project/chatroom/rooms.php?roomname='.$room.'";';  // after creating a room move to user in room page 
            echo 'window.location="http://localhost/php xampp projects all/chatroom/rooms.php?roomname='.$room.'";';  // after creating a room move to user in room page 

            echo '</script>';    
        }
            // echo "plese send me or move me";

    }
}
else {
    echo "Error :".mysqli_error($conn);
}
?>



