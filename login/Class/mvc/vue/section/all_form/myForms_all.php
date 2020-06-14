<?php 
session_start() ; 
// echo $_SESSION["myform_id"]  ;
$myform_id = $_SESSION["max_myform_id"]  ;
$titre = "title_" ; 
$description = "description_" ; 
$add_form = "add_form_";
$remove_form = "remove_form_";
$add_picture = "add_picture_" ;
$servername =$_SESSION["servername"] ; 
$password = $_SESSION["password"] ;
$dbname =$_SESSION["dbname"] ;
$username=$_SESSION["username"] ; 
// $ip =  $_SESSION["ip"]  ; 
$id =$_SESSION["login_id"] ; 
$fa_check_square="fa_check_square_" ; 
$fa_dot_circle_o="fa_dot_circle_o_" ; 
$fa_file_image_o="fa_file_image_o_" ; 
$fa_fa_close="fa_fa_close_" ; 
$btn_secondary = "btn_secondary_" ; 
?>

<div style="">
<div class="style1">
<?php
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = 'SELECT * FROM `myform` WHERE myform_id_user="'.$id.'"';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
   
    $myform_title_ = $row["myform_title"];
    $myform_description_ = $row["myform_description"];
    $myform_source=   $row["myform_source"];
    $myform_id = $row["myform_id"];
    $myform_source=   $row["myform_source"];
    ?>
    <input value="<?php echo $myform_title_.''?>" title="<?php echo $myform_id ?>"                onkeyup="update_myForms(this)"  class="form-control form-control-lg titre" type="text" placeholder="Titre sans nom"     id="<?php echo $titre.$myform_id ?>">
    <input value="<?php echo $myform_description_.''?>"  title="<?php echo $myform_id ?>"         onkeyup="update_myForms(this)"  class="form-control form-control-lg description" type="text" placeholder="Déscription"  id="<?php echo $description.$myform_id ?>">
    <!-- Attention au Id inscription et connexion car il sont utilisé pour la création d'un nouveau tityre -->
    <div class="margin-bottom-100px"></div>
<?php 

if($myform_source!="") 
{
  ?>
  <div id="options" style="margin-bottom:30px"></div> 
          <div style="position:relative">
          <div class="cross" onclick="remove_img(this)" title="<?php echo $myform_id.''?>"> X</div>
          <img src="<?php echo $myform_source.'.jpg' ?>" class="img-fluid" alt="Responsive image">
      </div>
    <div class="margin-bottom-100px"></div> 
     <?php
}
    // Create connection
$connx1 = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connx1->connect_error) {
  die("Connection failed: " . $connx1->connect_error);
}

$sqlx1 ='SELECT * FROM `titre_questions` WHERE titre_questions_id_myform="'.$myform_id.'" ' ;
$resultx1 = $connx1->query($sqlx1);

