<?php
function afficherInscrireCli(){
    $contenu='<form id=monForm2 action="site.php" method="post"> 
    <fieldset><legend>Inscrire un nouveau client</legend>
    <p>
    <label for="nomCli">Nom du Client :</label>
    <input type="text" name="nomCli" id="nomCli" />
    </p>
    <p>
    <label for="prenomCli">Prénom du Client : </label>
    <input type="text" name="pseudo" id="pseudo" />
    </p>
    <p>
    <label for="dateNCli">Date de naissance du Client :</label>
    <input type="date" name="dateNCli" id="dateNCli" />
    </p>
    <p>
    <label for="adresseCli">Adresse du Client : </label>
    <input type="text" name="adresseCli" id="adresseCli" />
    </p>
    <p>
    <label for="numTelCli">Numéro de téléphone du Client : </label>
    <input type="text" name="numTelCli" id="numTelCli" maxlength="10" />
    </p>
    <p>
    <label for="emailCli">eMail du Client : </label>
    <input type="text" name="emailCli" id="emailCli" />
    </p>
    <p>
    <label for="professionCli">Profession du Client : </label>
    <input type="text" name="professionCli" id="professionCli" />
    </p>
    <p>
    Situation familiale du Client :
    <select name="situationFamilleCli">
    <option value="celibataire" selected>Célibataire</option>
    <option value="marie">Marié</option>
    <option value="pacse">Pacsé</option>
    </select>
    </p>
    <p>
    <input type="submit" value="Inscrire le client" name="inscrireCli">
    <input type="reset" value="Effacer" >
    </p>
    </fieldset></form>'.afficherMenuConseiller();
    require_once ('gabarit.php');

}

function afficherConseiller(){
    $contenu='<form id=monForm1 action="site.php" method="post"> 
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

function afficherMenuConseiller(){
    $contenu='<form id="formMenu" method="post" action="site.php"><input type="submit" value="Deconnexion" name="Deco"></form>';
    return $contenu;
}