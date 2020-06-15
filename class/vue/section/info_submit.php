<?php       
// apres l'action de l'utilisateur au niveau du boutton on envoie une information 
if(isset( $_SESSION["info"]))
        {

$info_ = $_SESSION["ON"];
switch ($info_) {
  case "C_ON":
    echo '<div class="alert alert-success" role="alert"><meta http-equiv="refresh" content="0;URL=login/index.php">
    Succes
  </div>';
    break;
  case "C_OFF":
  echo '<div class="alert alert-danger" role="alert">
  Erreur de connection
 </div>';
    break;
  case "I_ON":
    echo '<div class="alert alert-danger" role="alert">
    Adresse mail existante
   </div>';
    break;
    case "I_OFF":
        echo '<div class="alert alert-success" role="alert">
      Inscription reussi
      </div>';
    break;
}
}






        
?>