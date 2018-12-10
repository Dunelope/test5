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
function CtlStats($date1,$date2){
    $con=getStatsContrats($date1,$date2);
    $red=getStatsRDV($date1,$date2);
    $nbCli=getNbClients($date1);
    $montanttot=getmontant($date1);
    afficherStats($con,$red,$nbCli,$montanttot);
}



/*-------------------------------------------------*/
function CtlDirecteur(){

    afficherDirecteur();
}

function CtlContrats(){
    $con=getContrats();
    afficherContrat($con);
}

function CtlCompte(){
    $com=getCompte();
    afficherComptes($com);
}

function CtlMotifs(){
    $mot=getMotif();
    afficherMotif($mot);
}

function CtlEmploye(){
    $em=getEmployer();
    afficherEmployer($em);
}
/*-------------------------------------------------*/

function CtlAgent(){


}
function CtlConseiller(){

}


function CtlErreur($erreur)
{
    afficherErreur($erreur);
}