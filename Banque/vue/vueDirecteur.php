<?php

function afficherLog(){
    $contenu ='<form id="monForm1" action="site.php" method="post"><fieldset><legend>Se connecter</legend><p><label>  Login  : </label><input type="text" name="Login"  /></p><p><label>  Mot de passe  : </label><input type="password" name="Mdp"  /></p><p><input type="submit" value="Se Connecter" name="Connecter"><input type="reset" value="Effacer"></p></fieldset></form>';
    require_once('gabarit.php');
	
}
function afficherDirecteur() {

    $contenu=afficherMenuDirecteur().'<form id=monForm2 action="site.php" method="post"> <fieldset><legend>Selection opperation</legend><p><select class="menu" name="ope"><option value="c1">Afficher Comptes</option><option value="c2">Afficher Contrats</option><option value="c3">Afficher Motifs</option><option value="c4">Afficher Employés</option><option value="c5">Afficher Stats</option></select><input type="submit" value="Selectionner" name="opera"></p></fieldset></form>';
    require_once ('gabarit.php');

}

function afficherStats($con,$red,$nbCli,$montanttot){
    $contenu=afficherMenuDirecteur().'<form id=monForm3 action="site.php" method="post"> <fieldset><legend>Statistiques banque</legend><p><label class="stat">Nombre Contrats Souscrits (Entre \'Date 1\' et \'Date 2\') : '.$con.'</label><p><label class="stat">Nombre de rendez-vous pris (Entre \'Date 1\' et \'Date 2\') : '.$red.'</label></p><p><label class="stat">Nombre clients (Avant \'Date 2\') : '.$nbCli.' </label></p><p><label class="stat">Solde Total Actuel : '.$montanttot.'</label></p><p><label class="statDate">Date 1 : </label><input type="date" name="date1"><label class="statDate"> Date 2 : </label><input type="date" name="date2"><p><input type="submit" value="Selectionner" name="Stats"></p></fieldset></form>';
    require_once ('gabarit.php');
}

function afficherContrat($contrats){
    $c='';

    foreach ($contrats as $con){
        $conSansEspace=preg_replace('/\s+/', '', $con->NOMCONTRAT);
        $c=$c.'<p><input type="checkbox" name="nomContrats[]" value="' . $con->NOMCONTRAT .'"><label>Nom Contrat : </label> <input name="'. $conSansEspace .'" type="text" value="' . $con->NOMCONTRAT .'" /> </p>';
    }

    $contenu=afficherMenuDirecteur().'<form onsubmit="return verifierButtonInvi(`formContrats`,`VraiOuFauxInvisible`)"  id="formContrats" action="site.php" method="post"><fieldset><legend>Listes des contrats</legend>'.$c.'<p><input type=checkbox class="checkInvi"><label>  Ajouter nom Contrat  : </label><input  type="text" name="contrat"  /></p><p><input type="submit" onclick="VerifAjoutContratEcrire(`formContrats`,`contrat`,`VraiOuFauxInvisible`,5)" value="Ajouter Contrat" name="AjoutContr"  /><input onclick="verifSupprContratEcrire(`formContrats`,`VraiOuFauxInvisible`,5)" type="submit" value="Supprimer Contrat" name="delcontrat"  /><input type="submit" onclick="verifierModifContratEcrire(`formContrats`,`VraiOuFauxInvisible`,5);" value="Modifier Contrat" name="modcontrat"/><input class="invisiblebuton" name="VraiOuFauxInvisible" type="text"></p></fieldset></form>';
    require_once ('gabarit.php');

}

