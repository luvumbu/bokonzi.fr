<?php
    


    if($_SESSION["info"]=="BANNI")
    {        
        ?>
        <meta http-equiv="refresh" content="1; URL="> 
        <?php
    }
    else 
    {
        
    }
    if(isset($_SESSION["newsession"] ))
    {
       if($_SESSION["newsession"]=="ON")
       {
                echo '    <div class="alert alert-success text-center" role="alert" id="newsession">'.$_SESSION["info"].'</div>';
                ?>
                <meta http-equiv="refresh" content="0; URL="> 
                <?php
                                 
       }
       else 
       {



        


        $info =$_SESSION["newsession"]  ; 

        $servername="localhost" ; 
        $username = "u510206436_bkz_all";
        $password = "v3p9r3e@59A";
        $dbname = "u510206436_bkz_all";
        $ip = $_SERVER['REMOTE_ADDR']; // Recuperation de l'IP du visiteur
    
        $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip)); //connection au serveur de ip-api.com et recuperation des données
        if($query && $query['status'] == 'success') 
        {
            //code avec les variables        
        }
        $pays = $query['country'] ; 
        $ville = $query['city'] ; 
    
    
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "INSERT INTO lite_error(lite_error_ip,lite_error_pays,lite_error_ville,lite_error_info)
        VALUES ('$ip', '$pays ', '$ville','$info')";
    
    if ($conn->query($sql) === TRUE) {

    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();

                if($_SESSION["info"]=="Inscription reussi")
                {
                    echo '    <div class="alert alert-success text-center" role="alert" id="newsession">'.$_SESSION["info"].'</div>';
                    ?>
                    <meta http-equiv="refresh" content="1; URL="> 
                    <?php


                }
                else 
                {

                    if( $_SESSION["newsession"] =="OFF2" )
                    {
                    echo '  <div class="alert alert-danger text-center" role="alert"  id="newsession">Adresse mail existante</div>';

                    }
                    else 
                    {
                    echo '  <div class="alert alert-danger text-center" role="alert"  id="newsession">Erreur attention plus que '.$_SESSION["info"].' tentatives </div>';

                    }


                    
                   
                }
       }
    }    
  



    
    ?>



<?php



?>
