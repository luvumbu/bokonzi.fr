<?php
class Ip{
    private $_ip;
    private $_city;
    private $_country;
    // Création des attribus     
    public function get_ip(){
    $this->_ip = $_SERVER['REMOTE_ADDR'];
    if($this->_ip!="::1"){
        $ip = $_SERVER['REMOTE_ADDR']; // Recuperation de l'IP du visiteur
        $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip)); //connection au serveur de ip-api.com et recuperation des données
        $this->_city = $query['country'] ; // récuperation nom de la ville
        $this->_country = $query['city'] ; // récuperation nom du pays
    }
   else{
          $this->_city = "localhost_city";// Si l'utilisateur est en local donner cette valeur "localhost_city"
          $this->_country = "localhost_country";// Si l'utilisateur est en local donner cette valeur "localhost_country"
      }   
        return $this->_ip;
  }
  public function get_city(){
  return $this->_city  ; 
  }
  public function get_country(){
   return $this->_country  ; 
  }  
}
/*
*
*
*
*************************
**exemple d'utilisation** 
*************************
*
*
$ip = new Ip;
// Création de l'objet avec le nom $ip;
echo $ip->get_ip() ; 
// affiche l'adresse ip 
echo $ip->get_city() ;
// affiche le nom de la ville
echo $ip-> get_country();   
// affiche le nom du pays 
*
*
*
*/ 
$ip = new Ip;
// Création de l'objet avec le nom $ip;
$_SESSION["ip"] = $ip->get_ip() ; 
// affiche l'adresse ip 
$_SESSION["city"] = $ip->get_city() ;
// affiche le nom de la ville
$_SESSION["country"] = $ip-> get_country();   
// affiche le nom du pays 
?>
 