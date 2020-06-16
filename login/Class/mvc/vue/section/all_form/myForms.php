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
// $id =$_SESSION["login_id"] ; 
$fa_check_square="fa_check_square_" ; 
$fa_dot_circle_o="fa_dot_circle_o_" ; 
$fa_file_image_o="fa_file_image_o_" ; 
$fa_fa_close="fa_fa_close_" ; 
$btn_secondary = "btn_secondary_" ; 
?>
<div style="">
<div class="style1">

<?php 
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = 'SELECT * FROM `myform` WHERE myform_id="'.$myform_id.'"';
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
   $myform_title_ = $row["myform_title"];
   $myform_description_ = $row["myform_description"];
   $myform_source=   $row["myform_source"];
   $myform_id = $row["myform_id"] ; 
   $myform_visibility = $row["myform_visibility"] ; 
    ?>
<input value="<?php echo $myform_title_.''?>" title="<?php echo $myform_id ?>"                onkeyup="update_myForms(this)"  class="form-control form-control-lg titre" type="text" placeholder="Titre sans nom"     id="<?php echo $titre.$myform_id ?>">
<input value="<?php echo $myform_description_.''?>"  title="<?php echo $myform_id ?>"         onkeyup="update_myForms(this)"  class="form-control form-control-lg description" type="text" placeholder="Déscription"  id="<?php echo $description.$myform_id ?>">
<!-- Attention au Id inscription et connexion car il sont utilisé pour la création d'un nouveau tityre -->
<div class="margin-bottom-100px"></div>
 <?php 
 if($myform_source!="") { 
      ?>
<div id="options" style="margin-bottom:30px"></div> 
        <div style="position:relative">
        <div class="cross" onclick="remove_img(this)" title="<?php echo $myform_id.''?>"> X</div>
        <img src="<?php echo $myform_source.'.jpg' ?>" class="img-fluid" alt="Responsive image">
    </div>
  <div class="margin-bottom-100px"></div> 
   <?php 
    }
  }
} 
  else {
  echo "0 results";
    }

$conn->close();
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
      }

$sql ='SELECT * FROM `titre_questions` WHERE titre_questions_id_myform="'.$myform_id.'" ' ;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    include("add_select_form.php");
  }
} else { 
}
$conn->close();
?>     
    
          <div class="btn-group" role="group" aria-label="Basic example">  
                <div title="<?php echo $myform_id ?>"  id="id_number"  ></div>
                <button type="button"     title="<?php echo $add_form?>"        onclick="add_myForms(this)"     id="<?php echo $add_form.$myform_id?>"      class="btn btn-secondary add_form" onclick="addData() ">    <i class="fa fa-plus-square"></i></button>    
                <button type="button"     title="<?php echo $myform_id ?>"     value="add_picture_form"  onclick="toggle_img_on(this)"          id="<?php echo $add_picture.$myform_id ?>"  class="btn btn-secondary form_img_all"><i class="fa fa-file-image-o"></i></button>  
               
               
               
               
               
               <?php 
                if($myform_visibility=="public") {
?>
                <button type="button"     title="<?php echo $myform_id?>"       onclick="toggle_activation(this)"      id="<?php echo $myform_id?>"                class="btn btn-secondary public" onclick="addData()">    <i class="fa fa-eye"></i></button>     

<?php 
                }
                else {
                 ?>
                  <button type="button"     title="<?php echo $myform_id?>"       onclick="toggle_activation(this)"      id="<?php echo $myform_id?>"                class="btn btn-secondary private" onclick="addData()">    <i class="fa fa-eye-slash"></i></button>
                <?php 
                }
                ?>
               
          
                <button type="button"     title="<?php echo $myform_id?>"       onclick="remove_form(this)"      id="<?php echo $myform_id?>"                class="btn btn-secondary remove_form" onclick="addData()">    <i class="fa fa-close"></i></button>
                          
     
              </div>          
    </div> 
<style>

  .public {
background-color: #b3e3ae ; 
  }
  .public:hover {
background-color: #b3e3ae ; 
  }
  .private {
    background-color:#e3aeb4;
  }
  .private:hover {
    background-color:#e3aed1;
  }
  .add_form {
    background-color:#44ba79;margin-left:200px;padding:15px
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
.cross2 {
  background-color: #ba4444;
  color: white;
  text-shadow: 1px 1px 1px black;
  padding: 15px;
  margin-bottom: 50px;
}
.type-source {
padding:15px;font-size:2em;
}
.cross2:hover {
  cursor: pointer;
}
.type-source {
padding: 15px;
margin: 15px;
background-color: #bab8cf;
color:white ;
border:1px solid rgba(0,0,0,0.2);
text-shadow: 1px 1px 1px black;
}
.type-source:hover {
cursor: pointer;

}


    @media screen and (max-width: 1024px) {
      .style1 {
        width : 80%;
        margin:auto ; 
      }
    }  
</style> 
