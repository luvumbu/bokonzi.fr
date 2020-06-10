<?php
session_start() ; 
header("Access-Control-Allow-Origin: *");
$servername = "localhost";
$servername =$_SESSION["servername"] ; 
$password = $_SESSION["password"] ;
$dbname =$_SESSION["dbname"] ;
$username=$_SESSION["username"] ; 
$myform_id = $_POST["myform_id"] ; 










// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to delete a record
$sql = 'DELETE FROM myform WHERE 	myform_id="'.$myform_id.'"';

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

$sql = 'SELECT * FROM `titre_questions` WHERE `titre_questions_id_myform`  ="'.$myform_id.'"';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
echo '!!!!'.$row["titre_questions_id"] ; 
$titre_questions_id = $row["titre_questions_id"] ;


// Create connection
$connxx3 = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connxx3->connect_error) {
  die("Connection failed: " . $connxx3->connect_error);
}

$sqlxx3 = 'SELECT * FROM `titres_data` WHERE `titres_data_id_questions_id` ="'.$titre_questions_id.'" ';
$result = $connxx3->query($sqlxx3);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
$titres_data_id= $row["titres_data_id"];
echo "ATENTION".$titres_data_id ; 

// Create connection
$connxx4 = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connxx4->connect_error) {
  die("Connection failed: " . $connxx4->connect_error);
}

// sql to delete a record
$sqlxx4 = 'DELETE FROM titres_data WHERE titres_data_id="'.$titres_data_id.'"';

if ($connxx4->query($sqlxx4) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $connxx4->error;
}

$connxx4->close();




















  }
} else {
  echo "0 results";
}
$connxx3->close();
































// Create connection
$connxx1 = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connxx1->connect_error) {
  die("Connection failed: " . $connxx1->connect_error);
}

// sql to delete a record
$sqlxx1 = 'DELETE FROM titre_questions WHERE titre_questions_id_myform="'.$myform_id.'"';

if ($connxx1->query($sqlxx1) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $connxx1->error;
}

$connxx1->close();























  }
} else {

}
$conn->close();

?>