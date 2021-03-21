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
