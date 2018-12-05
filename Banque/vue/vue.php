<?php

function afficherLog(){
    $contenu ='<form id="monForm1" action="site.php" method="post"><fieldset><legend>Se connecter</legend><p><label>  Login  : </label><input type="text" name="Login"  /></p><p><label>  Mot de passe  : </label><input type="password" name="Mdp"  /></p><p><input type="submit" value="Se Connecter" name="Connecter"><input type="reset" value="Effacer"></p></fieldset></form>';
    require_once('gabarit.php');
}
function afficherDirecteur($con,$com) {
    $comptes=afficherComptes($com);
    $contrats=afficherContrat($con);
    $contenu=$comptes.$contrats;

    require_once ('gabarit.php');

}

function afficherContrat($contrats){
    $c='';
    foreach ($contrats as $con){
        $c=$c.'<p><input type="checkbox" name="nomContrats[]" value="' . $con->NOMCONTRAT .'"> Nom Contrat : <input name="contratmodif[]" type="text" value="' . $con->NOMCONTRAT .'" /> </p>';
    }
    $contenu='<form id="formContrats" action="" method="post"><fieldset><legend>Listes des contrats</legend>'.$c.'<p><label>  Ajouter nom Contrat  : </label><input type="text" name="contrat"  /></p><p><input type="submit" value="Ajouter Contrat" name="AjoutContr"  /><input type="submit" value="Supprimer Contrat" name="delcontrat"  /><input type="submit" value="Modifier Contrat" name="modcontrat"/></p></fieldset></form>';
    return $contenu;

}

function afficherComptes($comptes){
    $c='';
    foreach ($comptes as $com){
        $c=$c.'<p><input type="checkbox" name="nomcomptes[]" value="' . $com->NOMCOMPTE .'"> Nom Compte : <input name="comptemodif" type="text" value="' . $com->NOMCOMPTE .'" /> </p>';
    }
    $contenu='<form id="formComptes" action="" method="post"><fieldset><legend>Listes des Comptes</legend>'.$c.'<p><label>  Ajouter nom Compte  : </label><input type="text" name="compte"  /></p><p><input type="submit" value="Ajouter Compte" name="AjoutCompte"  /> <input type="submit" value="Supprimer Comptes" name="delComptes"  /><input type="submit" value="Modifier Comptes" name="modComptes"/></p></fieldset></form>';
    return $contenu;

}



function afficherConseiller(){
    $contenu='<p>Cest le conseiller ici </p>';
    require_once('gabarit.php');
}

function afficherAgentAcc(){
    $contenu='<p>Cest l oui ici </p>';



    require_once('gabarit.php');
}


function afficherErreur($erreur){
    $contenu='<p>'.$erreur.'</p> <p><a href="site.php"/>Revenir au site </p>';
    require_once ('gabarit.php');

}