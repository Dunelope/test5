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