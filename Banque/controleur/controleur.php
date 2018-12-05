<?php
require_once ('modele/modele.php');
require_once ('vue/vue.php');

function ctlSeConnecter($logi,$mdp){
    $type=LoginEmploye($logi,$mdp);
    if ($logi!=null && $mdp!=null) {
        if ($type== 'Directeur') {
            afficherDirecteur();
        } elseif ($type== 'Conseiller') {
            afficherConseiller();
        } elseif ($type == 'Agent') {
            afficherAgentAcc();
        } else {
            throw new Exception("Type employe incorecte");
    }
    }else{
        throw new Exception("Un des champs est vide");
    }

}

function CtlContrats(){
    $con=getContrats();
    afficherContrat($con);

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