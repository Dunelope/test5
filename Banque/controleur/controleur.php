<?php
require_once ('modele/modele.php');
require_once ('vue/vueDirecteur.php');
require_once ('vue/vueAgent.php');
require_once ('vue/vueDirecteur.php');
require_once ('vue/vueConseiller.php');



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
function CtldelContrats($cont){
    delcontrat($cont);
}
function CtlModifierContrat($nomcontrat,$modif){
    modifcontrat($nomcontrat,$modif);
}
function CtlContrats(){
    $con=getContrats();
    afficherContrat($con);
}
function CtlVerifContrats($contrat){
    $con=verifContrat($contrat);
    return $con;
}


/*-------------------------------------------------*/


function CtladdCompte($compte){
    addCompte($compte);
}
function CtldelCompte($compte){
    delcomptes($compte);
}
function CtlModifierCompte($nomcompte,$modif){
    modifcompte($nomcompte,$modif);
}
function CtlCompte(){
    $com=getCompte();
    afficherComptes($com);
}
function CtlVerifCompte($compte){
    $com=verifCompte($compte);
    return $com;
}


/*-------------------------------------------------*/


function CtladdMotif($motif,$pieces){
    addMotif($motif,$pieces);
}
function CtldelMotif($idmotif){
    delMotif($idmotif);
}
function CtlModifierMotif($idMotif,$modif){
    modifMotif($idMotif,$modif);
}
function CtlMotifs(){
    $mot=getMotif();
    afficherMotif($mot);
}
function CtlVerifMotif($motif){
    $mot=verifMotif($motif);
    return $mot;
}



/*-------------------------------------------------*/


function CtladdEmploye($nom,$login,$mdp,$type){
    addEmploye($nom,$login,$mdp,$type);
}
function CtlModifierEmploye($idEmploye,$modifLogin,$modifMDP){
    modifEmploye($idEmploye,$modifLogin,$modifMDP);
}
function CtlEmploye(){
    $em=getEmployer();
    afficherEmployer($em);
}


/*-------------------------------------------------*/


function CtlStats($date1,$date2){
    $con=getStatsContrats($date1,$date2);
    $red=getStatsRDV($date1,$date2);
    $nbCli=getNbClients($date2);
    $montanttot=getmontant();
    afficherStats($con,$red,$nbCli,$montanttot);
}
/*-------------------------------------------------*/
function CtlDirecteur(){
    afficherDirecteur();
}
/*-------------------------------------------------*/

function CtlAgent(){
	afficherAgent();

}
function CtlConseiller(){
    afficherConseiller();

}

function CtlAfficherInscrireCli(){
    afficherInscrireCli();
}

function CtlInscrireCli($id,$nom,$prenom,$datN,$adresse,$numT,$email,$profession,$situation){
    addClient($id,$nom,$prenom,$datN,$adresse,$numT,$email,$profession,$situation);
    afficherConseiller();
}

function CtlAfficherVendreContrat(){
    afficherVendreContrat(listeContrat());
}

function CtlVendreContrat($id,$compte,$tarif){
    vendreContrat($id,$compte,$tarif);
    afficherConseiller();
}

function CtlAfficherOuvrirCompte(){
    afficherOuvrirCompte(listeCompte());
}

function CtlOuvrirCompte($id,$compte,$solde,$decouvert){
    ouvrirCompte($id,$compte,$solde,$decouvert);
    afficherConseiller();
}

function CtlAfficherMenuDecouvert(){
    afficherMenuDecouvert(listeCompte());
}


function CtlModifDecouvert($compte,$valeur){
    modifDecouvert($compte,$valeur);
    afficherConseiller();
}

function CtlAfficherMenuResContrat(){
    afficherMenuResContrat();
}

function CtlAfficherMenuResCompte(){
    afficherMenuResCompte();
}



function CtlErreur($erreur)
{
    afficherErreur($erreur);
}


/*-----------------------------------------------------FONCTION AGENT-------------------------------------*/

function CtlModifierClient($idClient,$adresse,$numTel,$eMail,$profession,$situation_familiale){
    modifClient($idClient,$adresse,$numTel,$eMail,$profession,$situation_familiale);
}
function CtlafficherClient(){
	afficherClient();
}
function CtlModifier($id){
	$mod=getModif($id);
    afficherModif($mod);
}

function CtlafficherClientSynthese(){
	afficherClientSynthese();
}

function CtlSynthese($id){	
	$syn=getSynthese($id);
	$mod=getModif($id);
	$con=getConseiller($id);	
    afficherSynthese($syn,$mod,$con);
}

function CtlOperation(){
	$ope=getOperation();
    afficherOperation($ope);
}

function CtlRDV(){
	$rdv=getRDV();
    afficherRDV($rdv);
}
function CtlAfficherIDClient(){
	afficherClientRechercheID();
}

function CtlTrouverIDClient($nom,$dateN){
	$cli=getIDcli($nom,$dateN);
	afficherIDCli($cli);
}
