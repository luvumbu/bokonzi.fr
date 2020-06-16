<?php 
    include("class/mvc/vue/section/section.html");
?>
<div id="myForms"></div>
<script>

function nomUrl() {
  var taille = window.location.href.length-1 ;
var lastStringurl=window.location.href[taille];

if(lastStringurl==1) {
  setTimeout(function(){            
      Ajax2("myForms","class/mvc/vue/section/all_form/myForms.php")                           
        }, 100);  
}
else {  
  setTimeout(function(){            
      Ajax2("myForms","class/mvc/vue/section/all_form/myForms_all.php")                           
        }, 100);  
}
}
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
//alert(window.location.href) ; 
// alert(window.location.href.length);

nomUrl();


// Envoi de la requête en y incluant l'objet
req.send(identite);
console.log(req);
}


function titres_data_type(this_) {
// Création d'un objet FormData
var identite = new FormData();
// Ajout d'information dans l'objet
// Création et configuration d'une requête HTTP POST vers le fichier post_form.php
var req = new XMLHttpRequest();
req.open("POST", "php.php");
identite.append("id",this_.title);
  switch(this_.className) {
  case "fa fa-file-text type-source":
  identite.append("titres_data_source", "text");
    break;
  case "fa fa-image type-source":
  identite.append("titres_data_source", "image");  
    break;
    case "fa fa-link type-source":
  identite.append("titres_data_source", "link");     
    break;
  default:
   
}
req.open("POST", "class/mvc/model/update/update_data_source.php");
req.send(identite);
console.log(req);
nomUrl();
}
function toggle_activation(this_) {

var identite = new FormData();
// Ajout d'information dans l'objet
if(this_.className=="btn btn-secondary public") {
  identite.append("id", this_.id);
  identite.append("name","private");
}
else {
  identite.append("id", this_.id);
  identite.append("name", "public");
}
var req = new XMLHttpRequest();
req.open("POST", "class/mvc/model/update/toggle_activation.php");
// Envoi de la requête en y incluant l'objet
req.send(identite);
console.log(req); 
nomUrl();
}













function add_myForms_all(this_) {
 // Création d'un objet FormData
var identite = new FormData();

identite.append("idform", this_.title);
var req = new XMLHttpRequest();
req.open("POST", "class/mvc/model/update/update_myform_all.php");
req.send(identite);
nomUrl();
}

</script>