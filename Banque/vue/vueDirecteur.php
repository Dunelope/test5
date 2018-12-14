<?php

function afficherLog(){
    $contenu ='<form id="monForm1" action="site.php" method="post"><fieldset><legend>Se connecter</legend><p><label>  Login  : </label><input type="text" name="Login"  /></p><p><label>  Mot de passe  : </label><input type="password" name="Mdp"  /></p><p><input type="submit" value="Se Connecter" name="Connecter"><input type="reset" value="Effacer"></p></fieldset></form>';
    require_once('gabarit.php');
}
function afficherDirecteur() {

    $contenu=afficherMenuDirecteur().'<form id=monForm2 action="site.php" method="post"> <fieldset><legend>Selection opperation</legend><p><select name="ope"><option value="c1">Afficher Comptes</option><option value="c2">Afficher Contrats</option><option value="c3">Afficher Motifs</option><option value="c4">Afficher Employés</option><option value="c5">Afficher Stats</option></select><input type="submit" value="Selectionner" name="opera"></p></fieldset></form>';
    require_once ('gabarit.php');

}

function afficherStats($con,$red,$nbCli,$montanttot){
    $contenu=afficherMenuDirecteur().'<form id=monForm3 action="site.php" method="post"> <fieldset><legend>Statistiques banque</legend><p><label>Nombre Contrats Souscrits (Entre \'Date 1\' et \'Date 2\') : '.$con.'</label><p><label>Nombre de rendez-vous pris (Entre \'Date 1\' et \'Date 2\') : '.$red.'</label></p><p><label>Nombre clients (Avant \'Date 2\') : '.$nbCli.' </label></p><p><label>Solde Total Actuel : '.$montanttot.'</label></p><p><label>Date 1 : </label><input type="date" name="date1"><label> Date 2 : </label><input type="date" name="date2"><p><input type="submit" value="Selectionner" name="Stats"></p></fieldset></form>';
    require_once ('gabarit.php');
}

function afficherContrat($contrats){
    $c='';

    foreach ($contrats as $con){
        $conSansEspace=preg_replace('/\s+/', '', $con->NOMCONTRAT);
        $c=$c.'<p><input type="checkbox" name="nomContrats[]" value="' . $con->NOMCONTRAT .'"> Nom Contrat : <input name="'. $conSansEspace .'" type="text" value="' . $con->NOMCONTRAT .'" /> </p>';
    }
    $contenu=afficherMenuDirecteur().'<form id="formContrats" action="site.php" method="post"><fieldset><legend>Listes des contrats</legend>'.$c.'<p><label>  Ajouter nom Contrat  : </label><input type="text" name="contrat"  /></p><p><input type="submit" value="Ajouter Contrat" name="AjoutContr"  /><input type="submit" value="Supprimer Contrat" name="delcontrat"  /><input type="submit" value="Modifier Contrat" name="modcontrat"/></p></fieldset></form>';
    require_once ('gabarit.php');

}

function afficherComptes($comptes){
    $c='';
    foreach ($comptes as $com){
        $comSansEspace=preg_replace('/\s+/', '', $com->NOMCOMPTE);
        $c=$c.'<p><input type="checkbox" name="nomcomptes[]" value="' . $com->NOMCOMPTE .'"> Nom Compte : <input name="' . $comSansEspace .'" type="text" value="' . $com->NOMCOMPTE .'" /> </p>';
    }
    $contenu=afficherMenuDirecteur().'<form id="formComptes" action="site.php" method="post"><fieldset><legend>Listes des Comptes</legend>'.$c.'<p><label>  Ajouter nom Compte  : </label><input type="text" name="compte"  /></p><p><input type="submit" value="Ajouter Compte" name="AjoutCompte"  /> <input type="submit" value="Supprimer Comptes" name="delComptes"  /><input type="submit" value="Modifier Comptes" name="modComptes"/></p></fieldset></form>';
    require_once ('gabarit.php');

}
function afficherMotif($motif){
    $c='';
    foreach ($motif as $mot){
        $c=$c.'<p><input type="checkbox" name="idMotif[]" value="' . $mot->IDMOTIF .'"> Pieces pour le motif '.$mot->NOMMOTIF.' <input name="'. $mot->IDMOTIF  .'" type="text" value="' . $mot->LISTEPIECES .'" /> </p>';
    }
    $contenu=afficherMenuDirecteur().'<form id="formMotifs" action="site.php" method="post"><fieldset><legend>Listes des Motifs</legend>'.$c.'<p><label>  Ajouter motif  : </label><input type="text" name="motif"  /> <label> Pieces : </label><input type="text" name="pieces"  /></p><p><input type="submit" value="Ajouter Motif" name="AjoutMotif"  /> <input type="submit" value="Supprimer Motif" name="delMotif"  /><input type="submit" value="Modifier Motif" name="modMotif"/></p></fieldset></form>';
    require_once ('gabarit.php');
}
function afficherEmployer($login){
    $c='';
    foreach ($login as $log){
        $c=$c.'<p><input type="checkbox" name="idEmploye[]" value="' . $log->IDEMPLOYE .'"> Login pour : '.$log->TYPEEMPLOYE.'  ' .$log->NOMEMPLOYE.' <input name="'. $log->IDEMPLOYE  .'[]" type="text" value="' . $log->LOGINEMPLOYE .'" /> <input name="'. $log->IDEMPLOYE  .'[]" type="text" value="' . $log->MDPEMPLOYE .'" /></p>';

    }
    $contenu=afficherMenuDirecteur().'<form id="formMotifs" action="site.php" method="post"><fieldset><legend>Listes des Employes </legend>'.$c.'<p><label>  Ajouter Employer : Nom   : </label><input type="text" name="NomEmploye"  /> <label> Login : </label><input type="text" name="LogienEmploye"  /><label> Mot De passe : </label><input type="text" name="MdpEmploye"  /> <label> Type : </label><select name="TypeEmploye" ><option value="Conseiller">Conseiller</option><option value="Agent">Agent</option></select> </p> <p><input type="submit" value="Ajouter Employé" name="AjoutEmploye"  /><input type="submit" value="Modifier Employé" name="modEmploye"/></p></fieldset></form>';
    require_once ('gabarit.php');
}

function afficherMenuDirecteur(){
    $contenu='<form id="formMenu" method="post" action="site.php"><nav><ul><li><input type="submit" value="Aller à la selection des operation" name="retour"></li><li><input type="submit" value="Deconnexion" name="Deco"></li></ul></nav></form>';
    return $contenu;
}


function afficherErreur($erreur){
    $contenu='<p>'.$erreur.'</p> <p><a href="site.php"/>Revenir au site </p>';
    require_once ('gabarit.php');

}