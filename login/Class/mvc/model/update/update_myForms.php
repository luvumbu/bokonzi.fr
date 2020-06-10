<?php
session_start() ; 
header("Access-Control-Allow-Origin: *");
$servername = "localhost";
echo 'titre_questions';
$servername =$_SESSION["servername"] ; 
$password = $_SESSION["password"] ;
$dbname =$_SESSION["dbname"] ;
$username=$_SESSION["username"] ;  
$title =  $_POST["title"];  
$description =  $_POST["description"]; 
$myform_id =  $_POST["myform_id"];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = 'UPDATE myform SET myform_title="'.$title.'", myform_description="'.$description.'" WHERE myform_id="'.$myform_id.'" ' ;

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}
$conn->close();
?>
