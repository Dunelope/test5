<?php
require_once('connect.php');

function getConnect(){
    $connexion=new PDO('mysql:host='.SERVEUR.';dbname='.BDD,USER,PASSWORD);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connexion->query('SET NAMES UTF8');
    return $connexion;
}

function LoginEmploye($login,$mdp){
    $connexion=getConnect();
    $requete="SELECT typeemploye from employe where loginemploye='$login' and mdpemploye='$mdp'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $typeEmp=$resultat->fetch();
    $typeEmp=$typeEmp->typeemploye;
    $resultat->closeCursor();
    return $typeEmp;
}

/*-------------------------------------------------*/

function getContrats(){
    $connexion=getConnect();
    $requete="Select * from CONTRAT";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $touscontrats=$resultat->fetchAll();
    $resultat->closeCursor();
    return $touscontrats;
}
function addContrat($nomcontrat){
    $connexion=getConnect();
    $requete="INSERT INTO `contrat`(`NOMCONTRAT`) VALUES ('$nomcontrat')";
    $connexion->query($requete);
}
function delContrat($nomcontrat)
{
    $connexion=getConnect();
    $requete = "delete from contrat where nomcontrat='$nomcontrat'";
    $connexion->query($requete);
}
function modifcontrat($nomcontrat,$mod){
    $connexion=getConnect();
    $requete="UPDATE `contrat` SET `nomcontrat`='$mod' WHERE nomcontrat='$nomcontrat'";
    $connexion->query($requete);
}

function verifContrat($nomContrat){
    $connexion=getConnect();
    $requete="Select * from CONTRAT where nomcontrat='$nomContrat'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $contratExiste=$resultat->fetch();
    return $contratExiste;
}


/*-------------------------------------------------*/


function getCompte(){
    $connexion=getConnect();
    $requete="Select * from compte";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $touscomptes=$resultat->fetchAll();
    $resultat->closeCursor();
    return $touscomptes;
}
function addCompte($nomcompte){
    $connexion=getConnect();
    $requete="INSERT INTO `compte`(`NOMCOMPTE`) VALUES ('$nomcompte')";
    $connexion->query($requete);
}
function delcomptes($nomcompte)
{
    $connexion=getConnect();
    $requete = "delete from compte where nomcompte='$nomcompte'";
    $connexion->query($requete);
}
function modifcompte($nomcompte,$mod){
    $connexion=getConnect();
    $requete="UPDATE `compte` SET `nomcompte`='$mod' WHERE nomcompte='$nomcompte'";
    $connexion->query($requete);
}

function verifCompte($nomCompte){
    $connexion=getConnect();
    $requete="Select * from compte where nomcompte='$nomCompte'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $compteExiste=$resultat->fetch();
    return $compteExiste;
}


/*-------------------------------------------------*/


function getMotif(){
    $connexion=getConnect();
    $requete="Select * from motifs";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $tousmotifs=$resultat->fetchAll();
    $resultat->closeCursor();
    return $tousmotifs;
}
function addMotif($nommotif,$listePiece){
    $connexion=getConnect();
    $requete="INSERT INTO `motifs`(`NOMMOTIF`, `LISTEPIECES`) VALUES ('$nommotif','$listePiece')";
    $connexion->query($requete);
}
function delMotif($idmotif)
{
    $connexion=getConnect();
    $requete = "delete from motifs where idmotif='$idmotif'";
    $connexion->query($requete);
}
function modifMotif($idmotif,$mod){
    $connexion=getConnect();
    $requete="UPDATE `motifs` SET `listePieces`='$mod' WHERE idmotif='$idmotif'";
    $connexion->query($requete);
}

function verifMotif($nommotif){
    $connexion=getConnect();
    $requete="Select * from motifs where NOMMOTIF='$nommotif'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $compteMotif=$resultat->fetch();
    return $compteMotif;
}


/*-------------------------------------------------*/