if ($resultx1->num_rows > 0) {
  // output data of each row
  while($rowx1 = $resultx1->fetch_assoc()) {

    $titre_questions_titre = $rowx1["titre_questions_titre"];
    $titre_questions_id_  = $rowx1["titre_questions_id"];
    $titre_questions_type = $rowx1["titre_questions_type"] ;
    $titre_questions_id_myform = $rowx1["titre_questions_id_myform"];
    ?>
    <form >
                    <div class="form-group" style="display: flex;justify-content: space-between;">             
                      <input    onkeyup="update_myForms(this)"   type="text" class="form-control titre_questions"  id="<?php echo "input_text_".$titre_questions_id_ .''?>" title="<?php echo $titre_questions_id_ .''?>" placeholder="Titre" style="margin-bottom:30px"    value="<?php echo  $titre_questions_titre?>"        >
                      <div>
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group mr-2" role="group" aria-label="First group">                          
                            <button onclick="add_myForms(this)"   id="<?php echo  $titre_questions_id_ ?>"     title="<?php echo $titre_questions_id_.''?>" type="button" class="btn btn-secondary plus_" style="background-color:#44ba79"><i class="fa fa-plus-circle" ></i></i></button>                          
                          <button onclick="update_source(this)"   id="<?php echo  $titre_questions_id_.'5' ?>"   title="<?php echo $titre_questions_id_ .''?>"     type="button" class="btn btn-secondary text_"><i class="fa fa-file-text-o"></i></button>
                          <button onclick="update_source(this)"   id="<?php echo  $titre_questions_id_.'2' ?>"   title="<?php echo $titre_questions_id_ .''?>"     type="button" class="btn btn-secondary square_"><i class="fa fa-check-square"></i></button>
                          <button onclick="update_source(this)"   id="<?php echo  $titre_questions_id_.'3' ?>"   title="<?php echo $titre_questions_id_ .''?>"     type="button" class="btn btn-secondary circle_"><i class="fa fa-dot-circle-o"></i></button>
                          <button onclick="update_source(this)"   id="<?php echo  $titre_questions_id_.'6' ?>"   title="<?php echo $titre_questions_id_ .''?>"     type="button" class="btn btn-secondary select_"><i class="fa fa-caret-square-o-down"></i></button>
    
                          <button onclick="toggle_img_on(this)"  value="add_picture_title"       id="<?php echo $fa_file_image_o.$titre_questions_id_ .''?>"   title="<?php echo $titre_questions_id_ .''?>"     type="button" class="btn btn-secondary image_"><i class="fa fa-file-image-o"></i></button>   
                          <button onclick="remove_form(this)"    id="<?php echo  $titre_questions_id_.'4'?>"       title="<?php echo $titre_questions_id_ .''?>"     type="button" class="btn btn-secondary close_" style="background-color:#ba4444;margin-left:50px"><i class="fa fa-close"></i></i></i></button>   
                             <div id="<?php echo $titre_questions_id_."x" ?>" class="<?php echo $titre_questions_id_ ?>"> </div>
                            </div> 
                          </div>
                      </div>
                    </div>                            
        </form>
        <?php 

// Create connection
$connx2 = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connx2->connect_error) {
  die("Connection failed: " . $connx2->connect_error);
}

$sqlx2 = 'SELECT * FROM `titres_data` WHERE titres_data_id_questions_id="'.$titre_questions_id_.'"';
$resultx2 = $connx2->query($sqlx2);

if ($resultx2->num_rows > 0) {
  // output data of each row
  while($rowx2 = $resultx2->fetch_assoc()) {

    $titres_data_id_ = $rowx2["titres_data_id"];    
    $titres_data_titre= $rowx2["titres_data_titre"];
    $titres_data_source= $rowx2["titres_data_source"];




    switch ($titre_questions_type) {
      case "square":
        
        ?>
            <div class="input-group mb-3"  style="display: flex;justify-content: space-between;">
                <div class="input-group-prepend">
                  <div class="input-group-text">                   
                    <input type="checkbox"     aria-label="dario for following text input titre_questions">
                  </div>
                </div>
                <input type="text" value="<?php echo   $titres_data_titre ?>"  title="<?php echo   $titres_data_id_ ?>"  onkeyup="update_source(this)" class="form-control titres_data" aria-label="Text input with radio" placeholder="Votre titre">               
              </div>
              
        <?php 
                    if($titres_data_source!="")
                    {
                      ?>
                      <img src="<?php echo $titres_data_source.'.jpg' ?>" style="width:15%;margin-bottom:50px" alt="Responsive image">
                      <div style="position: relative;">
                      <i class="fa fa-remove cross2 titres_data_source" onclick="remove_img(this)" title="<?php echo   $titres_data_id_ ?>"></i>
                      </div>
                      
                     <?php 
                    }
                    ?>     
                    <div>
                    <button type="button"     title="<?php echo $titres_data_id_ ?>"     value="add_picture_data"  onclick="toggle_img_on(this)"          id="<?php echo $add_picture.$myform_id ?>"  class="btn btn-secondary form_img_all"><i class="fa fa-file-image-o"></i></button> 
                    <i class="fa fa-remove fa-remove1 remove_type_data" onclick="remove_form(this)"  value="<?php echo   $titres_data_titre ?>"  title="<?php echo   $titres_data_id_ ?>"></i>
                    
                  </div> 
              <?php 

        break;
      case "circle":
        ?>
            <div class="input-group mb-3"  style="display: flex;justify-content: space-between;">
                <div class="input-group-prepend">
                  <div class="input-group-text">                   
                    <input type="radio"     aria-label="dario for following text input titre_questions">
                  </div>
                </div>
                <input type="text" value="<?php echo   $titres_data_titre ?>"  title="<?php echo   $titres_data_id_ ?>"  onkeyup="update_source(this)" class="form-control titres_data" aria-label="Text input with radio" placeholder="Votre titre">               
              </div>
              
        <?php 
                    if($titres_data_source!="")
                    {
                      ?>
                      <img src="<?php echo $titres_data_source.'.jpg' ?>" style="width:15%;margin-bottom:50px" alt="Responsive image">
                      <div style="position: relative;">
                      <i class="fa fa-remove cross2 titres_data_source" onclick="remove_img(this)" title="<?php echo   $titres_data_id_ ?>"></i>
                      </div>
                      
                     <?php 
                    }
                    ?>     
                    <div>
                    <button type="button"     title="<?php echo $titres_data_id_ ?>"     value="add_picture_data"  onclick="toggle_img_on(this)"          id="<?php echo $add_picture.$myform_id ?>"  class="btn btn-secondary form_img_all"><i class="fa fa-file-image-o"></i></button> 
                    <i class="fa fa-remove fa-remove1 remove_type_data" onclick="remove_form(this)"  value="<?php echo   $titres_data_titre ?>"  title="<?php echo   $titres_data_id_ ?>"></i>
                    
                  </div> 
              <?php 
        break;
      case "green":
        echo "Your favorite color is green!";
        break;
      default:
        echo "Your favorite color is neither red, blue, nor green!";
    }















        
  }
} else {
  echo "";
}
$connx2->close();
  }
} else {
  echo "";
}
$connx1->close();
?>
<div class="btn-group" role="group" aria-label="Basic example">  
                <div title="<?php echo $myform_id ?>"  id="id_number"  ></div>
                <button type="button"     title="<?php echo $add_form?>"        onclick="add_myForms(this)"     id="<?php echo $add_form.$myform_id?>"      class="btn btn-secondary add_form" onclick="addData() ">    <i class="fa fa-plus-square"></i></button>    
                <button type="button"     title="<?php echo $myform_id ?>"      onclick="toggle_img_on(this)"          id="<?php echo $add_picture.$myform_id ?>"  value="add_picture_form" class="btn btn-secondary form_img"><i class="fa fa-file-image-o"></i></button>  
                <button type="button"     title="<?php echo $myform_id?>"       onclick="remove_form(this)"      id="<?php echo $myform_id?>"                class="btn btn-secondary remove_form" onclick="addData() ">    <i class="fa fa-close"></i></button>               
          </div>
  <?php   
  }
} else {

}
 $conn->close();
?>

<style>
  .add_form 
  {
    background-color:#44ba79;
    margin-left:200px;
    padding:15px ;
  }
  .remove_form {
    background-color:#ba4444;
    margin-left:200px;
    padding:15px;
  }
.style1 {
  width : 50%;
  margin:auto ; 
}
.fa-remove1 {
  padding: 10px; 
  margin-bottom: 25px;
  padding: 15px; 
  background-color:#ba4444; 
}
.fa-remove1:hover {
  cursor:pointer ; 
} 
.titre_questions {
  width : 45%; 
}
.images_1 {
  margin-left : 25px ; 
  padding:15px ; 
  border : 1px solid rgba(0,0,0,0.2) ; 
}
.margin-bottom-100px {
  margin-bottom:100px;
}
.titre {
  margin-top : 100px;
  margin-bottom : 25px; 
}
.top {
  margin-top:25px ; 
}
#options {
  margin-top:25px; 
  margin-bottom : 25px; 
}
.margin-bottom {
  margin-bottom : 130px; 
}
@media screen and (max-width: 1024px)
{
  .style1 {
    width : 80%;
    margin:auto ; 
  }
}  
</style> 
