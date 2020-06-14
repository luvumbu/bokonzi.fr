<?php
session_start() ; 
header("Access-Control-Allow-Origin: *");
$email_ = $_POST["email"] ; 
$password_ = $_POST["password"];
if($_SESSION["ip"]=="::1")
{
  $servername = "localhost";
  $username = "root";
  $password = "root";
  $dbname = "bkz_all";
}
else 
{
  $servername = "localhost";
  $username = "u510206436_bkz_all";
  $password = "v3p9r3e@59A";
  $dbname = "u510206436_bkz_all";
}
$_SESSION["email"] = $email_ ; 
$_SESSION["password"] = $password_;
$_SESSION["info"] = "" ;
$_SESSION["servername"] = $servername  ; 
$_SESSION["username"] = $username ;
$_SESSION["password"] = $password ;
$_SESSION["dbname"] = $dbname ;
// $_SESSION["ip"]
// $_SESSION["city"]
// $_SESSION["country"] 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = 'SELECT * FROM `login_user` WHERE `login_mail`="'.$email_.'"';
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
$_SESSION["info"] ="Adresse mail existante ! " ; 
$_SESSION["ON"] ="I_ON"; 
  }
} else {
    $_SESSION["info"] ="Inscription reussi" ; 
  
    $_SESSION["login_id"] =  $row["login_id"];
    $_SESSION["login_mail"] = $email_ ; 
    $_SESSION["login_password"]= $password_ ; 
    $_SESSION["login_activation"] =$row["login_activation"];
    $_SESSION["ON"] ="I_OFF"; 
    
}
$conn->close();
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO login_user (login_mail,login_password)
VALUES ('$email_', '$password_')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>