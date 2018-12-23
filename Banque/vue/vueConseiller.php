<?php

function afficherMenuConseiller(){
    $contenu='<form id="formMenu" method="post" action="site.php"><input type="submit" value="Retour Menu" name="retourC"><input type="submit" value="Deconnexion" name="Deco"></form>';
    return $contenu;
}

function afficherConseiller(){
    $contenu='<form id=Formc1 action="site.php" method="post"> 
    <fieldset><legend>Que voulez-vous faire ?</legend>
    <p>
    Menu des Planning :
    <input type="submit" value="Planning" name="menuPlanning">
    
</p>
<p>
Interaction avec un client : 
<select name="interactionCli">
<option value="inscrireCli" selected>Inscrire un Client</option>
<option value="vendreContrat">Vendre un contrat</option>
<option value="ouvrirCompte">Ouvrir un compte</option>
<option value="modifDecouvert">Modifier la valeur d\'un découvert</option>
<option value="resilierContrat">Résilier un contrat</option>
<option value="resilierCompte">Résilier un compte</option>
</select>
<input type="submit" value="Sélectionner" name="interCli">
</p>
    
    </fieldset></form>'.afficherMenuConseiller();
    require_once ('gabarit.php');

}

function afficherInscrireCli(){
    $contenu='<form id=Formc2 action="site.php" method="post"> 
    <fieldset><legend>Inscrire un nouveau client</legend>
    <p>
    <label for="idCon">ID du Conseiller :</label>
    <input type="text" name="idCon" id="idCon" required/>
    </p>
    <p>
    <label for="nomCli">Nom du Client :</label>
    <input type="text" name="nomCli" id="nomCli" required/>
    </p>
    <p>
    <label for="prenomCli">Prénom du Client : </label>
    <input type="text" name="prenomCli" id="prenomCli" required/>
    </p>
    <p>
    <label for="dateNCli">Date de naissance du Client :</label>
    <input type="date" name="dateNCli" id="dateNCli" required/>
    </p>
    <p>
    <label for="adresseCli">Adresse du Client : </label>
    <input type="text" name="adresseCli" id="adresseCli" required/>
    </p>
    <p>
    <label for="numTelCli">Numéro de téléphone du Client : </label>
    <input type="text" name="numTelCli" id="numTelCli" maxlength="10" required/>
    </p>
    <p>
    <label for="emailCli">eMail du Client : </label>
    <input type="text" name="emailCli" id="emailCli" required/>
    </p>
    <p>
    <label for="professionCli">Profession du Client : </label>
    <input type="text" name="professionCli" id="professionCli" required/>
    </p>
    <p>
    <label for="situationCli">Situation familiale du Client :</label>
    <select name="situationCli">
    <option value="celibataire" selected>Célibataire</option>
    <option value="marie">Marié</option>
    <option value="pacse">Pacsé</option>
    </select>
    </p>
    <p>
    <input type="submit" value="Inscrire le client" name="inscrireClient">
    <input type="reset" value="Effacer" >
    </p>
    </fieldset></form>'.afficherMenuConseiller();
    require_once ('gabarit.php');

}

function afficherVendreContrat($contrat){
    $x='';
    foreach ($contrat as $c){
        $x=$x.'<option value="'.$c->NOMCONTRAT.'">'.$c->NOMCONTRAT.'</option>';
    }
    $contenu='<form id=Formc3 action="site.php" method="post"> 
    <fieldset><legend>Vendre un contrat</legend>
    <p>
    Numéro du client :
    <input type="text" name="numCli" required>
    </p>
    <p>
    Type de contrat : 
    <select name="contratAVendre">
    '.$x.'
    </select>
    </p>
    <p>
    <label for="tarif">Tarif Mensuel :</label>
    <input type="text" name="tarif" id="tarif" required/>
    </p>
    <p>
    <input type="submit" value="Vendre le contrat" name="vendreContrat">
    <input type="reset" value="Effacer" >
    </p>
    </fieldset></form>'.afficherMenuConseiller();
    require_once ('gabarit.php');
}

function afficherOuvrirCompte($compte){
    $x='';
    foreach ($compte as $c){
        $x=$x.'<option value="'.$c->NOMCOMPTE.'">'.$c->NOMCOMPTE.'</option>';
    }
    $contenu='<form id=Formc4 action="site.php" method="post"> 
    <fieldset><legend>Ouvrir un compte</legend>
    <p>
    Numéro du client :
    <input type="text" name="numCli" required>
    </p>
    <p>
    Type de compte : 
    <select name="compteAOuvrir">
    '.$x.'
    </select>
    </p>
    <p>
    Solde :
    <input type="text" name="soldeContrat" required>
    </p>
    <p>
    Montant du découvert :
    <input type="text" name="montantDecouvert" required>
    </p>
    <p>
    <input type="submit" value="Ouvrir le compte" name="ouvrirCompte">
    <input type="reset" value="Effacer" >
    </p>
    </fieldset></form>'.afficherMenuConseiller();
    require_once ('gabarit.php');
}

