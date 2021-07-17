<?php
$server="localhost";
$username="root";
$password="";
$con=mysqli_connect($server,$username,$password,"grip-bank");
if(!$con){
    die("Connection failed");
} 


$flag=false;

if (isset($_POST['transfer']))
{
$sender=$_POST['sender'];
$receiver=$_POST["reciever"];
$amount=$_POST["amount"];}
$sql = "SELECT Balance FROM users WHERE Name='$sender'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
 
          while($row = $result->fetch_assoc()) {
 if($amount>$row["Balance"] or $row["Balance"]-$amount<100 or $sender==$receiver){
  $location='transaction.php?user='.$sender;
  header("Location: $location&message=transactionDenied");
 }
else{
    $sql = "UPDATE `users` SET Balance=(Balance-$amount) WHERE Name='$sender'";
    

if ($con->query($sql) === TRUE) {
  $flag=true;
} else {
  echo "Error in updating record: " . $conn->error;
}
 }
 
  }
} else {
  echo "0 results";
} 

if($flag==true){
$sql = "UPDATE `users` SET Balance=(Balance+$amount) WHERE Name='$receiver'";

if ($con->query($sql) === TRUE) {
  $flag=true;  
  
} else {
  echo "Error in updating record: " . $con->error;
}
}
if($flag==true){
    $sql = "SELECT * from users where Name='$sender'";
    $result = $con-> query($sql);
    while($row = $result->fetch_assoc())
     {
         $s_acc=$row['ID'];
 }
 
 $sql = "SELECT * from users where Name='$receiver'";
 $result = $con-> query($sql);
 while($row = $result->fetch_assoc())
  {
      $r_acc=$row['ID'];
}        
date_default_timezone_set('Asia/Kolkata'); 
$today =date("Y-m-d H:i:s"); 
$sql = "INSERT INTO `transaction` (`T-ID`, `SENDER NAME`, `SENDER ID`, `RECIEVER NAME`, `RECIEVER ID`, `AMOUNT`,`DATE AND TIME`) VALUES ('','$sender','$s_acc','$receiver','$r_acc','$amount','$today')";
if ($con->query($sql) === TRUE) {
  echo "New record created successfully";
} else 
{
  echo "Error updating record: " . $con->error;
}

}

if($flag==true){
  $location='transaction.php?user='.$sender;
  header("Location: $location&message=success");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Online Bank Serivice</title>
<meta name="viewport" content="width=device-width, initial-scale=1">    
<link rel="stylesheet" href="bootstrap.min.css">
<style>
body{
  background-color:#2b67f8;
}
@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {
    display: none;
  }
  .topnav a.icon {
    float: right;
    display: block;
  }
  
}

@media screen and (max-width: 400px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
  .topnav.responsive .dropdown {float: none;}
  .topnav.responsive .dropdown-content {position: relative;}
  .topnav.responsive .dropdown .dropbtn {
    display: block;
    width: 100%;
    text-align: left;
  }
}
</style>
</head>
<body>
	<script src="jquery.min.js" type="text/javascript"></script>
	<script src="popper.min.js" type="text/javascript"></script>
	<script src="sweetalert.min.js" type="text/javascript"></script>
</body>
</html>
