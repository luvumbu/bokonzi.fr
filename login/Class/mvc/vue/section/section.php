<?php 
    include("class/mvc/vue/section/section.html");
   // $_SESSION["aleatoire"]
   // $_SESSION["login_id"] ;
?>
<div id="myForms"></div>
<script>
function toggle_img_on(this_) 
{
    
    
     document.getElementById("dowload_img").className="dowload_img_display_block";
 
        // Création d'un objet FormData
        var identite = new FormData();
        identite.append("submit", this_.value);
        identite.append("id", this_.title);
        // Création et configuration d'une requête HTTP POST vers le fichier post_form.php
        var req = new XMLHttpRequest();
        req.open("POST", "class/mvc/model/add/add_picture_myform.php");
        // Envoi de la requête en y incluant l'objet
        
        req.send(identite);
        console.log(req);

// Envoi de la requête en y incluant l'objet





























}

</script>