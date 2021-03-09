// Declaration des variables
let pass = document.getElementById('passwd'); //Variable stockage password
let conn = document.getElementById('envoyer'); //Variable event pour clique sur bouton
let user = document.getElementById('username'); //Variable stockage username
let input = document.getElementById('id_users'); //Variable stockage resultat requête SQL
let envoi = document.getElementById('envoi'); //envoie de la variable input
let requete; //Variable pour requete http


//Fonction d'analyse et envoie du resultat pour la page suivante
function analyse(){
	if(requete.readyState == 4){
		let id_User = requete.responseText; //Reception du résultat SQL
		console.log(id_User);
		if (id_User == 'Erreur') { //Determine si l'utilisateur existe
			alert('Login ou Password incorect');
		}
		else{
			input.value = id_User;
			envoi.submit(); //envoie l'id
		}
	}
}

conn.addEventListener('click', function(attent) {
	attent.preventDefault(); //supprime l'action par default du boutton Envoyer
	requete = new XMLHttpRequest(); 
	requete.open("GET","./asset/php/Requete_conn.php?User="+user.value+"&Pass="+pass.value, true); //Ouverture de la requete http
	requete.onreadystatechange = analyse; //Analyse du resultat
	requete.send();//Envoi de la requete
});
