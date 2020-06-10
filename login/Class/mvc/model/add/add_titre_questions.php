<?php
session_start() ; 
header("Access-Control-Allow-Origin: *");
$servername = "localhost";
// Create connection
echo "Connected successfully  Table child s";
$input_title =  $_POST["input_title"] ; 
$input_description =  $_POST["input_description"] ;
$servername =$_SESSION["servername"] ; 
$password = $_SESSION["password"] ;
$dbname =$_SESSION["dbname"] ;
$username=$_SESSION["username"] ; 
$id =$_SESSION["login_id"];
$id_number_ = $_POST["id_number_"];
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = 'UPDATE myform SET myform_title="'.$input_title.'" , myform_description="'.$input_description.'"    WHERE myform_id="'.$id_number_.'"';
if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}
$conn->close();
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO titre_questions (titre_questions_id_myform,titre_questions_id_user,titre_questions_type)
VALUES ('$id_number_','$id','square')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
