function modification(id) {
    document.getElementById("nom").value = document.getElementById("nom_"+id).innerHTML;
    document.getElementById("prenom").value = document.getElementById("prenom_"+id).innerHTML;
    document.getElementById("email").value = document.getElementById("email_"+id).innerHTML;

    if (document.getElementById("entreprise_"+id).innerHTML == "1") {
        document.getElementById("entreprise").checked = true;
    }
    if (document.getElementById("offre_"+id).innerHTML == "1") {
        document.getElementById("offre").checked = true;
    }
    if (document.getElementById("pilote_"+id).innerHTML == "1") {
        document.getElementById("pilote").checked = true;
    }
    if (document.getElementById("delegue_"+id).innerHTML == "1") {
        document.getElementById("delegue").checked = true;
    }
    if (document.getElementById("etudiant_"+id).innerHTML == "1") {
        document.getElementById("etudiant").checked = true;
    }
    if (document.getElementById("candidature_"+id).innerHTML == "1") {
        document.getElementById("candidature").checked = true;
    }

    document.getElementById("pwd_div").innerHTML = "";

    document.getElementById("formulaire").action = "/Delegue/modification/"+id;

    document.getElementById("submit").value = "Modifier";

    document.getElementById("annuler").innerHTML = '<button onclick=annuler()>Annuler</button>';
}


function annuler() {
    document.getElementById("nom").value = "";
    document.getElementById("prenom").value = "";
    document.getElementById("email").value = "";

    document.getElementById("entreprise").checked = false;
    document.getElementById("offre").checked = false;
    document.getElementById("pilote").checked = false;
    document.getElementById("delegue").checked = false;
    document.getElementById("etudiant").checked = false;
    document.getElementById("candidature").checked = false;

    document.getElementById("pwd_div").innerHTML = 'password :<input "pwd" type="password" name="pwd" required>';

    document.getElementById("formulaire").action = "/Etudiant/creation";

    document.getElementById("submit").value = "Créer";

    document.getElementById("annuler").innerHTML = "";
}


function confirmation(id) {
    let nom = document.getElementById("nom_"+id).innerHTML;
    let prenom = document.getElementById("prenom_"+id).innerHTML;

    let res = confirm("Voulez vous réelement supprimer ce délégué : "+nom+" "+prenom+" ?");

    if (res) {
        document.location.href="/Delegue/suppression/"+id;
    }
}
