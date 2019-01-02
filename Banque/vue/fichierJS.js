function VerifierAjoutContrats(form,valeurEntree) {
    for (i=1;i<document.forms[form].elements.length-5; i++) {
        if (document.forms[form].elements[i].type === "text") {
            if (document.forms[form].elements[i].value === document.forms[form].elements[valeurEntree].value) {
                alert('Impossible d\'ajouter, le nom existe déjà');
                return false;
            }
        }
    }
    return true;
}

function VerifAjoutContratEcrire(form,valeurEntree,desti) {
    if (VerifierAjoutContrats(form,valeurEntree))
        document.forms[form].elements[desti].value='true';
    else
        document.forms[form].elements[desti].value='false';
}

function verifierModifContrat(form) {
    var checktrue = new Array();
    var checkfalse= new Array();
    for (i = 1; i < document.forms[form].elements.length - 5; i++) {
        if (document.forms[form].elements[i].type === "checkbox") {
            if (document.forms[form].elements[i].checked)
                checktrue.push(document.forms[form].elements[i+1].value);
            else
                checkfalse.push(document.forms[form].elements[i].value);
        }
    }
    //alert(checktrue.join(' , '));
    //alert(checkfalse.join(' | '));
    for (i=0;i<checkfalse.length;i++){
        for (j=0;j<checktrue.length;j++){
            //alert(checkfalse[i]+ ' '+ checktrue[j]);
            if (checkfalse[i]===checktrue[j]) {
                alert('Impossible de modifier, le nom existe déjà');
                return false;
            }
        }
    }
    return true;
}

function verifierModifContratEcrire(form,desti){
    if (verifierModifContrat(form))
        document.forms[form].elements[desti].value='true';
    else
        document.forms[form].elements[desti].value='false';
}

function verifSupprContrat(form) {
    var checktrue = new Array();
    for (i = 1; i < document.forms[form].elements.length - 5; i++) {
        if (document.forms[form].elements[i].type === "checkbox") {
            if (document.forms[form].elements[i].checked)
                checktrue.push(document.forms[form].elements[i].value);
        }
    }
    if (checktrue.length>0) {
        alert('Veullez selectionner une case à supprimer');
        return true
    }
    return false;
}

function verifSupprContratEcrire(form,desti) {
    if (verifSupprContrat(form))
        document.forms[form].elements[desti].value='true';
    else
        document.forms[form].elements[desti].value='false';
}


function verifierButtonInvi(form,but) {
    return document.forms[form].elements[but].value==='true'
}