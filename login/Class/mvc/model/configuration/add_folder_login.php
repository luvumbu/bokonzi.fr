<?php
//Récuperation des variables 
$filename = 'uploads/'.$id.'/index.php';
if (file_exists($filename)) {
    
} else {
   
    // mkdir('uploads/'.$id);
    $link='<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">';
    
    $bd="<br/>";
    $new='<h1>Création <span class="badge badge-secondary">'.date("Y/m/d").'</span></h1>';
    $texte = '<span class="badge badge-secondary">'.date("Y/m/d").$bd.$link.$bd.$new.'</span></h1>'.$ip;

    // création du fichier
    $f = fopen($filename, "x+");
    // écriture
    fputs($f, $texte );
    // fermeture
    fclose($f);
}
?>