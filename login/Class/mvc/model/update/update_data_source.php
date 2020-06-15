<?php
session_start() ; 
header("Access-Control-Allow-Origin: *");
echo "my data source" ; 
$titres_data_source= $_POST["titres_data_source"] ;
$id_= $_POST["id"] ;

$servername =$_SESSION["servername"] ; 
$password = $_SESSION["password"] ;
$dbname =$_SESSION["dbname"] ;
$username=$_SESSION["username"] ; 

echo $titres_data_source ;
echo $id_ ;  
 echo $servername;
 echo $password ;
 echo $dbname;
 echo $username;

 





 $conn = new mysqli($servername, $username, $password, $dbname);
 // Check connection
 if ($conn->connect_error) {
	 die("Connection failed: " . $conn->connect_error);
 }
 
 $sql = 'UPDATE titres_data SET titres_data_source="'.$titres_data_source.'" WHERE titres_data_id="'.$id_.'"';
 
 if ($conn->query($sql) === TRUE) {
	 echo "Record updated successfully";
 } else {
	 echo "Error updating record: " . $conn->error;
 }
 
 $conn->close();



?>