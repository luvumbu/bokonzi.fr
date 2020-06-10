<?php
session_start() ; 
header("Access-Control-Allow-Origin: *");
$servername = "localhost";
// Create connection
// echo $_SESSION["max_myform_id"];
// $input_title =  $_POST["input_title"] ; 
// $input_description =  $_POST["input_description"] ; 
echo "UPDATEs  OK pour toute ma" ; 
$servername =$_SESSION["servername"] ; 
$password = $_SESSION["password"] ;
$dbname =$_SESSION["dbname"] ;
$username=$_SESSION["username"] ; 
echo "sa marche" ; 
$id =$_SESSION["login_id"] ;  
$input_id = $_POST["input_id"] ; 
$input_value = $_POST["input_value"] ; 
echo $input_id  ; 
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = 'UPDATE titres_data SET 					titres_data_titre="'.$input_value .'"  WHERE 	titres_data_id="'.$input_id.'"';
if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}
$conn->close();
?>
