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
$sql = 'DELETE FROM titre_questions WHERE 		titre_questions_id="'.$myform_id.'"';

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = 'SELECT * FROM `titres_data` WHERE `titres_data_id_questions_id` ="'.$myform_id.'"';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["titres_data_id"];

$titres_data_id = $row["titres_data_id"] ; 



    $myform_id =  $_POST["myform_id"];
    // Create connection
    $connx = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($connx->connect_error) {
      die("Connection failed: " . $connx->connect_error);
    }
    
    // sql to delete a record
    $sqlx = 'DELETE FROM titres_data WHERE 	titres_data_id="'.$titres_data_id.'"';
    
    if ($connx->query($sqlx) === TRUE) {
      echo "Record deleted successfully";
    } else {
      echo "Error deleting record: " . $connx->error;
    }
    
    $connx->close();














  }
} else {
  echo "0 results";
}
$conn->close();














?>