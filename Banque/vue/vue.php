<?php

function afficherLog(){
    $contenu ='<form id="monForm1" action="site.php" method="post"><fieldset><legend>Se connecter</legend><p><label>  Login  : </label><input type="text" name="Login"  /></p><p><label>  Mot de passe  : </label><input type="text" name="Mdp"  /></p><p><input type="submit" value="Se Connecter" name="Connecter"><input type="reset" value="Effacer"></p></fieldset></form>';
    require_once('gabarit.php');
}
function afficherDirecteur() {
    $contenu='<p>Cest le directeur ici </p>';


	require_once('gabarit.php');
}

function afficherConseiller(){
    require_once('gabarit.php');
}

function afficherAgentAcc(){


    require_once('gabarit.php');
}


function afficherErreur($erreur){
    $contenu='<p>'.$erreur.'</p> <p><a href="site.php"/>Revenir au forum </p>';
    require_once ('gabarit.php');

}