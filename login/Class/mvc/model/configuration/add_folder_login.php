<?php
//Récuperation des variables 
echo $id ; 
$filename = 'uploads/'.$id.'/index.php';
if (file_exists($filename)) {
    echo "le fichier existe";
    
} else {
   
echo "le fichier nexiste pas" ; 
mkdir('uploads/'.$id, 0777);
$nom_file = "fichier.txt";
$texte = "Hello world!";

// création du fichier
$f = fopen($filename, "x+");
// écriture
fputs($f, $texte );
// fermeture
fclose($f);
}
?>