function afficherComptes($comptes){
    $c='';
    foreach ($comptes as $com){
        $comSansEspace=preg_replace('/\s+/', '', $com->NOMCOMPTE);
        $c=$c.'<p><input type="checkbox" name="nomcomptes[]" value="' . $com->NOMCOMPTE .'"><label>Nom Compte : </label> <input name="' . $comSansEspace .'" type="text" value="' . $com->NOMCOMPTE .'" /> </p>';
    }
    $contenu=afficherMenuDirecteur().'<form onsubmit="return verifierButtonInvi(`formComptes`,`VraiOuFauxInvisible`)" id="formComptes" action="site.php" method="post"><fieldset><legend>Listes des Comptes</legend>'.$c.'<p><input type=checkbox class="checkInvi"><label>Ajouter nom Compte  : </label><input type="text" name="compte"/></p><p><input type="submit" onclick="VerifAjoutContratEcrire(`formComptes`,`compte`,`VraiOuFauxInvisible`,5)" value="Ajouter Compte" name="AjoutCompte"  /> <input onclick="verifSupprContratEcrire(`formComptes`,`VraiOuFauxInvisible`,5)" type="submit" value="Supprimer Comptes" name="delComptes"  /><input type="submit" onclick="verifierModifContratEcrire(`formComptes`,`VraiOuFauxInvisible`,5)" value="Modifier Comptes" name="modComptes"/><input class="invisiblebuton" name="VraiOuFauxInvisible" type="text"></p></fieldset></form>';
    require_once ('gabarit.php');

}
function afficherMotif($motif){
    $c='';
    foreach ($motif as $mot){
        $c=$c.'<p><input type="checkbox" name="idMotif[]" value="' . $mot->IDMOTIF .'"><label class="motifDirecteur"> Pieces pour le motif '.$mot->NOMMOTIF.' : </label> <input class="motifDirecteur" name="'. $mot->IDMOTIF  .'" type="text" value="' . $mot->LISTEPIECES .'" /><input type="text" class="invisiblebuton" value="'.$mot->NOMMOTIF.'"> </p>';
    }
    $contenu=afficherMenuDirecteur().'<form onsubmit="return verifierButtonInvi(`formMotifs`,`VraiOuFauxInvisible`)" id="formMotifs" action="site.php" method="post"><fieldset><legend>Listes des Motifs</legend>'.$c.'<p><input type=checkbox class="checkInvi"><label>  Ajouter motif  : </label><input class="modifDirecteur" type="text" name="motif"  /> <label> Pieces : </label><input class="modifDirecteur" type="text" name="pieces"  /></p><p><input onclick="VerifAjoutContratEcrire(`formMotifs`,`motif`,`VraiOuFauxInvisible`,6)" type="submit" value="Ajouter Motif" name="AjoutMotif"  /> <input onclick="verifSupprContratEcrire(`formMotifs`,`VraiOuFauxInvisible`,6)" type="submit" value="Supprimer Motif" name="delMotif"  /><input type="submit" onclick="verifierModifContratEcrire(`formMotifs`,`VraiOuFauxInvisible`,6)" value="Modifier Motif" name="modMotif"/><input class="invisiblebuton" name="VraiOuFauxInvisible" type="text"></p></fieldset></form>';
    require_once ('gabarit.php');
}
function afficherEmployer($login){
    $c='';
    foreach ($login as $log){
        $c=$c.'<p><input type="checkbox" name="idEmploye[]" value="' . $log->IDEMPLOYE .'"><label> '.$log->TYPEEMPLOYE.'  ' .$log->NOMEMPLOYE.' </label><input name="'. $log->IDEMPLOYE  .'[]" type="text" value="' . $log->LOGINEMPLOYE .'" /> <input name="'. $log->IDEMPLOYE  .'[]" type="text" value="' . $log->MDPEMPLOYE .'" /></p>';

    }
    $contenu=afficherMenuDirecteur().'<form onsubmit="return verifierButtonInvi(`formMotifs`,`VraiOuFauxInvisible`)" id="formMotifs" action="site.php" method="post"><fieldset><legend>Listes des Employes </legend>'.$c.'<p><br></p><p><label>Ajouter Employer :</label> Nom   : <input type="text" name="NomEmploye"  />Login : <input type="text" name="LogienEmploye"  />Mot De passe : <input type="text" name="MdpEmploye"  />Type : <select name="TypeEmploye" ><option value="Conseiller">Conseiller</option><option value="Agent">Agent</option></select> </p> <p><input type="submit" onclick="verifAddEmploye(`formMotifs`,`VraiOuFauxInvisible`,`NomEmploye`,`LogienEmploye`,`MdpEmploye`)" value="Ajouter Employé" name="AjoutEmploye"  /><input type="submit" onclick="verifierModifContratEcrire(`formMotifs`,`VraiOuFauxInvisible`,7)" value="Modifier Employé" name="modEmploye"/><input class="invisiblebuton" name="VraiOuFauxInvisible" type="text"></p></fieldset></form>';
    require_once ('gabarit.php');
}

function afficherMenuDirecteur(){

    $contenu='<form   id="formMenu" method="post" action="site.php"><nav><ul><li><input class="menu" type="submit"  value="Aller à la sélection des opérations"  name="retour"></li><li class="déco"><input class="deco" type="submit" value="Déconnexion" name="Deco"></li></ul></nav></form>';
    return $contenu;
}


function afficherErreur($erreur){
    $contenu='<p>'.$erreur.'</p> <p><a href="site.php"/>Revenir au site </p>';
    require_once ('gabarit.php');

}