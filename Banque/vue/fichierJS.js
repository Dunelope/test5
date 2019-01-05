function VerifierAjoutContrats(form,valeurEntree,nombreAsuppr) {
    for (i=1;i<document.forms[form].elements.length-nombreAsuppr; i++) {
        if (document.forms[form].elements[i].type === "text") {
            if (document.forms[form].elements[i].value === document.forms[form].elements[valeurEntree].value) {
                alert('Impossible d\'ajouter, le nom existe déjà');
                return false;
            }
        }
    }
    return true;
}

function VerifAjoutContratEcrire(form,valeurEntree,desti,nombreAsuppr) {
    if (VerifierAjoutContrats(form,valeurEntree,nombreAsuppr) && document.forms[form].elements[valeurEntree].value!=="")
        document.forms[form].elements[desti].value='true';
    else
        document.forms[form].elements[desti].value='false';
}

function verifierModifContrat(form,nombreAsuppr) {
    var checktrue = new Array();
    var checkfalse= new Array();
    for (i = 1; i < document.forms[form].elements.length - nombreAsuppr; i++) {
        if (document.forms[form].elements[i].type === "checkbox") {
            if (document.forms[form].elements[i].checked)
                checktrue.push(document.forms[form].elements[i+1].value);
            else
                checkfalse.push(document.forms[form].elements[i].value);
        }
    }
    for (i=0;i<checkfalse.length;i++){
        for (j=0;j<checktrue.length;j++){
            if (checkfalse[i]===checktrue[j]) {
                alert('Impossible de modifier, le nom existe déjà');
                return false;
            }
        }
    }
    return true;
}

function verifierModifContratEcrire(form,desti,nombreAsuppr){
    if (verifierModifContrat(form,nombreAsuppr) &&  verifCasesCoches(form,nombreAsuppr))
        document.forms[form].elements[desti].value='true';
    else
        document.forms[form].elements[desti].value='false';
}

function verifCasesCoches(form,nombreAsuppr) {
    var checktrue = new Array();
    for (i = 1; i < document.forms[form].elements.length - nombreAsuppr; i++) {
        if (document.forms[form].elements[i].type === "checkbox") {
            if (document.forms[form].elements[i].checked)
                checktrue.push(document.forms[form].elements[i].value);
        }
    }
    if (checktrue.length>0) {

        return true
    }
    alert('Veullez selectionner une case');
    return false;
}

function verifSupprContratEcrire(form,desti,nombreAsuppr) {
    if (verifCasesCoches(form,nombreAsuppr))
        document.forms[form].elements[desti].value='true';
    else
        document.forms[form].elements[desti].value='false';
}




function verifierButtonInvi(form,but) {
    return document.forms[form].elements[but].value==='true';

}

function verifAddEmploye(form,desti,nom,login,mdp) {
    if (document.forms[form].elements[nom].value!=="" && document.forms[form].elements[login].value!=="" && document.forms[form].elements[mdp].value!=="") {
        document.forms[form].elements[desti].value = 'true';
    }else {
        document.forms[form].elements[desti].value = 'false';
        alert('Un des champs est vide');
    }

    }

/*----------------------------------------*/

function verifCheckBoxAgent(form){
    for (i = 0; i < document.forms[form].elements.length; i++) {
        if (document.forms[form].elements[i].type === "radio") {
            if (document.forms[form].elements[i].checked) {
               return true;
			}
        }
    }
	alert('Aucun bouton radio sélectionné');
	return false;
}

function verifCheckBoxAgentEcrire(form,desti) {
    if (verifCheckBoxAgent(form))
        document.forms[form].elements[desti].value='true';
    else
        document.forms[form].elements[desti].value='false';
}

function  verifCheckBoxConseiller1(form) {

    for (i = 0; i < document.forms[form].elements.length; i++) {
        if (document.forms[form].elements[i].type === "radio" && document.forms[form].elements[i].name==="dateTimeBouttonRadio") {
            if (document.forms[form].elements[i].checked ) {
                return true;
            }
        }
    }
    alert('Aucun bouton radio sélectionné');
    return false;
}

function verifcheckBoxConseiller1Ecrire(form,desti) {
    if (verifCheckBoxConseiller1(form))
        document.forms[form].elements[desti].value='true';
    else
        document.forms[form].elements[desti].value='false';
}

function verifCheckBoxConseiller2(form) {
    for (i = 0; i < document.forms[form].elements.length; i++) {
        if (document.forms[form].elements[i].type === "radio" && document.forms[form].elements[i].name==="detailRDVButtonRadio") {
            if (document.forms[form].elements[i].checked) {
                return true;
            }
        }
    }
    alert('Aucun bouton radio sélectionné');
    return false;
}



function verifcheckBoxConseiller2Ecrire(form,desti) {
    if (verifCheckBoxConseiller2(form))
        document.forms[form].elements[desti].value='true';
    else
        document.forms[form].elements[desti].value='false';
}

function mettreTrue(form,desti) {
    document.forms[form].elements[desti].value='true';

}

function afficheralert() {
    alert("Veuillez entrer un nombre dans la case montant");
}



	