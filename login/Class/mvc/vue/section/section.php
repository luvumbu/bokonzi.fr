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
function remove_img(this_)
{
var identite = new FormData();
identite.append("id", this_.title);
var req = new XMLHttpRequest();


   switch (this_.className) {
  case "cross": 
  req.open("POST", "class/mvc/model/remove/remove_img_form.php");
    break;
  case "fa fa-remove cross2 titre_questions_source":

   req.open("POST", "class/mvc/model/remove/remove_img_title.php");
   break;
  case "fa fa-remove cross2 titres_data_source":
    
   req.open("POST", "class/mvc/model/remove/remove_img_data.php");
    break;
    
}
      setTimeout(function(){            
      Ajax2("myForms","class/mvc/vue/section/all_form/myForms.php")                           
        }, 100);  

// Envoi de la requête en y incluant l'objet
req.send(identite);
console.log(req);
}

</script>