<?php

function afficherMenuConseiller(){
    $contenu='<form id="formMenu" method="post" action="site.php"><nav><ul><li><input class="menu" type="submit" value="Retour Menu" name="retourC"></li><li><input class="menu" type="submit" value="Deconnexion" name="Deco"></li></ul></nav></form>';
    return $contenu;
}

function afficherConseiller(){
    $contenu=afficherMenuConseiller().'<form id=Formc1 action="site.php" method="post"> 
    <fieldset><legend>Que voulez-vous faire ?</legend>

<p>
Interaction avec un client : 
<select name="interactionCli">
<option value="inscrireCli" >Inscrire un Client</option>
<option value="vendreContrat">Vendre un contrat</option>
<option value="ouvrirCompte">Ouvrir un compte</option>
<option value="Planning"> Planning </option>
<option value="modifDecouvert">Modifier la valeur d\'un découvert</option>
<option value="resilierContrat">Résilier un contrat</option>
<option value="resilierCompte">Résilier un compte</option>
</select>
<input type="submit" value="Sélectionner" name="interCli">
</p>
    
    </fieldset></form>';
    require_once ('gabarit.php');

}

function afficherInscrireCli(){
    $contenu=afficherMenuConseiller().'<form id=Formc2 action="site.php" method="post"> 
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
    <input type="email" name="emailCli" id="emailCli" required/>
    </p>
    <p>
    <label for="professionCli">Profession du Client : </label>
    <input type="text" name="professionCli" id="professionCli" required/>
    </p>
    <p>
    <label for="situationCli">Situation familiale du Client :</label>
    <input type="text" required name="situationCli">
    </p>
    <p>
    <input type="submit" value="Inscrire le client" name="inscrireClient">
    <input type="reset" value="Effacer" >
    </p>
    </fieldset></form>';
    require_once ('gabarit.php');

}

function afficherVendreContrat($contrat){
    $x='';
    foreach ($contrat as $c){
        $x=$x.'<option value="'.$c->NOMCONTRAT.'">'.$c->NOMCONTRAT.'</option>';
    }
    $contenu=afficherMenuConseiller().'<form id=Formc3 action="site.php" method="post"> 
    <fieldset><legend>Vendre un contrat</legend>
    <p><label>
    Numéro du client :
    </label><input type="text" name="numCli" required>
    </p>
    <p>
	<label>
    Type de contrat : 
    </label><select name="contratAVendre">
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
    </fieldset></form>';
    require_once ('gabarit.php');
}

function afficherOuvrirCompte($compte){
    $x='';
    foreach ($compte as $c){
        $x=$x.'<option value="'.$c->NOMCOMPTE.'">'.$c->NOMCOMPTE.'</option>';
    }
    $contenu=afficherMenuConseiller().'<form id=Formc4 action="site.php" method="post"> 
    <fieldset><legend>Ouvrir un compte</legend>
    <p><label>
    Numéro du client :
    </label><input type="text" name="numCli" required>
    </p>
    <p><label>
    Type de compte : 
    </label><select name="compteAOuvrir">
    '.$x.'
    </select>
    </p>
    <p><label>
    Solde du compte : 
    </label><input type="text" name="soldeContrat" required>
    </p>
    <p><label>
    Montant du découvert : 
    </label><input type="text" name="montantDecouvert" required>
    </p>
    <p>
    <input type="submit" value="Ouvrir le compte" name="ouvrirCompte">
    <input type="reset" value="Effacer" >
    </p>
    </fieldset></form>';
    require_once ('gabarit.php');
}

