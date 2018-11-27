<?php
require_once('controleur/controleur.php');    // charge les méthodes du contrôleur
try {
    if (isset($_POST[])) {

	
	}
}catch (Exception $e){
    $msg = $e->getMessage(); 
    CtlErreur($msg);
}
