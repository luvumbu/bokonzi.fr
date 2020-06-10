<?php 
    include("class/mvc/vue/section/section.html");
   // $_SESSION["aleatoire"]
   // $_SESSION["login_id"] ;
?>
<div id="myForms"></div>
<script>
function toggle_img_on(this_) 
{
    
    alert(this_.value) ; 
     document.getElementById("dowload_img").className="dowload_img_display_block";
    var identite = new FormData();
    // Ajout d'information dans l'objet
    identite.append("name_submit", this_.value);
    identite.append("idnumber", this_.title);
    var req = new XMLHttpRequest();
    switch (this_.className) {
    case 'btn btn-secondary form_img_all':
    console.log("one");
    req.open("POST", "class/mvc/model/add/add_picture_myform.php");
    break;
//   case 1:
//     day = "Monday";
//     break;
//   case 2:
//      day = "Tuesday";
//     break;
//   case 3:
//     day = "Wednesday";
//     break;
//   case 4:
//     day = "Thursday";
//     break;
//   case 5:
//     day = "Friday";
//     break;
//   case 6:
//     day = "Saturday";
}

// Envoi de la requête en y incluant l'objet
req.send(identite);
console.log(req);  





























}

</script>