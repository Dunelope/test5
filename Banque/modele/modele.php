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
    $requette="SELECT typeemploye from employe where loginemploye='$login' and mdpemploye='$mdp'";
    $resultat=$connexion->query($requette);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $typeEmp=$resultat->fetch();
    $typeEmp=$typeEmp->typeemploye;
    $resultat->closeCursor();
    return $typeEmp;
}

function getContrats(){
    $connexion=getConnect();
    $requette="Select * from CONTRAT";
    $resultat=$connexion->query($requette);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $touscontrats=$resultat->fetchAll();
    $resultat->closeCursor();
    return $touscontrats;
}

function getCompte(){
    $connexion=getConnect();
    $requette="Select * from compte";
    $resultat=$connexion->query($requette);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $touscomptes=$resultat->fetchAll();
    $resultat->closeCursor();
    return $touscomptes;
}

function addCompte($nomcompte){
    $connexion=getConnect();
    $requette="INSERT INTO `compte`(`NOMCOMPTE`) VALUES ('$nomcompte')";
    $connexion->query($requette);
}

function addContrat($nomcontrat){
    $connexion=getConnect();
    $requette="INSERT INTO `contrat`(`NOMCONTRAT`) VALUES ('$nomcontrat')";
    $connexion->query($requette);
}

function delcomptes($nomcompte)
{
    $connexion=getConnect();
    $requete2 = "delete from compte where nomcompte='$nomcompte'";
    $connexion->query($requete2);
}

function delContrat($nomcontrat)
{
    $connexion=getConnect();
    $requete2 = "delete from contrat where nomcontrat='$nomcontrat'";
    $connexion->query($requete2);
}
function modifcontrat($nomcontrat,$mod){
    $connexion=getConnect();
    $requette="UPDATE `contrat` SET `NOMCONTRAT`='$mod' WHERE '$nomcontrat'";
    $connexion->query($requette);
}
function modifcompte($nomcompte,$mod){
    $connexion=getConnect();
    $requette="UPDATE `compte` SET `NOMCONTRAT`='$mod' WHERE '$nomcompte'";
    $connexion->query($requette);
}