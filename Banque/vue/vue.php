<?php

function blabla {
	..
	..
	require_once('gabarit.php');
}


function afficherErreur($erreur){
    $contenu='<p>'.$erreur.'</p> <p><a href="forum.php"/>Revenir au forum </p>';
    require_once ('gabarit.php');

}