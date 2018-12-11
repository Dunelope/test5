<?php
require_once('controleur/controleur.php');    // charge les méthodes du contrôleur
try {
    if (isset($_POST['Connecter']) && !empty($_POST['Login']) && !empty($_POST['Mdp'])) {
        CtlSeconnecter($_POST['Login'], $_POST['Mdp']);
    }

    if (isset($_POST['opera'])) {
        $val = $_POST['ope'];
        if ($val == 'c1') {
            CtlCompte();
        } elseif ($val == 'c2') {
            CtlContrats();
        } elseif ($val == 'c3') {
            CtlMotifs();
        } elseif ($val == 'c4') {
            CtlEmploye();
        } elseif ($val=='c5'){
            CtlStats(1500-01-01,9999-01-01);
        }
    }

    /*-------------------------------------------------*/

    if (isset($_POST['delcontrat'])) {
        if (!empty($_POST['nomContrats'])) {
            foreach ($_POST['nomContrats'] as $valeur) {
                CtldelContrats($valeur);
            }
        }
        CtlContrats();
    }
    if (isset($_POST['delComptes'])){
        if (!empty($_POST['nomcomptes'])) {

            foreach ($_POST['nomcomptes'] as $valeur) {
                CtldelCompte($valeur);
            }
        }
        CtlCompte();
    }

    if (isset($_POST['delMotif'])) {
        if (!empty($_POST['idMotif'])) {
            foreach ($_POST['idMotif'] as $valeur) {
                CtldelMotif($valeur);
            }
        }
        CtlMotifs();
    }

    /*-------------------------------------------------*/


    if (isset($_POST['AjoutContr']) ) {
        if (!empty($_POST['contrat'])) {
            CtladdContrat($_POST['contrat']);
        }
        CtlContrats();
    }

    if (isset($_POST['AjoutCompte'])) {
        if (!empty($_POST['compte'])) {
            CtladdCompte($_POST['compte']);
        }
        CtlCompte();
    }
    if (isset($_POST['AjoutMotif']) ) {
        if (!empty($_POST['motif']) && !empty($_POST['pieces'])) {
            CtladdMotif($_POST['motif'], $_POST['pieces']);
        }
        CtlMotifs();
    }
    if (isset($_POST['AjoutEmploye'])) {
        if ((!empty($_POST['NomEmploye']) && !empty($_POST['LogienEmploye']) && !empty($_POST['MdpEmploye']) && !empty($_POST['TypeEmploye']))) {
            CtladdEmploye($_POST['NomEmploye'], $_POST['LogienEmploye'], $_POST['MdpEmploye'], $_POST['TypeEmploye']);
        }
        CtlEmploye();
    }
    /*-------------------------------------------------*/


    if (isset($_POST['modcontrat'])){
        if (!empty($_POST['nomContrats'])) {
            foreach ($_POST['nomContrats'] as $valeur) {
                $con = $valeur;
                $conSansEspace = preg_replace('/\s+/', '', $con);
                $modif = $_POST[$conSansEspace];
                CtlModifierContrat($con, $modif);
            }
        }
        CtlContrats();
    }

    if (isset($_POST['modComptes'])){
        if (!empty($_POST['nomcomptes'])) {
            foreach ($_POST['nomcomptes'] as $valeur) {
                $com = $valeur;
                $comSansEspace = preg_replace('/\s+/', '', $com);
                $modif = $_POST[$comSansEspace];
                CtlModifierCompte($com, $modif);
            }
        }
        CtlCompte();
    }

    if (isset($_POST['modMotif'])){
        if (!empty($_POST['idMotif'])) {
            foreach ($_POST['idMotif'] as $valeur) {
                $idMotif = $valeur;
                $modif = $_POST[$idMotif];
                CtlModifierMotif($idMotif, $modif);
            }
        }
        CtlMotifs();
    }

    if (isset($_POST['modEmploye'])){
        if (!empty($_POST['idEmploye'])) {
            foreach ($_POST['idEmploye'] as $valeur) {
                $idEmploye = $valeur;
                $modifLogin = $_POST[$idEmploye][0];
                $modifMDP=$_POST[$idEmploye][1];

                CtlModifierEmploye($idEmploye,$modifLogin,$modifMDP);
            }
        }
        CtlEmploye();
    }

    /*-------------------------------------------------*/







    afficherLog();
}catch (Exception $e){
    $msg = $e->getMessage(); 
    CtlErreur($msg);
}
