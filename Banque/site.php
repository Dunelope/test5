<?php
require_once('controleur/controleur.php');    // charge les méthodes du contrôleur
try {
    if (isset($_POST['Connecter']) && !empty($_POST['Login']) && !empty($_POST['Mdp'])) {
        CtlSeconnecter($_POST['Login'], $_POST['Mdp']);

    }

    /*-------------------------------------------------*/

    if (isset($_POST['delcontrat'])) {
        foreach ($_POST['nomContrats'] as $valeur){
            CtldelContrats($valeur);
        }
        CtlDirecteur();
    }
    if (isset($_POST['delComptes'])){
        foreach ($_POST['nomcomptes'] as $valeur){
            CtldelCompte($valeur);
        }
        CtlDirecteur();
    }

    if (isset($_POST['delMotif'])){
        foreach ($_POST['idMotif'] as $valeur){
            CtldelMotif($valeur);
        }
        CtlDirecteur();
    }

    /*-------------------------------------------------*/


    if (isset($_POST['AjoutContr']) && !empty($_POST['contrat'])) {
        CtladdContrat($_POST['contrat']);
        CtlDirecteur();
    }

    if (isset($_POST['AjoutCompte'])) {
        if (!empty($_POST['compte'])){
            CtladdCompte($_POST['compte']);
    }
        CtlDirecteur();
    }
    if (isset($_POST['AjoutMotif']) && !empty($_POST['motif'])&& !empty($_POST['pieces'])) {
        CtladdMotif($_POST['motif'],$_POST['pieces']);
        CtlDirecteur();
    }
    if (isset($_POST['AjoutEmploye']) && !empty($_POST['NomEmploye'])&& !empty($_POST['LogienEmploye'])&& !empty($_POST['MdpEmploye'])&& !empty($_POST['TypeEmploye'])) {
        CtladdEmploye($_POST['NomEmploye'],$_POST['LogienEmploye'],$_POST['MdpEmploye'],$_POST['TypeEmploye']);
        CtlDirecteur();
    }
    /*-------------------------------------------------*/


    if (isset($_POST['modcontrat'])){
        foreach ($_POST['nomContrats'] as $valeur){
            $con =$valeur;
            $conSansEspace=preg_replace('/\s+/', '', $con);
            $modif =$_POST[$conSansEspace];
            CtlModifierContrat($con,$modif);
        }
        CtlDirecteur();
    }

    if (isset($_POST['modComptes'])){
        foreach ($_POST['nomcomptes'] as $valeur){
            $com =$valeur;
            $comSansEspace=preg_replace('/\s+/', '', $com);
            $modif =$_POST[$comSansEspace];
            CtlModifierCompte($com,$modif);
        }
        CtlDirecteur();
    }

    if (isset($_POST['modMotif'])){
        foreach ($_POST['idMotif'] as $valeur){
            $idMotif =$valeur;
            $modif =$_POST[$idMotif];
            CtlModifierMotif($idMotif,$modif);
        }
        CtlDirecteur();
    }

    /*-------------------------------------------------*/







    afficherLog();
}catch (Exception $e){
    $msg = $e->getMessage(); 
    CtlErreur($msg);
}
