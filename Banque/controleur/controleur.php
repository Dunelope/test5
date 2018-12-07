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


/*-------------------------------------------------*/

function CtladdContrat($contrat){
    addContrat($contrat);
}

function CtladdCompte($compte){
    addCompte($compte);
}
function CtladdMotif($motif,$pieces){
    addMotif($motif,$pieces);
}
function CtladdEmploye($nom,$login,$mdp,$type){
    addEmploye($nom,$login,$mdp,$type);
}



/*-------------------------------------------------*/

function CtldelCompte($compte){
    delcomptes($compte);
}
function CtldelContrats($cont){
    delcontrat($cont);
}
function CtldelMotif($idmotif){
    delMotif($idmotif);
}
/*-------------------------------------------------*/

function CtlModifierCompte($nomcompte,$modif){
    modifcompte($nomcompte,$modif);
}
function CtlModifierContrat($nomcontrat,$modif){
    modifcontrat($nomcontrat,$modif);
}
function CtlModifierMotif($idMotif,$modif){
    modifMotif($idMotif,$modif);
}
function CtlModifierEmploye($idEmploye,$modifLogin,$modifMDP){
    modifEmploye($idEmploye,$modifLogin,$modifMDP);
}

/*-------------------------------------------------*/
function CtlDirecteur(){
    $con=getContrats();
    $com=getCompte();
    $mot=getMotif();
    $eml=getEmployer();
    afficherDirecteur($con,$com,$mot,$eml);
}

function CtlAgent(){


}
function CtlConseiller(){

}


function CtlErreur($erreur)
{
    afficherErreur($erreur);
}