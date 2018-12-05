<?php
require_once ('modele/modele.php');
require_once ('vue/vue.php');

function ctlSeConnecter($logi,$mdp){
    $type=LoginEmploye($logi,$mdp);
    if ($logi!=null && $mdp!=null) {
        if ($type== 'Directeur') {
            CtlDirecteur();
        } elseif ($type== 'Conseiller') {
            CtlConseiller();
        } elseif ($type == 'Agent') {
            CtlAgent();
        } else {
            throw new Exception("Type employe incorecte");
    }
    }else{
        throw new Exception("Un des champs est vide");
    }

}

function CtladdContrat($contrat){
    addContrat($contrat);
}

function CtladdCompte($compte){
    addCompte($compte);
}

function CtlContrats(){
    $con=getContrats();
    afficherContrat($con);
}
function CtlComptes(){
    $com=getCompte();
    afficherComptes($com);
}

function CtlDirecteur(){
    $con=getContrats();
    $com=getCompte();
    afficherDirecteur($con,$com);
}

function CtldelCompte($compte){
    delcomptes($compte);
}
function CtldelContrats($cont){
    delcontrat($cont);
}

function CtlModifierCompte($nomcompte,$modif){
    modifcompte($nomcompte,$modif);
}
function CtlModifierContrat($nomcontrat,$modif){
    modifcontrat($nomcontrat,$modif);
}

function CtlAgent(){


}
function CtlConseiller(){

}


function CtlErreur($erreur)
{
    afficherErreur($erreur);
}