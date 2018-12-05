<?php
require_once('controleur/controleur.php');    // charge les méthodes du contrôleur
try {
    if (isset($_POST['Connecter']) && !empty($_POST['Login']) && !empty($_POST['Mdp'])) {
        CtlSeconnecter($_POST['Login'], $_POST['Mdp']);

    }
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
    if (isset($_POST['modcontrat'])){
        foreach (array_combine($_POST['nomContrats'],$_POST['contratmodif']) as $nomCon => $nommodif){
            CtlModifierCompte($nomCon,$nommodif);


        }
    }






        afficherLog();
}catch (Exception $e){
    $msg = $e->getMessage(); 
    CtlErreur($msg);
}
