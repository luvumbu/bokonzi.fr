<?php 
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
  die("Connection failed: " . $connx2->connect_error); }

$sqlx2 = 'SELECT * FROM `titres_data` WHERE titres_data_id_questions_id="'.$titre_questions_id_.'"';
$resultx2 = $connx2->query($sqlx2);
echo "<ol>";
$encrementation =0;
if ($resultx2->num_rows > 0) {
  // output data of each row
  while($rowx2 = $resultx2->fetch_assoc()) {
    $titres_data_id_ = $rowx2["titres_data_id"];    
    $titres_data_titre= $rowx2["titres_data_titre"];
    $titres_data_source= $rowx2["titres_data_source"];
    $titres_data_type= $rowx2["titres_data_type"];
    

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
          if($titres_data_source!="") {
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
        case "text":
          
          ?>       
            <li>
              <input type="text" value="<?php echo   $titres_data_titre ?>"  title="<?php echo   $titres_data_id_ ?>"  onkeyup="update_source(this)" class="form-control titres_data" aria-label="Text input with radio" placeholder="Votre titre">               
            </li>
          <?php 
                    switch ($titres_data_type) {
                      case "":
                       ?>
                       <div style="margin-top:20px;margin-bottom:20px;display:flex">
                         <div><i class="fa fa-file-text type-source" title="<?php echo $titres_data_id_ ?>" onclick="titres_data_type(this)"></i></div>
                         <div><i class="fa fa-image type-source"     title="<?php echo $titres_data_id_ ?>" onclick="titres_data_type(this)"></i></div>
                         <div><i class="fa fa-link type-source"      title="<?php echo $titres_data_id_ ?>" onclick="titres_data_type(this)"></i></div>
                       </div> 
                    <i class="fa fa-remove fa-remove1 remove_type_data" onclick="remove_form(this)"  value="<?php echo   $titres_data_titre ?>"  title="<?php echo   $titres_data_id_ ?>"></i>

                        <?php 

                    switch ($titres_data_source) {
                      case "text":
                        ?>
                        <i class="fa fa-file-text type-source"></i> 
                        <?php 
                        break;
                      case "image":
                        ?>
                        <i class="fa fa-image type-source"></i> 
                        <?php 
                        break;
                      case "link":
                        ?>
                        <i class="fa fa-link type-source"></i> 
                        <?php 
                        break;
                      default:
                      ?>
                      <i class="fa fa-file-text type-source"></i> 
                      <?php 
                    }






                        break;
                      case "blue":
                        echo "Your favorite color is blue!";
                        break;
                      case "green":
                        echo "Your favorite color is green!";
                        break;
                      default:
                        echo "Your favorite color is neither red, blue, nor green!";
                    }
          break;
          case "select":
            ?>       
              <li>
                <input type="text" value="<?php echo   $titres_data_titre ?>"  title="<?php echo   $titres_data_id_ ?>"  onkeyup="update_source(this)" class="form-control titres_data" aria-label="Text input with radio" placeholder="Votre titre">               
              </li>
            <?php 
           
            break;
      default:
        echo "Default ";
    }
    $encrementation ++;        
  }
} else {
  echo "";
}
echo "</ol>";
$connx2->close();