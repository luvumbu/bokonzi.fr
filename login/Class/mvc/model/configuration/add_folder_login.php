<?php
//Création des fichier automatique si le fichier n'existe pas 

$filename = 'uploads/'.$id.'/index.php';
if (file_exists($filename)) {
   
} else {
   
mkdir('uploads/'.$id, 0777);
mkdir('uploads/'.$id.'/add_picture_form', 0777);
mkdir('uploads/'.$id.'/add_picture_title', 0777);
mkdir('uploads/'.$id.'/add_picture_data', 0777); 
$texte = date("Y/m/d");
// création du fichier
$f = fopen($filename, "x+");
// écriture
fputs($f, $texte );
// fermeture
fclose($f);
$montext = "Ensemble des image dans";
$f2 = fopen('uploads/'.$id.'/add_picture_form'.'/index.php', "x+");
// écriture
fputs($f2, $montext.' form création le '.$texte );
// fermeture
$f3 = fopen('uploads/'.$id.'/add_picture_title'.'/index.php', "x+");
// écriture
fputs($f3, $montext.' title création le '.$texte);
// fermeture
$f4 = fopen('uploads/'.$id.'/add_picture_data'.'/index.php', "x+");
// écriture
fputs($f4, $montext.' data création le '.$texte );
// fermeture

fclose($f2);
fclose($f3);
fclose($f4);
}
?>