function afficherMenuDecouvert($id,$compte){
    $x='';
    foreach ($compte as $c){
        $x=$x.'<option value="'.$c->NOMCOMPTE.'">'.$c->NOMCOMPTE.'</option>';
    }
    $contenu='<form id=Formc5 action="site.php" method="post"> 
    <fieldset><legend>Modifier le découvert</legend>
    <p>
    Numéro du client :
    <input type="text" name="numClient" value="'.$id.'" required readonly>
    </p>
    <p>
    Type de compte : 
    <select name="compte">
    '.$x.'
    </select>
    </p>
    <p>
    Nouveau découvert :
    <input type="text" name="montantDecouvert" required>
    </p>
    <p>
    <p>
    <input type="submit" value="Modifier" name="modifdec" >
    </p>
    
    </fieldset></form>'.afficherMenuConseiller();
    require_once ('gabarit.php');
}

function afficherMenuResContrat($id,$contrat){
    $x='';
    foreach ($contrat as $c){
        $x=$x.'<option value="'.$c->NOMCONTRAT.'">'.$c->NOMCONTRAT.'</option>';
    }
    $contenu='<form id=Formc6 action="site.php" method="post"> 
    <fieldset><legend>Résilier un contrat</legend>
    <p>
    Numéro du client :
    <input type="text" name="numCli" value="'.$id.'" readonly>
    </p>
    <p>
    Type de contrat : 
    <select name="contratares">
    '.$x.'
    </select>
    </p>
    <p>
    <input type="submit" value="Résilier" name="rescontrat" >
    </p>
    </fieldset></form>'.afficherMenuConseiller();
    require_once ('gabarit.php');
}

function afficherMenuResCompte($id,$compte){
    $x='';
    foreach ($compte as $c){
        $x=$x.'<option value="'.$c->NOMCOMPTE.'">'.$c->NOMCOMPTE.'</option>';
    }
    $contenu='<form id=Formc7 action="site.php" method="post"> 
    <fieldset><legend>Choisir un client</legend>
    <p>
    Numéro du client :
    <input type="text" name="numCli" value="'.$id.'" readonly>
    </p>
    <p>
    Type de compte : 
    <select name="compteares">
    '.$x.'
    </select>
    </p>
    <p>
    <input type="submit" value="Résilier" name="rescompte" >
    </p>
    </fieldset></form>'.afficherMenuConseiller();
    require_once ('gabarit.php');
}

function afficherDecouvert($dec){
    $d='';

    foreach ($dec as $decouvert){
        $d=$d.'<p>'. $decouvert->NOMCOMPTE .'<input type="text" name="decoux[]" value="' . $decouvert->MONTANTDECOUVERT .'" required/> </p>';
    }
    $contenu='<form id=Formc6 action="site.php" method="post"><fieldset><legend>Modifier les découverts</legend><p>'. $d .'</p><p><input type="submit" name="modifdec" value="Modifier"></p></fieldset></form>'.afficherMenuConseiller();
    require_once ('gabarit.php');

}

function afficherResContrat($contrat){
    $d='';

    foreach($contrat as $r){

        $d=$d.'<p><input type="checkbox" name="checkcontrat" value="'.$r->NOMCONTRAT.'">'.$r->NOMCONTRAT.'</p>';
    }
    $contenu='<form id=Formc7 action="site.php" method="post"><fieldset><legend>Résilier un contrat</legend>'.$d.'<p><input type="submit" name="rescontrat" value="Résilier"></p></fieldset></form>'.afficherMenuConseiller();
    require_once ('gabarit.php');
}

function afficherChoixClient(){

    $contenu=afficherMenuConseiller().'<form id="monFormc8" action="site.php" method="post"><fieldset><legend>Choisir un client</legend><p>Identifiant du client : <input type="text"  name="choixClient" required></p><p><input type="submit" value="Choisir" name="choixcli" /></fieldset></form>';
    require_once('gabarit.php');
}
function afficherChoixClient2(){

    $contenu=afficherMenuConseiller().'<form id="monFormc9" action="site.php" method="post"><fieldset><legend>Choisir un client</legend><p>Entrez identifiant du client : <input type="text"  name="choixClient2" required></p><p><input type="submit" name="choixcli2" value="Choisir" /></fieldset></form>';
    require_once('gabarit.php');
}
function afficherChoixClient3(){

    $contenu=afficherMenuConseiller().'<form id="monFormc10" action="site.php" method="post"><fieldset><legend>Choisir un client</legend><p>Entrez identifiant du client : <input type="text"  name="choixClient3" required></p><p><input type="submit" name="choixcli3" value="Choisir" /></fieldset></form>';
    require_once('gabarit.php');
}

