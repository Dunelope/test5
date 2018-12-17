<?php


function afficherAgent(){    
	$contenu=afficherMenuAgent().'<form id=monForm2 action="site.php" method="post"> <fieldset><legend>Selection opperation</legend><p><select name="opeAgent"><option value="c1">Modifier informations client</option><option value="c2">Synthese client</option><option value="c3">Opération sur le compte</option><option value="c4">Rendez-vous</option><option value="c5">Retrouver identifiant client</option></select><input type="submit" value="Selectionner" name="operaAgent"></p></fieldset></form>';
    require_once('gabarit.php');
}


function afficherLogAgent(){
    $contenu ='<form id="monForm1" action="site.php" method="post"><fieldset><legend>Se connecter</legend><p><label>  Login  : </label><input type="text" name="Login"  /></p><p><label>  Mot de passe  : </label><input type="password" name="Mdp"  /></p><p><input type="submit" value="Se Connecter" name="Connecter"><input type="reset" value="Effacer"></p></fieldset></form>';
    require_once('gabarit.php');
}


function afficherClient(){
	
	$contenu=afficherMenuAgent().'<form id="monForm1" action="site.php" method="post"><fieldset><legend>Modification Informations Client</legend><p>Entrez identifiant du client recherché : <input type="text"  name="SelectClientModif"> <input type="submit" name="RechercherClientModif" value="Rechercher ce Client" /></fieldset></form>';
	require_once('gabarit.php');
}


function afficherModif($mod){
	$c='';
	$c=$c.'<p><input type="checkbox" name="idClient[]" value="' . $mod->IDCLIENT .'">'.$mod->NOMCLI.'  Adresse : <input name="'. $mod->IDCLIENT  .'[]" type="text" value="' . $mod->ADRESSE .'" />  Numéro : <input name="'. $mod->IDCLIENT  .'[]" type="text" value="' . $mod->NUMTEL .'" />  eMail : <input name="'. $mod->IDCLIENT  .'[]" type="text" value="' . $mod->EMAIL .'" />  Profession : <input name="'. $mod->IDCLIENT  .'[]" type="text" value="' . $mod->PROFESSION .'" />  Situation Familiale : <input name="'. $mod->IDCLIENT  .'[]" type="text" value="' . $mod->SITUATION_FAMILIALE .'" /></p>';
	
	$contenu=afficherMenuAgent().'<form id="formModifs" action="site.php" method="post"><fieldset><legend>Recherche client </legend>'.$c.'</p> <p><input type="submit" value="Modifier Client" name="modClient"/></p></fieldset></form>';
	require_once ('gabarit.php');
}


function afficherClientSynthese(){
    
	$contenu=afficherMenuAgent().'<form id="monForm2" action="site.php" method="post"><fieldset><legend>Synthese Client</legend><p>Entrez identifiant du client recherché : <input type="text"  name="SelectClientSynthese"> <input type="submit" name="RechercherClientSynthese" value="Afficher Synthese" /></fieldset></form>';
	require_once('gabarit.php');
}


function afficherSynthese($synthese,$mod,$con,$contrat){
	$c='';
	$co='';	
	$contrats='';	
	$c=$c.'<p><label>Nom du client : <input name="'. $mod->IDCLIENT  .'[]" type="text" value="' . $mod->NOMCLI .'" readonly="readonly" /></label></p><p><label>Adresse : <input name="'. $mod->IDCLIENT  .'[]" type="text" value="' . $mod->ADRESSE .'" readonly="readonly" /> </label></p><p><label> Numéro : <input name="'. $mod->IDCLIENT  .'[]" type="text" value="' . $mod->NUMTEL .'" readonly="readonly" /></label></p><p><label>eMail : <input name="'. $mod->IDCLIENT  .'[]" type="text" value="' . $mod->EMAIL .'" readonly="readonly" /></label></p><p><label>Profession : <input name="'. $mod->IDCLIENT  .'[]" type="text" value="' . $mod->PROFESSION .'" readonly="readonly"/></label></p><p><label>Situation Familiale : <input name="'. $mod->IDCLIENT  .'[]" type="text" value="' . $mod->SITUATION_FAMILIALE .'" readonly="readonly"/></label></p>';
	
	$contenu='<p><fieldset><legend>Liste informations client</legend>'.$c.'<p>Nom du conseiller : <input name"'. $con->IDEMPLOYE .'[]" type="text" value="' . $con->NOMEMPLOYE .'" readonly="readonly"/></p></fieldset></p>';
		
	foreach ($synthese as $syn){
		$co=$co.'<p>Nom du compte : <input name="'. $syn->IDCLIENT  .'[]" type="text" value="' . $syn->NOMCOMPTE .'" readonly="readonly" />  Date ouverture : <input name="'. $syn->IDCLIENT  .'[]" type="text" value="' . $syn->DATEOUVERTURE .'" readonly="readonly"/>  Solde : <input name="'. $syn->IDCLIENT  .'[]" type="text" value="' . $syn->SOLDE .'" readonly="readonly"/>  Montante du decouvert autorisé : <input name="'. $syn->IDCLIENT  .'[]" type="text" value="' . $syn->MONTANTDECOUVERT .'" readonly="readonly"/></p>';
		}
	foreach ($contrat as $ctr){
		$contrats=$contrats.'<p>Nom du contrat : <input name="'. $ctr->IDCLIENT  .'[]" type="text" value="' . $ctr->NOMCONTRAT .'" readonly="readonly" />  Date ouverture : <input name="'. $syn->IDCLIENT  .'[]" type="text" value="' . $ctr->DATEOUVERTURECONTRAT .'" readonly="readonly"/>  Tarif mensuel : <input name="'. $ctr->IDCLIENT  .'[]" type="text" value="' . $ctr->TARIFMENSUEL .'" readonly="readonly"/></p>';
		}
	$contenu=afficherMenuAgent().'<fieldset><legend>Synthese client </legend>'.$contenu.'<p><fieldset><legend>Liste des comptes du client</legend>'.$co.'</fieldset></p><p><fieldset><legend>Liste des contrat du client</legend>'.$contrats.'</fieldset></p></fieldset>';
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


function afficherClientRechercheID(){
    
	$contenu=afficherMenuAgent().'<form id="monForm3" action="site.php" method="post"><fieldset><legend>Recherce identifiant client</legend><p>Entrez nom du client recherché : <input type="text"  name="SelectClientNom"> Date de naissance du client recherché : <input type="date"  name="SelectClientDateN"> <input type="submit" name="RechercherClientID" value="Afficher id client" /></fieldset></form>';
	require_once('gabarit.php');
}


function afficherIDCli($cli) {
	 $contenu =afficherMenuAgent().'<p><fieldset><legend>Recherche identifiant client</legend><p>Identifiant du client : <input name="IDCLIENT" type="text" value="' . $cli->IDCLIENT .'" /></p></legend></p';
    
	require_once ('gabarit.php');
}
	

function afficherErreurAgent($erreur){
    $contenu='<p>'.$erreur.'</p> <p><a href="site.php"/>Revenir au site </p>';
    require_once ('gabarit.php');
}
