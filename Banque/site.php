<?php
require_once('controleur/controleur.php');    // charge les méthodes du contrôleur
try {
    if (isset($_POST['Connecter'])&&!empty($_POST['Login']) && !empty($_POST['Mdp'])) {
        echo '<p>'.$_POST['Login'].$_POST['Mdp'].'</p>';
        CtlSeconnecter($_POST['Login'],$_POST['Mdp']);

	
	}
	afficherLog();
}catch (Exception $e){
    $msg = $e->getMessage(); 
    CtlErreur($msg);
}
