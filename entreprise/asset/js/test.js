// window.onload = Proposition;

var codePostal = document.getElementById("code_p");
var ville = document.getElementById("ville")

var nomCommune;

codePostal.addEventListener("keyup", Verification);
// ville.addEventListener("focus", Proposition)


function Verification() {
    nomCommune = undefined;

    if (codePostal.value.length == 5) {
        let url = "https://apicarto.ign.fr/api/codes-postaux/communes/" + codePostal.value;

        const request = new XMLHttpRequest();

        request.open("GET", url);
        request.send();

        request.onload = (e) => {

            var info = JSON.parse(request.response);
            var lenTab = info.length;

            if (nomCommune === undefined) {
                nomCommune = new Array(lenTab);
            }
            else {
                nomCommune = undefined;
                nomCommune = new Array(lenTab);
            }

            for (i = 0; i < lenTab; i++) {
                nomCommune[i] = info[i].nomCommune;
            }
            // console.log(nomCommune);
            Proposition()
        }
    }
    Proposition()
};

function Proposition() {
    if (nomCommune !== undefined) {
        if (nomCommune.length == 1) {
            ville.innerHTML = "<option value=\"" + nomCommune[0] + "\">" + nomCommune[0] + "</option>\n";
        }
        else {
            let option = "<option value =\"\">Choisissez votre ville</option>";

            for (i = 0; i < nomCommune.length; i++) {
                option = option + "<option value=\"" + nomCommune[i] + "\">" + nomCommune[i] + "</option>\n";
            }
            ville.innerHTML = option;
        }
    }
    else {
        ville.innerHTML = "<option value=\"\">Aucune villes correspondantes</option>";
    }
};

// var codePostal = document.getElementById("code_p");
// var ville = document.getElementById("ville");
// var region = document.getElementById("region")

// var nomVille;
// var nomRegion;

// codePostal.addEventListener("keyup", Verification);

// function Verification() {
//     nomVille = undefined;
//     nomRegion = undefined;

//     if (codePostal.value.length == 5) {
//         let url = "https://api-adresse.data.gouv.fr/search/?q=" + codePostal.value + "&type=municipality";

//         const request = new XMLHttpRequest();

//         request.open("GET", url);
//         request.send();
//         request.onload = (e) => {

//             var info = JSON.parse(request.response);
//             var lenTab = info.features.length;

//             if (lenTab >= 1) {
//                 nomVille = new Array(lenTab);

//                 for (i = 0; i < lenTab; i++) {
//                     nomVille[i] = info.features[i].properties.name;
//                 }

//                 let Region = info.features[0].properties.context.split(", ");
//                 nomRegion = Region[2];

//                 PropositionVille();
//                 PropositionRegion();
//             }
//         }
//     }

//     PropositionVille();
//     PropositionRegion();
// };

// function PropositionVille() {
//     console.log("activation de Proposition ville")
//     if (codePostal.value.length >= 5) {
//         if (nomVille !== undefined) {
//             if (nomVille.length == 1) {
//                 ville.innerHTML = "<option value=\"" + nomVille[0] + "\">" + nomVille[0] + "</option>\n";
//             }
//             else {
//                 let option = "<option value =\"\">Choisissez votre ville</option>";

//                 for (i = 0; i < nomVille.length; i++) {
//                     option = option + "<option value=\"" + nomVille[i] + "\">" + nomVille[i] + "</option>\n";
//                 }
//                 ville.innerHTML = option;
//             }
//         }
//         else {
//             ville.innerHTML = "<option value=\"\">Aucune villes correspondantes</option>";
//         }
//     }
//     else {
//         ville.innerHTML = "";
//     }
// };

// function PropositionRegion() {
//     console.log("Activation de Propsotion Region")
//     if (codePostal.value.length >= 5) {
//         if (nomRegion !== undefined) {
//             region.value = nomRegion;
//         }
//         else {
//             region.value = "region non determine"
//         }
//     }
//     else {
//         region.value = "";
//     }
// };



