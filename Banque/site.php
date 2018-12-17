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

    /*-------------------------------------------------*/
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
            CtlOperation();
        } elseif ($val == 'c4') {
            CtlRDV();
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
	
	 if (isset($_POST['RechercherClientID'])) {
		$nom=$_POST['SelectClientNom'];
		$dateN=$_POST['SelectClientDateN'];
		CtlTrouverIDClient($nom,$dateN);
	}
	
	


    afficherLog();
}catch (Exception $e){
    $msg = $e->getMessage(); 
    CtlErreur($msg);
}
