function modifier() {

  document.getElementById("formulaire").action = "/Pilote/modification_pilote";

  document.getElementById("pass").innerHTML = "";

  document.getElementById("submit").value = "Modifier";

  document.getElementById("annuler").innerHTML = '<a href="/Etudiant"><button>Annuler</button></a>';

}

// function creer() {
//
//   document.getElementById("formulaire").action = "/Pilote/creation_pilote";
//
//   document.getElementById("pass").innerHTML = "";
//
//   document.getElementById("submit").value = "Créer";
//
//   document.getElementById("annuler").innerHTML = '';
//
// }

let modification = document.getElementsByName('modif');
modification.addEventListener('click',modifier);

// let annulation = document.getElementById('annuler');
// annuler.addEventListener('click',creer);