function afficherMenuDecouvert($id,$compte){
    $x='';
    foreach ($compte as $c){
        $x=$x.'<option value="'.$c->NOMCOMPTE.'">'.$c->NOMCOMPTE.'</option>';
    }
    $contenu=afficherMenuConseiller().'<form id=Formc5 action="site.php" method="post"> 
    <fieldset><legend>Modifier le découvert</legend>
    <p><label>
    Numéro du client :
    </label><input type="text" name="numClient" value="'.$id.'" required readonly>
    </p>
    <p><label>
    Type de compte : 
    </label><select name="compte">
    '.$x.'
    </select>
    </p>
    <p><label>
    Nouveau découvert :
    </label><input type="text" name="montantDecouvert" required>
    </p>
    <p>
    <p>
    <input type="submit" value="Modifier" name="modifdec" >
    </p>
    
    </fieldset></form>';
    require_once ('gabarit.php');
}

function afficherMenuResContrat($id,$contrat){
    $x='';
    foreach ($contrat as $c){
        $x=$x.'<option value="'.$c->NOMCONTRAT.'">'.$c->NOMCONTRAT.'</option>';
    }
    $contenu=afficherMenuConseiller().'<form id=Formc6 action="site.php" method="post"> 
    <fieldset><legend>Résilier un contrat</legend>
    <p><label>
    Numéro du client :
    </label><input type="text" name="numCli" value="'.$id.'" readonly>
    </p>
    <p><label>
    Type de contrat : 
    </label><select name="contratares">
    '.$x.'
    </select>
    </p>
    <p>
    <input type="submit" value="Résilier" name="rescontrat" >
    </p>
    </fieldset></form>';
    require_once ('gabarit.php');
}

function afficherMenuResCompte($id,$compte){
    $x='';
    foreach ($compte as $c){
        $x=$x.'<option value="'.$c->NOMCOMPTE.'">'.$c->NOMCOMPTE.'</option>';
    }
    $contenu=afficherMenuConseiller().'<form id=Formc7 action="site.php" method="post"> 
    <fieldset><legend>Choisir un client</legend>
    <p><label>
    Numéro du client :
    </label><input type="text" name="numCli" value="'.$id.'" readonly>
    </p>
    <p><label>
    Type de compte : 
    </label><select name="compteares">
    '.$x.'
    </select>
    </p>
    <p>
    <input type="submit" value="Résilier" name="rescompte" >
    </p>
    </fieldset></form>';
    require_once ('gabarit.php');
}

function afficherDecouvert($dec){
    $d='';

    foreach ($dec as $decouvert){
        $d=$d.'<p>'. $decouvert->NOMCOMPTE .'<input type="text" name="decoux[]" value="' . $decouvert->MONTANTDECOUVERT .'" required/> </p>';
    }
    $contenu=afficherMenuConseiller().'<form id=Formc6 action="site.php" method="post"><fieldset><legend>Modifier les découverts</legend><p>'. $d .'</p><p><input type="submit" name="modifdec" value="Modifier"></p></fieldset></form>';
    require_once ('gabarit.php');

}

function afficherResContrat($contrat){
    $d='';

    foreach($contrat as $r){

        $d=$d.'<p><input type="checkbox" name="checkcontrat" value="'.$r->NOMCONTRAT.'">'.$r->NOMCONTRAT.'</p>';
    }
    $contenu=afficherMenuConseiller().'<form id=Formc7 action="site.php" method="post"><fieldset><legend>Résilier un contrat</legend>'.$d.'<p><input type="submit" name="rescontrat" value="Résilier"></p></fieldset></form>';
    require_once ('gabarit.php');
}

function afficherChoixClient(){

    $contenu=afficherMenuConseiller().'<form id="monFormc8" action="site.php" method="post"><fieldset><legend>Choisir un client</legend><p><label>Identifiant du client : </label><input type="text"  name="choixClient" required></p><p><input type="submit" value="Choisir" name="choixcli" /></fieldset></form>';
    require_once('gabarit.php');
}
function afficherChoixClient2(){

    $contenu=afficherMenuConseiller().'<form id="monFormc9" action="site.php" method="post"><fieldset><legend>Choisir un client</legend><p><label>Identifiant du client : </label><input type="text"  name="choixClient2" required></p><p><input type="submit" name="choixcli2" value="Choisir" /></fieldset></form>';
    require_once('gabarit.php');
}
function afficherChoixClient3(){

    $contenu=afficherMenuConseiller().'<form id="monFormc10" action="site.php" method="post"><fieldset><legend>Choisir un client</legend><p><label>Identifiant du client : </label><input type="text"  name="choixClient3" required></p><p><input type="submit" name="choixcli3" value="Choisir" /></fieldset></form>';
    require_once('gabarit.php');
}

