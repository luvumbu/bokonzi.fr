<?php
session_start() ; 
header("Access-Control-Allow-Origin: *");
$aleatoire = sha1(rand(10,10000)) ; 
$_SESSION["aleatoire"]=$aleatoire;
$_SESSION["submit"]= $_POST["submit"];
$_SESSION["id"]= $_POST["id"];

 
?>