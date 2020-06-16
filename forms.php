<?php
session_start();
include("class/php/Ip.php") ;
include("class/model/bdd_local.php");
// include("model/bdd_network.php");
// $_SESSION["ip"] = $ip->get_ip() ; 
// // affiche l'adresse ip 
// $_SESSION["city"] = $ip->get_city() ;
// // affiche le nom de la ville
// $_SESSION["country"] = $ip-> get_country(); 
// Create connection
//$adresse = "http://".$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
include("class/php/IpForms.php") ;






$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = 'SELECT * FROM `myform` WHERE `myform_id`="'.$IpForms.'"';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
		echo $row["myform_id"].'oui<br/>';
  }
} else {
	echo "pas de valeur ici";
 
}
$conn->close();
?>
