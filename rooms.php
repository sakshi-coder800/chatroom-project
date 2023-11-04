<?php

    // Get Parameters  
    $roomname =$_GET['roomname'];
    // connecting to the database
    include 'db_connect.php';

    // Execute sql to check whether room exists 
    $sql = "SELECT * FROM `rooms` WHERE roomname = '$roomname'"; // $roomname given by get parameter 
    $result =mysqli_query($conn, $sql);
    if($result){
        // check if room exists 
        // if result return 1 

        if(mysqli_num_rows($result) == 0){  // this function says how many query return by this function 
          // here 0 means they return no room
            $message="This room does not exist. Try creating a new one";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost/chatroom";';
            echo '</script>';
        }
    }
    else {
        echo "Error :".mysqli_error($conn);
    }
    //  echo "let's chat now";


?>
 <!-- now display the chat room  -->
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="product.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" >
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" ></script>     
  <style>
      body {
        margin: 0 auto;
        /* max-width: 800px; */
        padding: 0 20px;
      }
      .c-msg{
        max-width :800px; margin: 0 auto;
      }

      .container {
        border: 2px solid #dedede;
        background-color: #f1f1f1;
        border-radius: 5px;
        padding: 10px;
        margin: 10px 0;
      }

      .darker {
        border-color: #ccc;
        background-color: #ddd;
      }

      .container::after {
        content: "";
        clear: both;
        display: table;
      }

      .container img {
        float: left;
        max-width: 60px;
        width: 100%;
        margin-right: 20px;
        border-radius: 50%;
      }

      .container img.right {
        float: right;
        margin-left: 20px;
        margin-right:0;
      }

      .time-right {
        float: right;
        color: #aaa;
      }

      .time-left {
        float: left;
        color: #999;
      }

      .anyClass{
      height:350px;
      overflow-y:scroll;}
  </style>
</head>
<body>
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
      <h5 class="my-0 mr-md-auto font-weight-normal">MyAnonymousChat.com</h5>
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="#">Home</a>
        <a class="p-2 text-dark" href="#">About</a>
        <a class="p-2 text-dark" href="#">Contact</a>
      </nav>
    </div>
<h2 class="text-center">Chat Messages - <?php  echo  $roomname; ?></h2>
<div class="c-msg">
    <div class="container">
      <div class="anyClass">
      <!-- <img src="images/u1.png" alt="Avatar" style="width:100%;">
      <p>Hello. How are you today?</p>
      <span class="time-right">11:00</span> -->
    </div> </div>
<input type="text" class="form-control" name="usermsg" id="usermsg" placeholder="Add Message"> <br>
 <button class="btn btn-default" name="submitmsg" id="submitmsg"> Send</button> 
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
  
// check for new messages every 1 seconds 
setInterval(runfunction, 10);
function runfunction(){
   $.post("htcont.php",{room:'<?php echo $roomname ;?>'},
   function(data,stauts){
document.getElementsByClassName('anyClass')[0].innerHTML=data;});
      
   }



/* --------------- using enter key to submit  vredit goes to w3school-------------------------- */
 // Get the input field
 var input = document.getElementById("usermsg");
input.addEventListener("keypress", function(event) {
  if (event.key === "Enter") { //(event.keyCode === 13)
    event.preventDefault();
    document.getElementById("submitmsg").click();
  }
});

//  jquery syntax for post request  
// if user submit the form 
// post request
$("#submitmsg").click(function(){
var clientmsg=$("#usermsg").val(); 

  $.post("postmsg.php",{text:clientmsg,room:'<?php  echo $roomname; ?>', ip: '<?php  echo $_SERVER['REMOTE_ADDR']; ?>'}, // here 'text' = post parameter and 'clientmsg'= its value 
  // 2nd post parameter that is 'room' and its value is  '$roomname'
  // 3rp post rewquest is 'ip address'
  function (data,status) { 
  document.getElementsByClassName('anyClass')[0].innerHTML=data; // bcz they return an array 

  });

$("#usermsg").val("");
  return false;
  });
</script>



</body>
</html>
