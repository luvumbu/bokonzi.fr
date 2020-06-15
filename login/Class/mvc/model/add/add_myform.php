<?php
session_start() ; 
header("Access-Control-Allow-Origin: *");
$servername = "localhost";
// Create connection
echo "Connected successfully";
$servername =$_SESSION["servername"] ; 
$password = $_SESSION["password"] ;
$dbname =$_SESSION["dbname"] ;
$username=$_SESSION["username"] ; 
$id =$_SESSION["login_id"] ; 
echo $id; 
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO myform (myform_id_user, myform_title, myform_description)
VALUES ('$id', '', '')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
$servername =$_SESSION["servername"] ; 
$password = $_SESSION["password"] ;
$dbname =$_SESSION["dbname"] ;
$username=$_SESSION["username"] ; 
$ip =  $_SESSION["ip"]  ; 
$id =$_SESSION["login_id"]; 
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = 'SELECT  MAX(`myform_id`) FROM `myform` WHERE `myform_id_user`="'.$id.'"';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    $_SESSION["max_myform_id"]  =$row["MAX(`myform_id`)"] ;  
  }
} else {
  echo "0 results";
}
$conn->close();
?>
