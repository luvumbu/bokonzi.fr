<?php
    session_start() ;

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/png" href="Class/favicon/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bokonzi</title>
</head>
<body>
    <?php  
          if(isset($_SESSION["ON"]))
          {            

        include("class/app.php");                                
          }     
          else 
          {
            header('Location: ../index.php');
            // Rédirection vers la page principal si l'utilisateur n'est pas connecté
          }
   ?> 
</body>
</html>
