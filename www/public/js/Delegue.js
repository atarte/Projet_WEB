function modification(id) {
    document.getElementById("nom").value = document.getElementById("nom_"+id).innerHTML;
    document.getElementById("prenom").value = document.getElementById("prenom_"+id).innerHTML;
    document.getElementById("email").value = document.getElementById("email_"+id).innerHTML;

    // check les check box si nessessaire

    document.getElementById("pwd_div").innerHTML = "";

    document.getElementById("formulaire").action = "/Delegue/modification/"+id;

    document.getElementById("submit").value = "Modifier";

    document.getElementById("annuler").innerHTML = '<button onclick=annuler()>Annuler</button>';
}


function annuler() {
    document.getElementById("nom").value = "";
    document.getElementById("prenom").value = "";
    document.getElementById("email").value = "";

    // uncheck les check box si nessessaire

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
