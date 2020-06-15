<?php
            //Récuperation des variables 
$servername =$_SESSION["servername"] ; 
$password = $_SESSION["password"] ;
$dbname =$_SESSION["dbname"] ;
$username=$_SESSION["username"] ; 
$ip =  $_SESSION["ip"]  ; 
$id =$_SESSION["login_id"] ;  
$login_password=$_SESSION["login_password"] ;
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = 'SELECT * FROM `login_user` WHERE `login_id`="'.$id.'" AND `login_password`="'.$login_password.'"';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  }
} else {
  session_destroy();
  header('Location: ../index.php');
  exit();
}
$conn->close();

?>