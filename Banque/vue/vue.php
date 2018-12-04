<?php

function afficherLog(){
    $contenu ='<form id="monForm1" action="site.php" method="post"><fieldset><legend>Se connecter</legend><p><label>  Login  : </label><input type="text" name="Login"  /></p><p><label>  Mot de passe  : </label><input type="text" name="Mdp"  /></p><p><input type="submit" value="Se Connecter" name="Connecter"><input type="reset" value="Effacer"></p></fieldset></form>';
    require_once('gabarit.php');
}
function afficherDirecteur() {
    CtlContrats();


}

function afficherContrat($contrats){
    $c='';
    foreach ($contrats as $con){
        $c=$c.'<p><input type="checkbox" name="' . $con->NOMCONTRAT . '"> Nom Contrat : <input type="text" style="width:350px" value="' . $con->NOMCONTRAT .'" readonly="readonly"/> </p>';
    }
    $contenu='<form id="formContrats"><fieldset><legend>Listes des contrats</legend>'.$c.'<p> <input type="submit" value="Supprimer Contrat" name="delcontrat"  /><input type="submit" value="modifierContrat" name="modcontrat"/></p></fieldset></form>';
    require_once('gabarit.php');

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
    $contenu='<p>'.$erreur.'</p> <p><a href="site.php"/>Revenir au forum </p>';
    require_once ('gabarit.php');

}