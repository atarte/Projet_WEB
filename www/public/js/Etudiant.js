function modif(id) {
    // console.log("oui"+id);

    document.getElementById("formulaire").action = "/Etudiant/modification/"+id;

    document.getElementById("pwd").innerHTML = "";

    document.getElementById("submit").value = "Modifier";

    document.getElementById("annuler").innerHTML = '<a href="/Etudiant"><button>Annuler</button></a>';
}
