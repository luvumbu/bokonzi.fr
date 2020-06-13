<?php 
  include("class/mvc/model/configuration/add_session_and_ip.php");
  include("class/mvc/model/configuration/add_folder_login.php");
  include("class/mvc/vue/section/all_form/index_img.php");
    // Création de l'adresse ip avec les variables de session
    // Si le dossier n'existe pas créer un dossier 
?>
<header>
<?php        
  // aJoute une variable avec les session recuperer 
  include("class/mvc/vue/header/header.php");      
?>
</header>
<section>
<?php       
  include("class/mvc/vue/section/section.php");            
?>
</section>
<footer>
<?php       
  include("class/mvc/vue/footer/footer.php");      
?>
</footer>
<?php
  include("class/style/links.php"); 
?>
<script src="class/mvc/controller/js.js"></script>   
<script src="class/mvc/controller/section.js"></script>   

<style>
.display_img_none {
  position:absolute ; 
  z-index : 2 ; 
  width:100%; 
  height:100%;
  top:0; 
  transform: translateX(-2000px); /* On déplace l'objet */
  transition:0 ; 
}
.display_img_block {
  background-color:rgba(0,0,0,0.5) ; 
  position:fixed ; 
  z-index : 2 ; 
  width:100%; 
  height:100%;
  top:0; 
  transform: translateX(0px); /* On déplace l'objet */
  transition:0 ; 
}
</style>