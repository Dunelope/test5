<?php


function afficherAgent(){    
	$contenu=afficherMenuAgent().'<form id=monForm2 action="site.php" method="post"> <fieldset><legend>Selection opperation</legend><p><select name="opeAgent"><option value="c1">Modifier informations client</option><option value="c2">Synthese client</option><option value="c3">Opération sur le compte</option><option value="c4">Rendez-vous</option></select><input type="submit" value="Selectionner" name="operaAgent"></p></fieldset></form>';
    require_once('gabarit.php');
}


function afficherLogAgent(){
    $contenu ='<form id="monForm1" action="site.php" method="post"><fieldset><legend>Se connecter</legend><p><label>  Login  : </label><input type="text" name="Login"  /></p><p><label>  Mot de passe  : </label><input type="password" name="Mdp"  /></p><p><input type="submit" value="Se Connecter" name="Connecter"><input type="reset" value="Effacer"></p></fieldset></form>';
    require_once('gabarit.php');
}

function afficherClient(){
	
	$contenu=afficherMenuAgent().'<form id="monForm1" action="site.php" method="post"><fieldset><p><input type="texte"  name="SelectClient"> <input type="submit" name="RechercherClient" value="Rechercher ce Client" /></fieldset></form>';
	require_once('gabarit.php');
}

function afficherModif($mod){
	$c='';
	  /*$adresse,$numtel,$email,$profession,$situation_familiale*/
		$c=$c.'<p><input type="checkbox" name="idClient[]" value="' . $mod->IDCLIENT .'">'.$mod->NOMCLI.'  Adresse : <input name="'. $mod->IDCLIENT  .'[]" type="text" value="' . $mod->ADRESSE .'" />  Numéro : <input name="'. $mod->IDCLIENT  .'[]" type="text" value="' . $mod->NUMTEL .'" />  eMail : <input name="'. $mod->IDCLIENT  .'[]" type="text" value="' . $mod->EMAIL .'" />  Profession : <input name="'. $mod->IDCLIENT  .'[]" type="text" value="' . $mod->PROFESSION .'" />  Situation Familiale : <input name="'. $mod->IDCLIENT  .'[]" type="text" value="' . $mod->SITUATION_FAMILIALE .'" /></p>';
	
	$contenu =afficherMenuAgent().'<form id="formModifs" action="site.php" method="post"><fieldset><legend>Recherche client </legend>'.$c.'</p> <p><input type="submit" value="Modifier Client" name="modClient"/></p></fieldset></form>';
	require_once ('gabarit.php');
}

function afficherSynthese($login){
    $contenu =afficherMenuAgent();
	
	require_once ('gabarit.php');
}

function afficherOperation($login){
    $contenu =afficherMenuAgent();
    
	require_once ('gabarit.php');
}

function afficherRDV($login){
    $contenu =afficherMenuAgent();
    
	require_once ('gabarit.php');
}


function afficherMenuAgent(){
    $contenu='<form id="formMenu" method="post" action="site.php"><nav><ul><li><input type="submit" value="Aller à la selection des operation" name="retourAgent"></li><li><input type="submit" value="Deconnexion" name="Deco"></li></ul></nav></form>';
    return $contenu;
}

function afficherErreurAgent($erreur){
    $contenu='<p>'.$erreur.'</p> <p><a href="site.php"/>Revenir au site </p>';
    require_once ('gabarit.php');

}
