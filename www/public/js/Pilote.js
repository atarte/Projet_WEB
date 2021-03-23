function modification(id) {
    document.getElementById("nom").value = document.getElementById("nom_"+id).innerHTML;
    document.getElementById("prenom").value = document.getElementById("prenom_"+id).innerHTML;
    document.getElementById("email").value = document.getElementById("email_"+id).innerHTML;

    document.getElementById("pwd_div").innerHTML = "";

    select(id, "centre");

    document.getElementById("formulaire").action = "/Pilote/modification/"+id;

    document.getElementById("submit").value = "Modifier";

    document.getElementById("legend_form").innerHTML = "Modification de pilote";

    document.getElementById("annuler").innerHTML = '<button onclick=annuler()>Annuler</button>';
}


function select(idPilote, idSelect) {
    let pilote = document.getElementById(idSelect+"_"+idPilote).innerHTML;

    let select = document.getElementById(idSelect);
    let len = select.length;

    for (let i = 0; i < len; i++) {
        let opt = select.options[i].outerText;

        if (opt == pilote) {
            document.getElementById(idSelect).selectedIndex = i;
            break;
        }
    }

}


function annuler() {
    document.getElementById("nom").value = "";
    document.getElementById("prenom").value = "";
    document.getElementById("email").value = "";

    document.getElementById("pwd_div").innerHTML = '<input id="pwd" type="password" name="pwd" placeholder="Password" required>';

    document.getElementById('centre').selectedIndex = 0;

    document.getElementById("formulaire").action = "/Pilote/creation";

    document.getElementById("submit").value = "Créer";

    document.getElementById("legend_form").innerHTML = "Création de pilote";

    document.getElementById("annuler").innerHTML = "";
}


function confirmation(id) {
    let nom = document.getElementById("nom_"+id).innerHTML;
    let prenom = document.getElementById("prenom_"+id).innerHTML;

    let res = confirm("Voulez vous réelement supprimer ce Pilote : "+nom+" "+prenom+" ?");

    if (res) {
        document.location.href="/Pilote/suppression/"+id;
    }
}