function getEmployer(){
    $connexion=getConnect();
    $requete="Select * from Employe";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $tousmotifs=$resultat->fetchAll();
    $resultat->closeCursor();
    return $tousmotifs;
}
function addEmploye($nom,$login,$mdp,$type){
    $connexion=getConnect();
    $requete="INSERT INTO `employe`(`NOMEMPLOYE`,`LOGINEMPLOYE`, `MDPEMPLOYE`,`TYPEEMPLOYE`) VALUES ('$nom','$login','$mdp','$type')";
    $connexion->query($requete);
}
function modifEmploye($idEmploye,$modLog,$modMdp){
    $connexion=getConnect();
    $requete="UPDATE `Employe` SET `LOGINEMPLOYE`='$modLog', `MDPEMPLOYE`='$modMdp' WHERE idEmploye='$idEmploye'";
    $connexion->query($requete);
}



/*-------------------------------------------------*/
function getStatsContrats($date1,$date2){
    $connexion=getConnect();
    $requete="Select Count(*) from compteClient where dateouverture between '$date1' and '$date2'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $x=null;
    foreach ($resultat->fetch() as $val) {
        $x= $val; // a revoir si erreur
    }
    return $x;
}

function getStatsRDV($date1,$date2){
    $connexion=getConnect();
    $requete="Select Count(*) from rendez_vous where daterdv between '$date1' and '$date2' ";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    foreach ($resultat->fetch() as $val) {
        $x= $val; // a revoir si erreur
    }
    return $x;

}
/*
  SELECT COUNT(*) from client where IDCLIENT IN(SELECT idclient FROM client NATURAL JOIN contratclientWHERE dateOuvertureContrat <= '$date'UNIONSELECT idclient FROM client NATURAL JOIN compteclientWHERE dateouverture <= '$date')
 */
//    $requete="Select Count(*) from contratClient where dateouvertureContrat <= '$date'";
function getNbClients($date){
    $connexion=getConnect();
        //$requete="Select Count(*) from contratClient where dateouvertureContrat <= '$date'";
    $requete="SELECT COUNT(*) from client where IDCLIENT IN ( SELECT idclient FROM client NATURAL JOIN contratclient WHERE dateOuvertureContrat <= '$date' UNION  SELECT idclient FROM client NATURAL JOIN compteclient WHERE dateouverture <= '$date');";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $x=null;
    foreach ($resultat->fetch() as $val) {
        $x= $val; // a revoir si erreur
    }
    return $x;

}

function getmontant()
{
    $connexion = getConnect();
    $requete = "Select sum(solde) from compteClient where dateouverture <= now()";
    $resultat = $connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $x=null;
    foreach ($resultat->fetch() as $val) {
        $x= $val; // a revoir si erreur
    }
    return $x;

}

/*-------------------------------MODELE AGENT------------------------------------------------------------------------*/

function modifClient($idClient,$modAdresse,$modNumtel,$modEmail,$modProfession,$modSituation_familiale){
    $connexion=getConnect();
    $requete="UPDATE `Client` SET `ADRESSE`='$modAdresse', `NUMTEL`='$modNumtel', `EMAIL`='$modEmail', `PROFESSION`='$modProfession', `SITUATION_FAMILIALE`='$modSituation_familiale' WHERE idClient='$idClient'";
    $connexion->query($requete);
}

function getModif($id){
    $connexion=getConnect();
    $requete="Select * from Client where idClient='$id'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $tousmodifs=$resultat->fetch();
    $resultat->closeCursor();
    return $tousmodifs;
}
function getSynthese($id){
    $connexion=getConnect();
    $requete="Select * from CompteClient where idClient='$id'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $tousclients=$resultat->fetchAll();
    $resultat->closeCursor();
    return $tousclients;
}


function getConseiller($id){
    $connexion=getConnect();
    $requete="Select * from Employe natural join Client where idClient='$id'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $tousconseiller=$resultat->fetch();
    $resultat->closeCursor();
    return $tousconseiller;
}


function getOperation(){
    $connexion=getConnect();
    $requete="Select * from Client";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $tousoperations=$resultat->fetchAll();
    $resultat->closeCursor();
    return $tousoperations;
}
function getRDV(){
    $connexion=getConnect();
    $requete="Select * from Client";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $tousrdv=$resultat->fetchAll();
    $resultat->closeCursor();
    return $tousrdv;
}

function getIDcli($nom,$dateN) {
	$connexion=getConnect();
    $requete="Select * from Client where nomCli='$nom' and dateNaissCli='$dateN'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $idclient=$resultat->fetch();
    $resultat->closeCursor();
    return $idclient;
}