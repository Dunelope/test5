<?php
require_once('controleur/controleur.php');    // charge les méthodes du contrôleur
try {
    if (isset($_POST['Connecter'])&&!empty($_POST['Login']) && !empty($_POST['Mdp'])) {
        CtlSeconnecter();

	
	}
	afficherLog();
}catch (Exception $e){
    $msg = $e->getMessage(); 
    CtlErreur($msg);
}
