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

        request.open("GET", url, false);
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

                // PropositionVille();
                // PropositionRegion();

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
 consol.log("ok")
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