function afficherChoixConseiller($employe){
	$c='';
	
	foreach ($employe as $emp){
        $c=$c.'<option value="'.$emp->IDEMPLOYE.'">'.$emp->NOMEMPLOYE.'</option>';
    }
    $contenu=afficherMenuConseiller().'<form id=Formc1 action="site.php" method="post"> 
    <fieldset><legend>Afficher Planning : </legend>
<p><label>
Choix de l\'employer :  
</label><select name="choixListeConseiller">'.$c.'
</select>
<input type="submit" value="Afficher Planning" name="ChoixConseiller">
</p>
    
    </fieldset></form>';
    require_once ('gabarit.php');

}
	

function afficherCalendrierConseiller($idEmploye,$dateSemaine,$rdvemploye,$rdvSansClient){
    $tab= array();
    $tabSansClient=array();
    foreach ($rdvemploye as $rdv){
        array_push($tab,$rdv);
    }
    foreach ($rdvSansClient as $rdvsc){
        array_push($tabSansClient,$rdvsc);
    }

    $x=new DateTime($dateSemaine);
    $y=$x;
    $jourd=$x->format("w");// numéro du $x actuel 0 dimanche, 6 samedi
    if ($jourd==0)
        $y=new DateTime(date("Y-m-d H:i" ,mktime(0,0,0,$x->format("n"),$x->format("d")+1,$x->format("y"))));
    $nom_moisd = $x->format("F"); // nom du mois $x  DECEMBER
    $anneed= $x->format("Y"); // année  de $x 2018
    $num_weekd = $y->format("W"); // numéro de la semaine $x 51

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

            if (!empty($tabSansClient)){
                $dateSansClient= new DateTime($tabSansClient[0]->DATERDV);
                $jourSansCli=$dateSansClient->format("d");
                $heureSansCli=$dateSansClient->format("G:i");
            }
            if ($h == 0) {
                $contenu = $contenu . '<th>' . $jourTexte[$j] . ' ' . date("d", mktime(0, 0, 0, $x->format("n"), ($x->format("d")) - $jourd + $j, $x->format("y"))) . '</th>';
            }
			else {
                if (!empty($tab) && $jour==date("d", mktime(0, 0, 0, $x->format("n"), ($x->format("d")) - $jourd + $j, $x->format("y"))) && $heure==($h+7) ) {

                    if (!empty($tabSansClient) && $jour == $jourSansCli && $heure == $heureSansCli) {
                        $contenu = $contenu . '<td class=tdErreur>Conseiller Non Disponible</td>';
                        array_shift($tab);
                        array_shift($tabSansClient);
                    } else {
                        $contenu = $contenu . '<td class=tdErreur>Details RDV <input type="radio" checked name="detailRDVButtonRadio" value="' . date("Y-m-d H:i", mktime($h + 7, 0, 0, $x->format("n"), ($x->format("d")) - $jourd + $j, $x->format("y"))) . '"></td>';
                        array_shift($tab);
                    }
                }
			
                else { 
					$contenu = $contenu . '<td><input type="radio"  checked name="dateTimeBouttonRadio" value="' . date("Y-m-d H:i", mktime($h + 7, 0, 0, $x->format("n"), ($x->format("d")) - $jourd + $j, $x->format("y"))) . '"></td>';
				}
				
			}
		}
        $contenu = $contenu . '</tr>';
    }
    $contenu=$contenu.'</table>';
	
	$contenu=$contenu.'<p><label>Rendre plage indisponible : </label></select><input type="submit" name="rendreIndispo" value="Valider"></p><p><label>Afficher les détails :  </label></select><input type="submit" name="afficherDetailsRDV" value="Afficher"></p></form>';
    require_once ('gabarit.php');

}


