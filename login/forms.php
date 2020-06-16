<div class="all">
<?php
session_start();
include("class/mvc/model/forms/Ip.php") ;

$servername =$_SESSION["servername"] ; 
$password = $_SESSION["password"] ;
$dbname =$_SESSION["dbname"] ;
$username=$_SESSION["username"] ; 

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
   $myform_id= $row["myform_id"];
   $myform_title= $row["myform_title"];
   $myform_description= $row["myform_description"];
   $myform_source= $row["myform_source"];
   $myform_visibility= $row["myform_visibility"];
   $myform_date_add= $row["myform_date_add"];
   ?>
<div class="myform_id">  
  <h1><?php echo $myform_title ?></h1>
  <h2><?php echo $myform_description ?></h1>
</div> 
   <?php 



echo "<br/>";

// Create connection
$conn2 = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn2->connect_error) {
  die("Connection failed: " . $conn2->connect_error);
}

$sql2 = 'SELECT * FROM `titre_questions` WHERE `titre_questions_id_myform`="'.$myform_id.'"';
$result2 = $conn2->query($sql2);

if ($result2->num_rows > 0) {
  // output data of each row
  while($row2 = $result2->fetch_assoc()) {
    $titre_questions_id= $row2["titre_questions_id"];
    $titre_questions_id_myform= $row2["titre_questions_id_myform"];
    $titre_questions_id_user= $row2["titre_questions_id_user"];
    $titre_questions_titre= $row2["titre_questions_titre"];
    $titre_questions_type= $row2["titre_questions_type"];
    $titre_questions_source= $row2["titre_questions_source"];
    $titre_questions_date_ajout= $row2["titre_questions_date_ajout"];    
    echo "<br/>" ; 

echo "<h3>".$titre_questions_titre."</h3>";
// Create connection
$conn3 = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn3->connect_error) {
  die("Connection failed: " . $conn3->connect_error);
}

$sql3 = 'SELECT * FROM `titres_data` WHERE `titres_data_id_questions_id`="'.$titre_questions_id.'"';
$result3 = $conn3->query($sql3);

if ($result3->num_rows > 0) {
  // output data of each row
  while($row3 = $result3->fetch_assoc()) {
   
    $titres_data_id =$row3["titres_data_id"];
    $titres_data_id_user =$row3["titres_data_id_user"];
    $titres_data_id_questions_id =$row3["titres_data_id_questions_id"];
    $titres_data_titre =$row3["titres_data_titre"];
    $titres_data_type =$row3["titres_data_type"];
    $titres_data_source =$row3["titres_data_source"];
    $titres_data_add =$row3["titres_data_add"];

    echo "<p>".$titres_data_titre."</p>";
  }
} else {

}
$conn3->close();
  }
} else {

}
$conn2->close();
  }
} else {

}
$conn->close();
?>
</div>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<style>
  .myform_id {
   text-align: center;

   margin-top:50px;  
  }
  .all {
    width: 80%;
   margin:auto;  
  }
</style>