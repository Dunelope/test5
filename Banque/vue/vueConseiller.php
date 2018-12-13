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
<option value="ouvrirCompte">Ouvrir des comptes</option>
<option value="modifDecouvert">Modifier la valeur d&#039;un découvert</option>
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
    Situation familiale du Client :
    <select name="situationFCli">
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

function afficherVendreContrat(){
    $contenu='<form id=Formc3 action="site.php" method="post"> 
    <fieldset><legend>Vendre un contrat</legend>
    <p>
    Numéro du client :
    <input type="text" name="numCli" required>
    </p>
    <p>
    Type de contrat : 
    <select name="contratAVendre">
    <option value="credit">Crédit</option>
    <option value="assuranceVie">Assurance Vie</option>
    </select>
    </p>
    <p>
    <input type="submit" value="Vendre le contrat" name="vendreContrat">
    <input type="reset" value="Effacer" >
    </p>
    </fieldset></form>'.afficherMenuConseiller();
    require_once ('gabarit.php');
}

function afficherOuvrirCompte(){
    $contenu='<form id=Formc4 action="site.php" method="post"> 
    <fieldset><legend>Ouvrir un compte</legend>
    <p>
    Numéro du client :
    <input type="text" name="numCli" required>
    </p>
    <p>
    Type de compte : 
    <select name="compteAOuvrir">
    <option value="cel">CEL</option>
    <option value="ldds">LDDS</option>
    <option value="livretA">Livret A</option>
    <option value="livretJeune">Livret Jeune</option>
    <option value="pel">PEL</option>
    <option value="perp">PERP</option>
    </select>
    </p>
    <p>
    Solde :
    <input type="text" name="soldeContrat" required>
    </p>
    <p>
    Montant du découvert :
    <input type="text" name="montantdecouvert" required>
    </p>
    <p>
    <input type="submit" value="Ouvrir le compte" name="ouvrirCompte">
    <input type="reset" value="Effacer" >
    </p>
    </fieldset></form>'.afficherMenuConseiller();
    require_once ('gabarit.php');
}

