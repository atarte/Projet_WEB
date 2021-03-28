var codePostal = document.getElementById("code_p");
var ville = document.getElementById("ville");
var region = document.getElementById("region")


var nomVille;
var nomRegion;


codePostal.addEventListener("keyup", Verification);

function Verification() {
    nomVille = undefined;
    nomRegion = undefined;

    if (codePostal.value.length == 5) {
        let url = "https://api.zippopotam.us/FR/" + codePostal.value;

        const request = new XMLHttpRequest();

        request.open("GET", url);
        request.send();

        request.onload = (e) => {
            if (request.status == 200) {

                var info = JSON.parse(request.response);
                var lenTab = info.places.length;

                nomVille = new Array(lenTab);

                for (i = 0; i < lenTab; i++) {
                    nomVille[i] = info.places[i]['place name'];
                }

                nomRegion = info.places[0].state;

                PropositionVille();
                PropositionRegion();

                // console.dir(info)
                // console.log(nomVille)
                // console.log(nomRegion)
            }
        }
    }

    PropositionVille();
    PropositionRegion();
};

function PropositionVille() {
    if (codePostal.value.length >= 5) {
        if (nomVille !== undefined) {
            if (nomVille.length == 1) {
                ville.innerHTML = '<option value="' + nomVille[0] + '">' + nomVille[0] + '</option>';
            }
            else {
                let option = '<option value =\"\">Choisissez votre ville</option>';

                for (i = 0; i < nomVille.length; i++) {
                    option += '<option value="' + nomVille[i] + '">' + nomVille[i] + '</option>';
                }
                ville.innerHTML = option;
            }
        }
        else {
            ville.innerHTML = '<option value=\"\">Aucune villes correspondantes</option>';
        }
    }
    else {
        ville.innerHTML = '';
    }
};

function PropositionRegion() {
    if (codePostal.value.length >= 5) {
        if (nomRegion !== undefined) {
            region.value = nomRegion;
        }
        else {
            region.value = 'region non determine';
        }
    }
    else {
        region.value = '';
    }
};

function modification(id) {
    document.getElementById("nom").value = document.getElementById("nom_"+id).innerHTML;
    document.getElementById("email").value = document.getElementById("email_"+id).innerHTML;
    document.getElementById("nombre_accepter").value = document.getElementById("nombre_"+id).innerHTML;
    document.getElementById("adresse").value = document.getElementById("adresse_"+id).innerHTML;
    document.getElementById("region").value = document.getElementById("region_"+id).innerHTML;
    document.getElementById("code_p").value = document.getElementById("code_p_"+id).innerHTML;

    //select(id, "ville");
    select(id, "secteur");

    document.getElementById("formulaire").action = "/Entreprise/modification/"+id;

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
    document.getElementById("id").value = "";
    document.getElementById("nom").value = "";
    document.getElementById("email").value = "";
    document.getElementById("adresse").value = "";
    document.getElementById("code_p").value = "";
    document.getElementById("ville").selectedIndex = 0;
    document.getElementById("region").value = "";
    document.getElementById("nombre_accepter").value = "";
    document.getElementById('secteur').selectedIndex = 0;

    document.getElementById("formulaire").action = "/Entreprise/creation";

    document.getElementById("submit").value = "Créer";

    document.getElementById("annuler").innerHTML = "";
}


function confirmation(id) {
    let nom = document.getElementById("nom_"+id).innerHTML;
    let adresse = document.getElementById("adresse_"+id).innerHTML;

    let res = confirm("Voulez vous réelement supprimer cette Entreprise : "+nom+" "+adresse+" ?");

    if (res) {
        document.location.href="/Entreprise/suppression/"+id;
    }
}


function confiance(id) {
    document.location.href="/Entreprise/confiance/"+id;
}


function entre (id_ent, point) {


    for (i = 0; i < point; i++) {
        j = i +1

        document.getElementById(id_ent+'_note_'+j).innerHTML = "⭐"
        document.getElementById(id_ent+'_note_'+j).style.backgroundColor = "grey"
    }

    for (i = 1+point; i < 6; i++) {

        document.getElementById(id_ent+'_note_'+i).innerHTML = "☆"
        document.getElementById(id_ent+'_note_'+i).style.backgroundColor = "white"
    }
}


// document.getElementById("point_"+id_ent).addEventListener("mouseenter", function(  ) {isOnDiv=true;});
// document.getElementById("point_"+id_ent).addEventListener("mouseout", function(  ) {isOnDiv=false;});

function sortie (id_ent, point) {
    // if (isOnDiv === true ) {
        //
        //     console.log(id_ent+' sortie '+point);
        // }


}
