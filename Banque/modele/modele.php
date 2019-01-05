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

function modifSolde($idClient,$nomCompte,$modSolde){
	$connexion=getConnect();
    $requete="UPDATE `CompteClient` SET `SOLDE`='$modSolde' WHERE idClient='$idClient' and nomCompte='$nomCompte'";
    $connexion->query($requete);
}

function ajouterOperation($idClient,$nomCompte,$nomOperation,$montant){
    $connexion=getConnect();
    $requete="INSERT INTO `operation` (`IDCLIENT`, `NOMCOMPTE`, `NOMOPERATION`, `MONTANT`) values ('$idClient','$nomCompte','$nomOperation','$montant')";
    $connexion->query($requete);
}


function getSolde($id,$nomCompte){
	$connexion=getConnect();
    $requete="Select * from compteClient where idClient='$id' and nomCompte='$nomCompte'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $solde=$resultat->fetch();
    $resultat->closeCursor();
    return $solde;
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

function getContratClient($id){
    $connexion=getConnect();
    $requete="Select * from contratClient where idClient='$id'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $contratscli=$resultat->fetchAll();
    $resultat->closeCursor();
    return $contratscli;
}


function getOperation($id){
    $connexion=getConnect();
    $requete="Select * from compteClient where idClient='$id'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $tousoperations=$resultat->fetchAll();
    $resultat->closeCursor();
    return $tousoperations;
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

function trouverConseillerDeClient($idClient){
    $connexion=getConnect();
    $requete="Select idemploye from client where idclient='$idClient'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(pdo::FETCH_OBJ);
    $employe=$resultat->fetch();
    $resultat->closeCursor();
    return $employe;
}

function getrdvEmploye($idemploye,$datedebutSemaine,$dateFinSemaine){

    $connexion=getConnect();
    $requete="Select DATERDV from rendez_vous where idemploye='$idemploye' and daterdv between '$datedebutSemaine' and '$dateFinSemaine' order by TIME(daterdv),daterdv asc";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(pdo::FETCH_OBJ);
    $rdvEmploye=$resultat->fetchAll();
    $resultat->closeCursor();
    return $rdvEmploye;
}

function getListePieces($nomMotif){
    $connexion=getConnect();
    $requete="Select LISTEPIECES from motifs where NOMMOTIF='$nomMotif'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(pdo::FETCH_OBJ);
    $listeMotifs=$resultat->fetch();
    $resultat->closeCursor();
    return $listeMotifs;
}

function enregisterRdv($daterdv,$idMotif,$idClient,$idEmploye){ // format Y-m-d H:i
    $connexion=getConnect();
    $requete="INSERT INTO `rendez_vous` (`IDMOTIF`, `IDCLIENT`, `IDEMPLOYE`, `DATERDV`) values ('$idMotif','$idClient','$idEmploye','$daterdv')";
    $connexion->query($requete);
}

function getidMotif($nomMotif){
        $connexion=getConnect();
        $requete="Select IDMOTIF from motifs where NOMMOTIF='$nomMotif'";
        $resultat=$connexion->query($requete);
        $resultat->setFetchMode(pdo::FETCH_OBJ);
        $idMotifs=$resultat->fetch();
        $resultat->closeCursor();
        return $idMotifs;
}

function verifRechercheClient($nomClient,$dateN){
    $connexion=getConnect();
    $requete="Select * from client where nomCli='$nomClient' and dateNaissCli='$dateN'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(pdo::FETCH_OBJ);
    $clientExite=$resultat->fetch();
    $resultat->closeCursor();
    return $clientExite;
}


/*------------------------------------------CONSEILLER-------------------------------------------*/

function verifClient($idClient){
    $connexion=getConnect();
    $requete="Select * from client where idclient='$idClient'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(pdo::FETCH_OBJ);
    $clientExite=$resultat->fetch();
    $resultat->closeCursor();
    return $clientExite;
}

function verifConseiller($idConseiller){
    $connexion=getConnect();
    $requete="Select * from employe where idemploye='$idConseiller'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(pdo::FETCH_OBJ);
    $clientExite=$resultat->fetch();
    $resultat->closeCursor();
    return $clientExite;
}
function verifContratClient($idclient,$contrat){
    $connexion=getConnect();
    $requete="Select * from contratclient where idclient='$idclient' and nomcontrat='$contrat'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(pdo::FETCH_OBJ);
    $clientExite=$resultat->fetch();
    $resultat->closeCursor();
    return $clientExite;
}

function verifcompteClient($id,$compte){
    $connexion=getConnect();
    $requete="Select * from compteclient where idclient='$id' and nomcompte='$compte'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(pdo::FETCH_OBJ);
    $clientExite=$resultat->fetch();
    $resultat->closeCursor();
    return $clientExite;
}

function getrdvEmployeSansClient($idemploye,$datedebutSemaine,$dateFinSemaine){
    $connexion=getConnect();
    $requete="Select DATERDV from rendez_vous where idemploye='$idemploye' and idClient is NULL and daterdv between '$datedebutSemaine' and '$dateFinSemaine' order by TIME(daterdv),daterdv asc";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(pdo::FETCH_OBJ);
    $rdvEmploye=$resultat->fetchAll();
    $resultat->closeCursor();
    return $rdvEmploye;
}

function addClient($id,$nom,$prenom,$datN,$adresse,$numT,$email,$profession,$situation){
    $connexion = getConnect();
    $requete = "INSERT INTO Client VALUES (DEFAULT,'$id','$nom','$prenom','$datN','$adresse','$numT','$email','$profession','$situation') ";
    $connexion->query($requete);
}

function listeContrat(){
    $connexion=getConnect();
    $requete="Select * from Contrat";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $c=$resultat->fetchAll();
    $resultat->closeCursor();
    return $c;
}

function vendreContrat($id,$contrat,$tarif){
    $connexion=getConnect();
    $test = "SELECT * FROM ContratClient WHERE idclient='$id'";
    $condi=$connexion->query($test);
    $condi->setFetchMode(PDO::FETCH_OBJ);
    $list=$condi->fetchAll();
    $condi->closeCursor();
    foreach ($list as $x){
        if($x->NOMCONTRAT == $contrat){
            return NULL;
        }
    }
    $requete = "INSERT INTO ContratClient VALUES('$id','$contrat',DATE(NOW()),'$tarif')";
    $connexion->query($requete);
}

function listeCompte(){
    $connexion=getConnect();
    $requete="Select * from Compte";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $c=$resultat->fetchAll();
    $resultat->closeCursor();
    return $c;
}

function ouvrirCompte($id,$compte,$solde,$decouvert){
    $connexion=getConnect();
    $test = "SELECT * FROM CompteClient WHERE idclient='$id'";
    $condi=$connexion->query($test);
    $condi->setFetchMode(PDO::FETCH_OBJ);
    $list=$condi->fetchAll();
    $condi->closeCursor();
    foreach ($list as $x){
        if($x->NOMCOMPTE == $compte){
            return NULL;
        }
    }
    $requete = "INSERT INTO CompteClient VALUES('$id','$compte',DATE(NOW()),'$solde','$decouvert')";
    $connexion->query($requete);
}

function modifDecouvert($id,$compte,$valeur){
    $connexion=getConnect();
    $requete= "UPDATE compteclient SET MONTANTDECOUVERT='$valeur' WHERE NOMCOMPTE='$compte'AND IDCLIENT='$id'";
    $connexion->query($requete);
}
function resContrat($id,$contrat){
    $connexion=getConnect();
    $requete="DELETE FROM contratclient WHERE idclient='$id' and NOMCONTRAT='$contrat'";
    $connexion->query($requete);
}

function resCompte($id,$compte){
    $connexion=getConnect();
    $requete="DELETE FROM compteclient WHERE idclient='$id' and NOMCOMPTE='$compte'";
    $connexion->query($requete);
}

function chercheCompte($id){
    $connexion=getConnect();
    $requete = "SELECT * FROM compteclient WHERE idclient='$id'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $c=$resultat->fetchAll();
    $resultat->closeCursor();
    return $c;
}

function cherchenonCompte($id){
    $connexion=getConnect();
    $requete = "SELECT * FROM compte WHERE nomcompte NOT IN (SELECT nomcompte FROM compteclient WHERE idclient='$id')";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $c=$resultat->fetchAll();
    $resultat->closeCursor();
    return $c;
}

function chercheContrat ($id){
    $connexion=getConnect();
    $requete = "SELECT * FROM contratclient WHERE idclient='$id'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $c=$resultat->fetchAll();
    $resultat->closeCursor();
    return $c;
}

function cherchenonContrat ($id){
    $connexion=getConnect();
    $requete = "SELECT * FROM contrat WHERE nomcontrat NOT IN (SELECT nomcontrat FROM contratclient WHERE idclient='$id')";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $c=$resultat->fetchAll();
    $resultat->closeCursor();
    return $c;
}

function getConseillerRDV(){
	$connexion=getConnect();
    $requete = "SELECT * FROM employe WHERE TYPEEMPLOYE='Conseiller'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $conseiller=$resultat->fetchAll();
    $resultat->closeCursor();
    return $conseiller;
}

function enregisterIndispo($daterdv,$idEmploye){ // format Y-m-d H:i
    $connexion=getConnect();
    $requete="INSERT INTO `rendez_vous` (`IDEMPLOYE`, `DATERDV`) values ('$idEmploye','$daterdv')";
    $connexion->query($requete);
}

function getClientRDV($dateRDV){
	$connexion=getConnect();
    $requete = "SELECT * FROM rendez_vous WHERE DATERDV='$dateRDV'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $clientRDV=$resultat->fetch();
    $resultat->closeCursor();
    return $clientRDV;
}

function IDClientEstNull($idEmploye,$rdv){
	$connexion=getConnect();
    $requete = "SELECT * FROM rendez_vous WHERE idClient='null' and idEmploye='$idEmploye' and dateRDV='$rdv' ";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $idClientRDV=$resultat->fetchAll();
    $resultat->closeCursor();
    return $idClientRDV;
}

function getMotifRDV($idMotif){
	$connexion=getConnect();
    $requete = "SELECT * FROM motifs WHERE idMotif='$idMotif'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $motifRDV=$resultat->fetch();
    $resultat->closeCursor();
    return $motifRDV;
}
	
	

function estNewClient($idClient){
    $connexion=getConnect();
    $requete="select client.IDCLIENT from client left JOIN contratclient USING (IDCLIENT) LEFT JOIN compteclient USING(IDCLIENT) where contratclient.IDCLIENT is null AND compteclient.IDCLIENT is null AND client.idClient='$idClient'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $idClientTrouve=$resultat->fetchAll();
    $resultat->closeCursor();
    return $idClientTrouve;

}


function verifEmploye($logi,$mdp){
	$connexion=getConnect();
    $requete="Select * from Employe where loginEmploye='$logi' and mdpEmploye='$mdp'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(pdo::FETCH_OBJ);
    $verifemploye=$resultat->fetch();
    $resultat->closeCursor();
    return $verifemploye;
}

	