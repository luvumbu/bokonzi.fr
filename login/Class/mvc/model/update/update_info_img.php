<?php
session_start() ; 
header("Access-Control-Allow-Origin: *");
$login = $_SESSION["login_id"] ; 
$aleatoire =$_SESSION["aleatoire"] ;
$submit=  $_SESSION["submit"]; 
//$_SESSION["id"]
// echo $login ; 
// echo $aleatoire ; 
// echo $submit;
$path_file= 'uploads/'.$login.'/'.$submit.'/'.$aleatoire;
$servername =$_SESSION["servername"] ; 
$password = $_SESSION["password"] ;
$dbname =$_SESSION["dbname"] ;
$username=$_SESSION["username"] ; 
$id=$_SESSION["id"] ;
echo $servername ; 
echo $password ;
echo $dbname ;
echo $username ; 

// $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }










// if ($conn->query($sql) === TRUE) {
//   echo "Record updated successfully";
// } else {
//   echo "Error updating record: " . $conn->error;
// }

















// Create connection



switch ($submit) {

	case "add_picture_form":
		$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = 'UPDATE myform SET myform_source="'.$path_file.'" WHERE myform_id="'.$id.'"';

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();


    break;
	case "add_picture_title":
				$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = 'UPDATE titre_questions SET titre_questions_source="'.$path_file.'" WHERE 	titre_questions_id="'.$id.'"';

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();



 echo "NON" ; 
		break;
		case "add_picture_data":
		$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	
}

$sql = 'UPDATE titres_data SET titres_data_source="'.$path_file.'" WHERE 	titres_data_id="'.$id.'"';

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();


    break;

}
?>