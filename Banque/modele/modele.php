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

function getCompte(){
    $connexion=getConnect();
    $requete="Select * from compte";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $touscomptes=$resultat->fetchAll();
    $resultat->closeCursor();
    return $touscomptes;
}
function getMotif(){
    $connexion=getConnect();
    $requete="Select * from motifs";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $tousmotifs=$resultat->fetchAll();
    $resultat->closeCursor();
    return $tousmotifs;
}
function getEmployer(){
    $connexion=getConnect();
    $requete="Select * from Employe";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $tousmotifs=$resultat->fetchAll();
    $resultat->closeCursor();
    return $tousmotifs;
}


/*-------------------------------------------------*/


function addCompte($nomcompte){
    $connexion=getConnect();
    $requete="INSERT INTO `compte`(`NOMCOMPTE`) VALUES ('$nomcompte')";
    $connexion->query($requete);
}

function addContrat($nomcontrat){
    $connexion=getConnect();
    $requete="INSERT INTO `contrat`(`NOMCONTRAT`) VALUES ('$nomcontrat')";
    $connexion->query($requete);
}
function addMotif($nommotif,$listePiece){
    $connexion=getConnect();
    $requete="INSERT INTO `motifs`(`NOMMOTIF`, `LISTEPIECES`) VALUES ('$nommotif','$listePiece')";
    $connexion->query($requete);
}
function addEmploye($nom,$login,$mdp,$type){
    $connexion=getConnect();
    $requete="INSERT INTO `employe`(`NOMEMPLOYE`,`LOGINEMPLOYE`, `MDPEMPLOYE`,`TYPEEMPLOYE`) VALUES ('$nom','$login','$mdp','$type')";
    $connexion->query($requete);
}

/*-------------------------------------------------*/



function delcomptes($nomcompte)
{
    $connexion=getConnect();
    $requete = "delete from compte where nomcompte='$nomcompte'";
    $connexion->query($requete);
}

function delContrat($nomcontrat)
{
    $connexion=getConnect();
    $requete = "delete from contrat where nomcontrat='$nomcontrat'";
    $connexion->query($requete);
}

function delMotif($idmotif)
{
    $connexion=getConnect();
    $requete = "delete from motifs where idmotif='$idmotif'";
    $connexion->query($requete);
}


/*-------------------------------------------------*/


function modifcontrat($nomcontrat,$mod){
    $connexion=getConnect();
    $requete="UPDATE `contrat` SET `nomcontrat`='$mod' WHERE nomcontrat='$nomcontrat'";
    $connexion->query($requete);
}
function modifcompte($nomcompte,$mod){
    $connexion=getConnect();
    $requete="UPDATE `compte` SET `nomcompte`='$mod' WHERE nomcompte='$nomcompte'";
    $connexion->query($requete);
}

function modifMotif($idmotif,$mod){
    $connexion=getConnect();
    $requete="UPDATE `motifs` SET `listePieces`='$mod' WHERE idmotif='$idmotif'";
    $connexion->query($requete);
}

function modifEmploye($idEmploye,$modLog,$modMdp){
    $connexion=getConnect();
    $requete="UPDATE `Employe` SET `LOGINEMPLOYE`='$modLog', `MDPEMPLOYE`='$modMdp' WHERE idEmploye='$idEmploye'";
    $connexion->query($requete);
}

