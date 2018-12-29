<?php
require_once('controleur/controleur.php');    // charge les méthodes du contrôleur
try {
    if (isset($_POST['Connecter']) && !empty($_POST['Login']) && !empty($_POST['Mdp'])) {
        CtlSeconnecter($_POST['Login'], $_POST['Mdp']);
    }
    /*-------------------------------------------------*/

    if (isset($_POST['retour'])){
        CtlDirecteur();
    }

    if (isset($_POST['Deco'])){
        afficherLog();
    }
    /*-------------------------------------------------*/

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
            CtlStats('1500-01-01','2040 -01-01');
        }
    }

    if (isset($_POST['Stats'])){
        $d1 = $_POST['date1'];
        $d2 = $_POST['date2'];
        CtlStats($d1,$d2);
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
    if (isset($_POST['AjoutContr']) ) {
        if (!empty($_POST['contrat']) && !CtlVerifContrats($_POST['contrat'])) {
            CtladdContrat($_POST['contrat']);
        }
        CtlContrats();
    }
    if (isset($_POST['modcontrat'])){
        if (!empty($_POST['nomContrats'])) {
            foreach ($_POST['nomContrats'] as $valeur) {
                $con = $valeur;
                $conSansEspace = preg_replace('/\s+/', '', $con);
                $modif = $_POST[$conSansEspace];
                if (CtlVerifContrats($modif)){
                    continue;
                }

                CtlModifierContrat($con, $modif);
            }
        }
        CtlContrats();
    }

    /*-------------------------------------------------*/


    if (isset($_POST['delComptes'])){
        if (!empty($_POST['nomcomptes'])) {

            foreach ($_POST['nomcomptes'] as $valeur) {
                CtldelCompte($valeur);
            }
        }
        CtlCompte();
    }
    if (isset($_POST['AjoutCompte'])) {
        if (!empty($_POST['compte']) && !CtlVerifCompte($_POST['compte']) ) {
            CtladdCompte($_POST['compte']);
        }
        CtlCompte();
    }
    if (isset($_POST['modComptes'])){
        if (!empty($_POST['nomcomptes'])) {
            foreach ($_POST['nomcomptes'] as $valeur) {
                $com = $valeur;
                $comSansEspace = preg_replace('/\s+/', '', $com);
                $modif = $_POST[$comSansEspace];
                if (CtlVerifCompte($modif)){
                    continue;
                }
                CtlModifierCompte($com, $modif);
            }
        }
        CtlCompte();
    }

    /*-------------------------------------------------*/

    if (isset($_POST['delMotif'])) {
        if (!empty($_POST['idMotif'])) {
            foreach ($_POST['idMotif'] as $valeur) {
                CtldelMotif($valeur);
            }
        }
        CtlMotifs();
    }
    if (isset($_POST['AjoutMotif']) ) {
        if (!empty($_POST['motif']) && !empty($_POST['pieces']) && !CtlVerifMotif($_POST['motif'])) {
            CtladdMotif($_POST['motif'], $_POST['pieces']);
        }
        CtlMotifs();
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

    /*-------------------------------------------------*/

    if (isset($_POST['AjoutEmploye'])) {
        if ((!empty($_POST['NomEmploye']) && !empty($_POST['LogienEmploye']) && !empty($_POST['MdpEmploye']) && !empty($_POST['TypeEmploye']))) {
            CtladdEmploye($_POST['NomEmploye'], $_POST['LogienEmploye'], $_POST['MdpEmploye'], $_POST['TypeEmploye']);
        }
        CtlEmploye();
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

    /*---------------------------AGENT----------------------*/
	
	if (isset($_POST['retourAgent'])){
        CtlAgent();
    }

	if (isset($_POST['modClient'])){
		 
        if (!empty($_POST['idClient'])) { 
            foreach ($_POST['idClient'] as $valeur) {
                $idClient = $valeur;				
                $modifAdresse = $_POST[$idClient][0];
				$modifNumTel=$_POST[$idClient][1];
				$modifEmail = $_POST[$idClient][2];
                $modifProfession=$_POST[$idClient][3];			                
				$modifSituation_Familiale = $_POST[$idClient][4];
               

                CtlModifierClient($idClient,$modifAdresse,$modifNumTel,$modifEmail,$modifProfession,$modifSituation_Familiale);
            }
        }
        CtlModifier($idClient);
    }

	if (isset($_POST['operaAgent'])) {
        $val = $_POST['opeAgent'];
        if ($val == 'c1') {
            //CtlModifier();
			CtlafficherClient();
        } elseif ($val == 'c2') {
            CtlafficherClientSynthese();
        } elseif ($val == 'c3') {
            CtlafficherOperation();
        } elseif ($val == 'c4') {
            CtldemanderIdCliRDV();
        } elseif ($val == 'c5') {
            CtlAfficherIDClient();
		}
		
	}
	
    if (isset($_POST['RechercherClientModif'])) {
		$val=$_POST['SelectClientModif'];
		CtlModifier($val);
	}
	
	if (isset($_POST['RechercherClientSynthese'])) {
		$val=$_POST['SelectClientSynthese'];
		CtlSynthese($val);
	}
	
	if (isset($_POST['RechercherClientOperation'])) {
		$val=$_POST['SelectClientOperation'];
		CtlOperationClient($val);
	}
	
	if (isset($_POST['DepotClient'])) {
	    $montant=$_POST['montantOpe'];
	    $nomcompte=$_POST['opeClient'];
	    $id=$_POST['idduClient'];
		CtlOperation($id,$nomcompte,$montant,'Crediter');
	}
	
	if (isset($_POST['RetraitClient'])) {
        $montantEntree=$_POST['montantOpe'];
        $nomcompte=$_POST['opeClient'];
        $montanttotal=-$montantEntree;
        $id=$_POST['idduClient'];
		CtlOperation($id,$nomcompte,$montanttotal,'Debiter');
	}
		
	//---------------------------------------------------------
	 if (isset($_POST['RechercherClientID'])) {
		$nom=$_POST['SelectClientNom'];
		$dateN=$_POST['SelectClientDateN'];
		CtlTrouverIDClient($nom,$dateN);
	}

	if(isset($_POST['afficherSemaine'])) {
        $dateactuelle=date("Y-m-d H:i");
        $dateTest=new DateTime($dateactuelle);
        $jourd=$dateTest->format("w");// numéro du $x actuel 0 dimanche, 6 samedi
        $nom_moisd = $dateTest->format("F"); // nom du mois $x  DECEMBER
        $anneed= $dateTest->format("Y"); // année  de $x 2018
        $num_weekd = $dateTest->format("W"); // numéro de la semaine $x 51

        $dateDebSemaineFrd = date("d/m/Y",mktime(0,0,0,$dateTest->format("n"),($dateTest->format("d"))-$jourd+1,$dateTest->format("y")));
        $idClient=($_POST['idCli']);
        CtlCalendrierRDV($idClient,$dateactuelle);
    }

    if(isset($_POST['changerDate'])) {
        $daterdv=$_POST['nouvelledate'];
        $idClient=($_POST['idCli']);
        CtlCalendrierRDV($idClient,$daterdv);
    }

    if (isset($_POST['prendreRDV'])){
        $motif = $_POST['choixmotif'];
        $dateRdv=$_POST['dateTimeBouttonRadio'];
        $idClient=$_POST['idCli'];
        CtlEnregisterRdv($dateRdv,$motif,$idClient);

        CtlListePieces($motif);
    }

	/*-----------------------CONSEILLER----------------------------------*/
    if(isset($_POST['retourC'])){
        CtlConseiller();
    }

	
	if(isset($_POST['changerDateConseiller'])) {
        $daterdv=$_POST['nouvelledateConseiller'];
        $idClient=($_POST['idEmploye']);
        CtlCalendrierRDVEmploye($idClient,$daterdv);
    }
	
	if (isset($_POST['ChoixConseiller'])){
		$idConseiller=$_POST['choixListeConseiller'];
		$dateactuelle=date("Y-m-d H:i");
        $dateTest=new DateTime($dateactuelle);
        $jourd=$dateTest->format("w");// numéro du $x actuel 0 dimanche, 6 samedi
        $nom_moisd = $dateTest->format("F"); // nom du mois $x  DECEMBER
        $anneed= $dateTest->format("Y"); // année  de $x 2018
        $num_weekd = $dateTest->format("W"); // numéro de la semaine $x 51

        $dateDebSemaineFrd = date("d/m/Y",mktime(0,0,0,$dateTest->format("n"),($dateTest->format("d"))-$jourd+1,$dateTest->format("y")));
       
        CtlCalendrierRDVEmploye($idConseiller,$dateactuelle);
    }
	
	if (isset($_POST['rendreIndispo'])){
        $dateRdv=$_POST['dateTimeBouttonRadio'];
		$idEmploye=$_POST['idEmploye'];
        
        CtlEnregisterIndispo($dateRdv,$idEmploye);
    }
	
	if (isset($_POST['afficherDetailsRDV'])){
	    $val=null;
	    if (isset($_POST['detailRDVButtonRadio']))
		    $val=$_POST['detailRDVButtonRadio'];
		$idEmploye=$_POST['idEmploye'];
		CtlSyntheseRDV($val,$idEmploye);
	}
	

    if(isset($_POST['interCli'])){
        $val =$_POST['interactionCli'];
        if($val=='inscrireCli') {
            CtlAfficherInscrireCli();
        }
        if($val=='vendreContrat'){
            CtlAfficherVendreContrat();
        }
        if($val=='ouvrirCompte') {
            CtlAfficherOuvrirCompte();
        }
        if($val=='modifDecouvert') {
            CtlAfficherChoixClient();
            //CtlAfficherMenuDecouvert();
        }
        if($val=='resilierContrat') {
            CtlAfficherChoixClient2();
            //CtlAfficherMenuResContrat();
        }
        if($val=='resilierCompte') {
            CtlAfficherChoixClient3();
            //CtlAfficherMenuResCompte();
        }
        if ($val=='Planning'){
            CtlListeConseiller();

        }
    }


    if(isset($_POST['inscrireClient'])){
        CtlInscrireCli($_POST['idCon'],$_POST['nomCli'],$_POST['prenomCli'],$_POST['dateNCli'],$_POST['adresseCli'],$_POST['numTelCli'],$_POST['emailCli'],$_POST['professionCli'],$_POST['situationCli']);
    }

    if(isset($_POST['vendreContrat'])) {
        CtlVendreContrat($_POST['numCli'],$_POST['contratAVendre'],$_POST['tarif']);
    }

    if(isset($_POST['ouvrirCompte'])){
        CtlOuvrirCompte($_POST['numCli'],$_POST['compteAOuvrir'],$_POST['soldeContrat'],$_POST['montantDecouvert']);
    }

    if(isset($_POST['modifdec'])) {
        CtlModifDecouvert($_POST['numClient'], $_POST['compte'], $_POST['montantDecouvert']);
	}

    if(isset($_POST['rescontrat'])){
        CtlResContrat($_POST['numCli'],$_POST['contratares']);
    }

    if(isset($_POST['rescompte'])){
        CtlResCompte($_POST['numCli'],$_POST['compteares']);
    }

    if(isset($_POST['choixcli'])){
        $cli=$_POST['choixClient'];

        CtlAfficherMenuDecouvert($cli);
    }

    if(isset($_POST['choixcli2'])){
        $cli=$_POST['choixClient2'];
        $x=CtlChercheContrat($cli);
        CtlAfficherMenuResContrat($cli,$x);
    }

    if(isset($_POST['choixcli3'])){
        $cli=$_POST['choixClient3'];
        $x=CtlChercheCompte($cli);
        CtlAfficherMenuResCompte($cli,$x);
    }


	


    afficherLog();
}catch (Exception $e){
    $msg = $e->getMessage(); 
    CtlErreur($msg);
}
