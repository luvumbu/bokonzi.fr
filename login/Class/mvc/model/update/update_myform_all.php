<?php
session_start() ; 
header("Access-Control-Allow-Origin: *");
echo "Bonjour ok" ; 
$servername =$_SESSION["servername"] ; 
$password = $_SESSION["password"] ;
$dbname =$_SESSION["dbname"] ;
$username=$_SESSION["username"] ; 
 
$id =$_SESSION["login_id"] ; 
$idform = $_POST["idform"];
 




//	myform_id_user

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO titre_questions (titre_questions_id_myform,titre_questions_id_user)
VALUES ('$idform', '$id')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();




?>