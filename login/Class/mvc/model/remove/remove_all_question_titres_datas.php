<?php
session_start() ; 
header("Access-Control-Allow-Origin: *");
$servername = "localhost";
$servername =$_SESSION["servername"] ; 
$password = $_SESSION["password"] ;
$dbname =$_SESSION["dbname"] ;
$username=$_SESSION["username"] ; 
$myform_id = $_POST["myform_id"] ; 





$myform_id =  $_POST["myform_id"];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to delete a record
$sql = 'DELETE FROM titres_data WHERE 		titres_data_id="'.$myform_id.'"';

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();









?>