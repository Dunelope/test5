<?php
require_once ('modele/modele.php');
require_once ('vue/vue.php');

function CtlAcceuil(){
    afficherAccueuil();
}
function ctlSeConnecter(){

}

function CtlDirecteur(){

}
function CtlAgent(){


}
function CtlConseiller(){

}


function CtlErreur($erreur)
{
    afficherErreur($erreur);
}