function afficherChoixConseiller($employe){
	$c='';
	
	foreach ($employe as $emp){
        $c=$c.'<option value="'.$emp->IDEMPLOYE.'">'.$emp->NOMEMPLOYE.'</option>';
    }
    $contenu='<form id=Formc1 action="site.php" method="post"> 
    <fieldset><legend>Afficher Planning : </legend>
<p>
Choix de l\'employer :  
<select name="choixListeConseiller">'.$c.'
</select>
<input type="submit" value="Afficher Planning" name="ChoixConseiller">
</p>
    
    </fieldset></form>'.afficherMenuConseiller();
    require_once ('gabarit.php');

}
	

function afficherCalendrierConseiller($idEmploye,$dateSemaine,$rdvemploye){
    $tab= array();
    foreach ($rdvemploye as $rdv){
        array_push($tab,$rdv);
    }
    $x=new DateTime($dateSemaine);
    $jourd=$x->format("w");// numéro du $x actuel 0 dimanche, 6 samedi
    $nom_moisd = $x->format("F"); // nom du mois $x  DECEMBER
    $anneed= $x->format("Y"); // année  de $x 2018
    $num_weekd = $x->format("W"); // numéro de la semaine $x 51
    if ($jourd==0)
        $num_weekd++;

    $dateDebSemaineFrd = date("d/m/Y",mktime(0,0,0,$x->format("n"),($x->format("d"))-$jourd+1,$x->format("y")));
    $dateFinSemaineFrd = date("d/m/Y",mktime(0,0,0,$x->format("n"),($x->format("d"))-$jourd+7,$x->format("y")));

    switch($nom_moisd) {
        case 'January' : $nom_moisd = 'Janvier'; break;
        case 'February' : $nom_moisd = 'Février'; break;
        case 'March' : $nom_moisd = 'Mars'; break;
        case 'April' : $nom_moisd = 'Avril'; break;
        case 'May' : $nom_moisd = 'Mai'; break;
        case 'June' : $nom_moisd = 'Juin'; break;
        case 'July' : $nom_moisd = 'Juillet'; break;
        case 'August' : $nom_moisd = 'Août'; break;
        case 'September' : $nom_moisd = 'Septembre'; break;
        case 'October' : $nom_moisd = 'Otober'; break;
        case 'November' : $nom_moisd = 'Novembre'; break;
        case 'December' : $nom_moisd = 'Décembre'; break;
    }
    $jourTexte = array(1=>'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
    $plageH = array('',1=>'08:00','09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00');

    $contenu=afficherMenuConseiller().'<form action="site.php" method="post"><p><label>Id du conseiller</label><input type="text" name="idEmploye" value="'.$idEmploye.'" readonly="readonly"></p><label>Selectionnez une date </label><input name="nouvelledateConseiller" type="date"><input type="submit" name="changerDateConseiller" value="aller à"><p> Semaine '.$num_weekd.' </p>';
    $contenu = $contenu . '<p> du '.$dateDebSemaineFrd.' au '.$dateFinSemaineFrd.'</p>';
    $contenu = $contenu . '<h2>'.$nom_moisd.' '.$anneed.'</h2>';
    $contenu = $contenu . '<table border="1">';
    for ($h = 0; $h <= 11; $h++) {
        $contenu = $contenu . '<tr><th>' . $plageH[$h] . '</th>';
        for ($j = 1; $j < 7; $j++) {
            if (!empty($tab)) {
                $datetest = new DateTime($tab[0]->DATERDV);
                $jour = $datetest->format("d");
                $heure = $datetest->format("G:i");
            }
            if ($h == 0) {
                $contenu = $contenu . '<th>' . $jourTexte[$j] . ' ' . date("d", mktime(0, 0, 0, $x->format("n"), ($x->format("d")) - $jourd + $j, $x->format("y"))) . '</th>';
            } else {
                if (!empty($tab) && $jour==date("d", mktime(0, 0, 0, $x->format("n"), ($x->format("d")) - $jourd + $j, $x->format("y"))) && $heure==($h+7) ) {
                    $contenu = $contenu . '<td align="center" style="background-color: red; color : black">Details RDV <input type="radio" checked name="detailRDVButtonRadio"></td>';
                    array_shift($tab);
                }else
                    $contenu = $contenu . '<td align="center"><input type="radio"  checked name="dateTimeBouttonRadio" value="' . date("Y-m-d H:i", mktime($h + 7, 0, 0, $x->format("n"), ($x->format("d")) - $jourd + $j, $x->format("y"))) . '"></td>';
            }
        }
        $contenu = $contenu . '</tr>';
    }
    $contenu=$contenu.'</table>';
	
	$contenu=$contenu.'<label>Rendre plage indisponible : </label></select><input type="submit" name="rendreIndispo" value="Valider"></form>';

   
    require_once ('gabarit.php');

}
