function modif(id) {
    // let html = document.getElementById("nom_"+id).innerHTML;

    document.getElementById("nom").value = document.getElementById("nom_"+id).innerHTML;
    document.getElementById("prenom").value = document.getElementById("prenom_"+id).innerHTML;
    document.getElementById("email").value = document.getElementById("email_"+id).innerHTML;

    select(id, "pilote");
    select(id, "promotion");
    select(id, "specialite");

    document.getElementById("formulaire").action = "/Etudiant/modification/"+id;

    document.getElementById("pwd_div").innerHTML = "";

    document.getElementById("submit").value = "Modifier";

    document.getElementById("annuler").innerHTML = '<a href="/Etudiant"><button>Annuler</button></a>';
}

function select(idEtudiant, idSelect) {
    let pilote = document.getElementById(idSelect+"_"+idEtudiant).innerHTML;

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
