function add() {

    //Création d'un input
    var element = document.createElement("input");

    //définition des attribut du nouvel input
    element.setAttribute("type", "text");
    element.setAttribute("value", "");
    element.setAttribute("name", "competences");

    var plus = document.getElementById("plus_comp");

    plus.appendChild(element);
}

function modification(id) {
    document.getElementById("nom").value = document.getElementById("nom_"+id).innerHTML;
    document.getElementById("competences").value = document.getElementById("competences_"+id).innerHTML;
    document.getElementById("email").value = document.getElementById("email_"+id).innerHTML;
    document.getElementById("duree").value = document.getElementById("duree_"+id).innerHTML;
    document.getElementById("nb_place").value = document.getElementById("nb_"+id).innerHTML;
    document.getElementById("remuneration").value = document.getElementById("remuneration_"+id).innerHTML;
    //document.getElementById("date").value = document.getElementById("date_"+id).innerHTML;

    select(id, "specialite");
    select(id, "entreprise");
    select(id, "ville");

    document.getElementById("formulaire").action = "/Offre/modification/"+id;

    document.getElementById("submit").value = "Modifier";

    document.getElementById("annuler").innerHTML = '<button onclick=annuler()>Annuler</button>';
}


function select(idOffre, idSelect) {
    let offre = document.getElementById(idSelect+"_"+idOffre).innerHTML;

    let select = document.getElementById(idSelect);
    let len = select.length;

    for (let i = 0; i < len; i++) {
        let opt = select.options[i].outerText;

        if (opt == offre) {
            document.getElementById(idSelect).selectedIndex = i;
            break;
        }
    }
}


function annuler() {
    document.getElementById("nom").value = "";
    document.getElementById("competences").value = "";
    document.getElementById("email").value = "";
    document.getElementById("duree").value = "";
    document.getElementById("nb_place").value = "";
    document.getElementById("remuneration").value = "";
    document.getElementById("date").value = "";


    document.getElementById('specialite').selectedIndex = 0;
    document.getElementById('entreprise').selectedIndex = 0;
    document.getElementById('ville').selectedIndex = 0;

    document.getElementById("formulaire").action = "/Offre/creation";

    document.getElementById("submit").value = "Créer";

    document.getElementById("annuler").innerHTML = "";
}


function confirmation(id) {
    let nom = document.getElementById("nom_"+id).innerHTML;

    let res = confirm("Voulez vous réelement supprimer cette offre : "+nom+" ?");

    if (res) {
        document.location.href="/Offre/suppression/"+id;
    }
}

function wish(id_offre) {
    let nom_offre = document.getElementById("nom_"+id_offre).innerHTML;

    let res = confirm("Voulez vous réelement ajouter cette offre à votre WishList : "+nom_offre+" ?");

    if (res) {
        document.location.href="/Offre/wishList/"+id_offre;
    }
}

function deleteWish(id_offre){
    let nom_offre = document.getElementById("nom_"+id_offre).innerHTML;

    let res = confirm("Voulez vous réelement supprimer cette offre à votre WishList : "+nom_offre+" ?");

    if (res) {
        document.location.href="/Offre/deleteWishlist/"+id_offre;
    }
}


function etudiant() {
    let role = document.getElementById("role").value;
    let form = document.getElementById("formulaire");

    if (role == 4) {
        (form.parentElement).removeChild(form);
    }
}
document.addEventListener('DOMContentLoaded', etudiant);
