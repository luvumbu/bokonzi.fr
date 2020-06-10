<?php
session_start() ; 
header("Access-Control-Allow-Origin: *");
echo "ADD titre data";

$id_parent= $_POST["id_parent"];
$id= $_POST["id"];
$servername = "localhost";


$servername =$_SESSION["servername"] ; 
$password = $_SESSION["password"] ;
$dbname =$_SESSION["dbname"] ;
$username=$_SESSION["username"] ; 
$login_id=$_SESSION["login_id"] ;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO titres_data (titres_data_id_user,titres_data_id_questions_id)
VALUES ('$login_id', '$id_parent')";
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
