<?php 
$valfinal1="";
$IpForms="";
$verif1=true;
$verif2=true;
$monip=$_SERVER['PHP_SELF'];
$taille= strlen($_SERVER['PHP_SELF']); 
for($i=$taille-1;$i>0;$i--) {
	if($monip[$i]=="/") {
		$verif1=false;
	}
 if($verif1==true) {
	$valfinal1=$valfinal1.$monip[$i] ;
 }
}
$taille2=strlen($valfinal1);
for($i=$taille2-1;$i>-1;$i--) {
	$IpForms=$IpForms.$valfinal1[$i];
}
?>