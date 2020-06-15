var menu = 0 ; 
var url = window.location.href ; 
var url_taille = window.location.href.length ;


function synchro() // paramettres pour l'url
{
  var url = window.location.href ; 
  var url_taille = window.location.href.length ;
  var url_valeur=  url[url_taille-1] ;
  if(url_valeur==1)
  {
    setTimeout(function(){            
      Ajax2("myForms","class/mvc/vue/section/all_form/myForms.php")                           
        }, 100);    
        
  }
  else 
  {
    setTimeout(function(){            
      Ajax2("myForms","class/mvc/vue/section/all_form/myForms_all.php")                           
        }, 100);  
  }

}




function button()
{
  console.log(url[url_taille-1]) ; 
       var navbarSupportedContent= document.getElementById("navbarSupportedContent") ;
         if(menu !=0)
      {
        navbarSupportedContent.style="display:none" ; 
        menu = 0 ; 
      }
      else 
      {
        navbarSupportedContent.style="display:block" ;
        menu = 1 ; 
      }
}  
function Ajax2(id_,url_) {  
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    document.getElementById(id_).innerHTML =
    this.responseText;
  }
};
xhttp.open("GET", url_, true);
xhttp.send();
}
 function add_myForms(this_)
      {   
         
          var add_form_ = "add_form_";
          var remove_form_ = "remove_form_";
          var add_picture_ = "add_picture_" ;
          var id_number_ =  document.getElementById("id_number").title  ; // numero de lid
          var input_title = document.getElementById("title_"+id_number_).value  ;   // valeur du title
          var input_description = document.getElementById("description_"+id_number_).value  ;   // valeur du description
          var identite = new FormData();
          // Ajout d'information dans l'objet
          identite.append("input_title", input_title);
          identite.append("input_description", input_description);
          identite.append("id_number_",id_number_);
          // Création et configuration d'une requête HTTP POST vers le fichier post_form.php
          var req = new XMLHttpRequest();
          switch (this_.className) {
                case "btn btn-secondary add_form":
                  req.open("POST", "class/mvc/model/add/add_titre_questions.php");
                  // Envoi de la requête en y incluant l'objet
                  req.send(identite);
                  console.log(req);
                  add_form_.className="nav-link add_form"; 
                  synchro() ;
                  break;
               case "btn btn-secondary remove_form":
              
               console.log("REmove preparation oko") ; 
                  break;
                      case "btn btn-secondary plus_":
                        var add_titres_info= document.getElementById(this_.id+"x") ; 
                        identite.append("id_parent", add_titres_info.className);
                        identite.append("id",add_titres_info.id); 
                        req.open("POST", "class/mvc/model/add/add_titres_data.php");
                        // Envoi de la requête en y incluant l'objet
                        req.send(identite);
                        console.log(req);
                        add_form_.className="nav-link add_form"; 


                        // console.log(url[url_taille-1]) ; 
                        synchro() ; 

                  break;
              }             
          // req.open("POST", "Class/Php/CreatTableChildUP.php");
          // // Envoi de la requête en y incluant l'objet
          // req.send(identite);
          // console.log(req);
          // add_form_.className="nav-link add_form";           
}
function update_myForms(this_) 
{ 

if(this_.className=="form-control form-control-lg description" ||  this_.className=="form-control form-control-lg titre") 
{ 
let title = document.getElementById("title_"+this_.title).value ;  
let description = document.getElementById("description_"+this_.title).value ;  
         
      var identite = new FormData();
      // Ajout d'information dans l'objet
      identite.append("title", title);
      identite.append("description", description);
      identite.append("myform_id", this_.title);
      // Création et configuration d'une requête HTTP POST vers le fichier post_form.php
      var req = new XMLHttpRequest();
      req.open("POST", "class/mvc/model/update/update_myForms.php");
      // Envoi de la requête en y incluant l'objet
      req.send(identite);
      console.log(req);  

}
else{
          var identite = new FormData();
          // Ajout d'information dans l'objet
          identite.append("titre_questions_id", this_.title);
          identite.append("titre_questions_titre", this_.value);
          // Création et configuration d'une requête HTTP POST vers le fichier post_form.php
          var req = new XMLHttpRequest();
    switch (this_.className) {    
        case "form-control titre_questions":           
              req.open("POST", "class/mvc/model/update/update_titre_questions_titre.php");
          break;
        case "form-control titres_data":    
              req.open("POST", "class/mvc/model/update/update_titres_data_titre.php");
          break;
        // case "btn btn-secondary circle_":    
        //   alert("2x");
        //      // req.open("POST", "class/mvc/model/update/update_titres_data_titre.php");
        // break;
  }
          // Envoi de la requête en y incluant l'objet
          req.send(identite);
          console.log(req);   
}
 }

 function update_source(this_) 
 {
   
var identite = new FormData();
identite.append("titre_questions_id", this_.title);
var req = new XMLHttpRequest();
   switch (this_.className) {
case "btn btn-secondary square_":
    // Ajout d'information dans l'objet    
  identite.append("titre_questions_source", "square");
  // Création et configuration d'une requête HTTP POST vers le fichier post_form.php     
  break;
case "btn btn-secondary circle_":
  identite.append("titre_questions_source", "circle");
  break;

  case "btn btn-secondary text_":
 
  identite.append("titre_questions_source", "text");
  break;
  case "btn btn-secondary select_":
  identite.append("titre_questions_source", "select");
  break;

  case "form-control titres_data":
  identite.append("titre_questions_source", "circle");
  identite.append("titres_data_titre", this_.value);
  req.open("POST", "class/mvc/model/update/update_titres_data_titre.php");
  req.send(identite);
  break;    
}
if(this_.className!="form-control titres_data")
{
req.open("POST", "class/mvc/model/update/update_titre_questions_source.php");
  req.send(identite);
  console.log(req);
  synchro() ; 
}
 }




 function remove_form(this_) 
 {

switch (this_.className) {
case "btn btn-secondary remove_form":
var identite = new FormData();
// Ajout d'information dans l'objet
identite.append("myform_id", this_.title);
// Création et configuration d'une requête HTTP POST vers le fichier post_form.php
var req = new XMLHttpRequest();
req.open("POST", "class/mvc/model/remove/remove_all.php");
// Envoi de la requête en y incluant l'objet
req.send(identite);
console.log(req);

if(status==1)
{
  document.location.reload(true);
}
setTimeout(function(){
  synchro() ;  
}, 10);
  break;
case "btn btn-secondary close_":
  
  var identite = new FormData();
identite.append("myform_id", this_.title);
var req = new XMLHttpRequest();
req.open("POST", "class/mvc/model/remove/remove_all_question.php");
req.send(identite);
console.log(req);
synchro() ; 
  break;
case "fa fa-remove fa-remove1 remove_type_data":
  
  var identite = new FormData();
identite.append("myform_id", this_.title);
var req = new XMLHttpRequest();
req.open("POST", "class/mvc/model/remove/remove_all_question_titres_datas.php");
req.send(identite);
console.log(req);
synchro() ; 
  break;

}
 }
 