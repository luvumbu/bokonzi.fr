var header_status= 0 ; 
var header_menu=document.getElementById("header_menu");
 header_menu.style.display="none"; 
var function_connexion_ = function() {
    xttp_r("allsection","class/vue/section/connexion.php");
   }
   var function_inscription_ = function() {
    xttp_r("allsection","class/vue/section/inscription.php");
   }
   var function_demo_ = function() {
    xttp_r("allsection","class/vue/section/demo.php");
   }
   var function_toggle_ = function() {
      if(header_menu.style.display=="none") {
        header_menu.style.display="block" ;   
      }
      else{
        header_menu.style.display="none" ; 
      }
   }
   document.getElementById("connexion").addEventListener("click", function_connexion_);
   document.getElementById("inscription").addEventListener("click", function_inscription_);
   document.getElementById("toggle_block").addEventListener("click", function_toggle_);  