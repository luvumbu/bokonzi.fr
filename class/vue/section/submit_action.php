<?php
session_start() ; 
header("Access-Control-Allow-Origin: *");
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "bkz_all";
$nom_requette =$_POST["nom_requette"] ;
$my_mail = $_POST["mail"] ; 
$my_password= $_POST["password"] ; 
$_SESSION["servername"]=$servername ;
$_SESSION["username"]=$username ;
$_SESSION["password"] = $password;
$_SESSION["dbname"] = $dbname ;


$tentatives= 4;


$banni_verif=0;
 
$ip = $_SERVER['REMOTE_ADDR']; // Recuperation de l'IP du visiteur
// echo $ip ; 
if($ip=="::1")
{
// echo "Hors ligne" ; 
}
else 
{
    $username = "u510206436_bkz_all";
    $password = "v3p9r3e@59A";
    $dbname = "u510206436_bkz_all";
    $ip = $_SERVER['REMOTE_ADDR']; // Recuperation de l'IP du visiteur
    $_SESSION["servername"]=$servername ;
    $_SESSION["username"]=$username ;
    $_SESSION["password"] = $password;
    $_SESSION["dbname"] = $dbname ;
    $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip)); //connection au serveur de ip-api.com et recuperation des données
    if($query && $query['status'] == 'success') 
    {
        //code avec les variables
        // echo "Bonjour visiteur de " . $query['country'] . "," . $query['city'];
    }
    $pays = $query['country'] ; 
    $ville = $query['city'] ; 
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO logs (logs_ip,logs_pays,logs_ville,login_type_action)
VALUES ('$ip','$pays','$ville','$nom_requette')";

if ($conn->query($sql) === TRUE) {

// echo "New record created successfully";
// Create connection
$conn_banni = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn_banni->connect_error) {
  die("Connection failed: " . $conn_banni->connect_error);
}

$sql_banni = 'SELECT * FROM `lite_error` WHERE `lite_error_ip`="'.$ip.'"';
$result_banni = $conn_banni->query($sql_banni);

if ($result_banni->num_rows > 0) {
  // output data of each row
  while($row_banni = $result_banni->fetch_assoc()) {
 
    if($row_banni["lite_error_info"] =="OFF")
    {
         if($nom_requette=="connexion")
         {
          $banni_verif ++ ; 
          $tentatives  -- ; 
          // Si la connexion ecou on ajout ++ a la valeur pour compter le nombre dessaye restant 

         }
    }
    
  
  }
} else {
 
}
$conn_banni->close();

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
switch ($nom_requette ) {
  case "connexion":
    echo "Connexion ok ".$my_mail." et ".$my_password ; 
       // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }    
    $sql = 'SELECT * FROM `login_user` WHERE `login_mail`="'.$my_mail.'" AND `login_password`="'.$my_password.'"';
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
             $_SESSION["newsession"] = "ON" ; 
             $_SESSION["info"] ="Connexion reussi";
             $_SESSION["my_mail"] =$my_mail;
             $_SESSION["my_password"] =$my_password;
             $_SESSION["id"] =$row["login_id"] ; 
             $_SESSION["login_id"] =$row["login_id"] ;
             $_SESSION["ip"] =  $_SERVER['REMOTE_ADDR'] ; 
      }
    } else { 

      if($nom_requette=="connexion")
      {
        $_SESSION["newsession"] = "OFF" ; 
      }
      else 
      {
        $_SESSION["newsession"] = "OFF2" ; 
      }
            
             $_SESSION["info"] =$tentatives;
    }
    $conn->close();
    break;
  case "inscription":
    echo "Inscription ok !";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = 'SELECT * FROM `login_user` WHERE `login_mail`="'.$my_mail.'"';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    if($nom_requette=="connexion")
    {
      $_SESSION["newsession"] = "OFF" ; 
    }
    else 
    {
      $_SESSION["newsession"] = "OFF2" ; 
    }
    $_SESSION["info"] =$tentatives;
  }
} else {
    $_SESSION["newsession"] = "ON" ; 
  
    $_SESSION["info"] ="Inscription reussi";
    $_SESSION["my_mail"] =$my_mail;
    $_SESSION["my_password"] =$my_password;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO login_user (login_mail, login_password)
VALUES ('$my_mail ', '$my_password')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();    
}
$conn->close();
 
    break; 
  default:
   // aucune valeur par defaut 
}





if($banni_verif >3) // Nombre d'essaye avnt d'etre banni
{
  $_SESSION["info"] ="BANNI"; 


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO ip_banni (ip_banni_ip,ip_banni_pays, ip_banni_ville)
VALUES ('$ip','$pays','$ville')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

}











?>