function afficherDetailsRDV($synthese,$mod,$con,$contrat,$mot,$idClient){
    $c='';
    $co='';
    $contrats='';
	
	if (!CtlestNouveauClient($idClient)){
		
		$c=$c.'<p><label>Nom du client : </label><input name="'. $mod->NOMCLI  .'[]" type="text" value="' . $mod->NOMCLI .'" readonly="readonly" /></p><p><label>Adresse : </label><input name="'. $mod->NOMCLI  .'[]" type="text" value="' . $mod->ADRESSE .'" readonly="readonly" /></p><p><label> Numéro : </label><input name="'. $mod->NOMCLI  .'[]" type="text" value="' . $mod->NUMTEL .'" readonly="readonly" /></p><p><label>eMail : </label><input name="'. $mod->NOMCLI  .'[]" type="text" value="' . $mod->EMAIL .'" readonly="readonly" /></p><p><label>Profession : </label><input name="'. $mod->NOMCLI  .'[]" type="text" value="' . $mod->PROFESSION .'" readonly="readonly"/></p><p><label>Situation Familiale : </label><input name="'. $mod->NOMCLI  .'[]" type="text" value="' . $mod->SITUATION_FAMILIALE .'" readonly="readonly"/></p>';

		$contenu='<p><fieldset><legend>Liste informations client</legend>'.$c.'<p><label>Nom du conseiller : </label><input name="'. $con->NOMEMPLOYE .'[]" type="text" value="' . $con->NOMEMPLOYE .'" readonly="readonly"/></p></fieldset>';

		foreach ($synthese as $syn){
			$co=$co.'<p>Nom du compte : <input name="'. $syn->NOMCOMPTE  .'[]" type="text" value="' . $syn->NOMCOMPTE .'" readonly="readonly" />  Date ouverture : <input name="'. $syn->NOMCOMPTE  .'[]" type="text" value="' . $syn->DATEOUVERTURE .'" readonly="readonly"/>  Solde : <input name="'. $syn->NOMCOMPTE  .'[]" type="text" value="' . $syn->SOLDE .'" readonly="readonly"/>  Montant du decouvert autorisé : <input name="'. $syn->NOMCOMPTE  .'[]" type="text" value="' . $syn->MONTANTDECOUVERT .'" readonly="readonly"/></p>';
		}
		foreach ($contrat as $ctr){
			$contrats=$contrats.'<p>Nom du contrat : <input name="'. $ctr->NOMCONTRAT  .'[]" type="text" value="' . $ctr->NOMCONTRAT .'" readonly="readonly" />  Date ouverture : <input name="'. $ctr->NOMCONTRAT  .'[]" type="text" value="' . $ctr->DATEOUVERTURECONTRAT .'" readonly="readonly"/>  Tarif mensuel : <input name="'. $ctr->NOMCONTRAT  .'[]" type="text" value="' . $ctr->TARIFMENSUEL .'" readonly="readonly"/></p>';
		}
		$motif='';
		$motif='<p><label>Motif du RDV :  </label><input name"'.$mot->IDMOTIF .'[]" type="text" value="' . $mot->NOMMOTIF .'" readonly="readonly" /></p><p><label>Pieces à ramener :  </label><input name"'.$mot->IDMOTIF .'[]" type="text" value="' . $mot->LISTEPIECES .'" readonly="readonly" /></p>';
	
	
		$contenu=afficherMenuConseiller().'<legend>Information du rendez vous</legend>'.$contenu.'<p><fieldset><legend>Liste des comptes du client</legend>'.$co.'</fieldset><p><fieldset><legend>Liste des contrat du client</legend>'.$contrats.'</fieldset><fieldset><legend>Details du RDV</legend>'.$motif.'</fieldset></fieldset>';
    }
	else {
		$contenu=afficherMenuConseiller().'<p>Ce client est un nouveau client</p>';
	}
	
	require_once ('gabarit.php');

}

