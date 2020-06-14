<?php
session_start() ; 
header("Access-Control-Allow-Origin: *");
$servername = "localhost";
$servername =$_SESSION["servername"] ; 
$password = $_SESSION["password"] ;
$dbname =$_SESSION["dbname"] ;
$username=$_SESSION["username"] ; 
$myform_id = $_POST["id"] ; 
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = 'UPDATE titres_data SET 	titres_data_source="" WHERE 	titres_data_id="'.$myform_id.'"';

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}
$conn->close();
?>