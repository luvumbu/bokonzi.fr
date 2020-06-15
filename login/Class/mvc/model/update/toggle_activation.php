<?php 
session_start();
header("Access-Control-Allow-Origin: *");
$servername =$_SESSION["servername"] ; 
$password = $_SESSION["password"] ;
$dbname =$_SESSION["dbname"] ;
$username=$_SESSION["username"] ; 



 echo $servername;
 echo $password ;
 echo $dbname;
 echo $username;
 $name = $_POST["name"];
 $id = $_POST["id"];

 echo  $name ; 
 echo  $id;





 $conn = new mysqli($servername, $username, $password, $dbname);
 // Check connection
 if ($conn->connect_error) {
	 die("Connection failed: " . $conn->connect_error);
 }
 
 $sql = 'UPDATE myform SET myform_visibility="'.$name.'" WHERE myform_id="'.$id.'"';
 
 if ($conn->query($sql) === TRUE) {
	 echo "Record updated successfully";
 } else {
	 echo "Error updating record: " . $conn->error;
 }
 
 $conn->close();


?>