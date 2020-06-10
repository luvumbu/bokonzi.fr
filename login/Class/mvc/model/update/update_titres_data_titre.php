<?php
session_start() ; 
header("Access-Control-Allow-Origin: *");
$servername = "localhost"; 
$servername =$_SESSION["servername"] ; 
$password = $_SESSION["password"] ;
$dbname =$_SESSION["dbname"] ;
$username=$_SESSION["username"] ; 
$titre_questions_id =  $_POST["titre_questions_id"];  
$titres_data_titre=  $_POST["titres_data_titre"]; 
echo $titre_questions_id ;
echo $titres_data_titre ; 
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = 'UPDATE titres_data SET 	titres_data_titre="'.$titres_data_titre.'" WHERE 	titres_data_id="'.$titre_questions_id.'" ' ;

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}
$conn->close();
?>
