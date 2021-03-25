function ajout_wish(id_offre) {
    document.location.href="/Candidature/wishList/"+id_offre;
}

function rejet_wish(id_offre){
    document.location.href="/Candidature/deleteWishlist/"+id_offre;
}

function rejet_post(id_offre){
    document.location.href="/Candidature/deletePostuler/"+id_offre;
}


function accepter(id) {
    //document.location.href="/Candidature/step2EtudiantA/"+id;

    //Création d'un input
        var text = document.createElement("input");
        var infile = document.createElement("input");
        var envoyer = document.createElement("button");
        var annuler = document.createElement("annuler");

        //définition des attribut du nouvel input
        text.setAttribute("type", "textarea");
        text.setAttribute("value", "");

        infile.setAttribute("type", "file");
        infile.setAttribute("value", "");

        envoyer.setAttribute("value", "Envoyer");

        annuler.setAttribute("value", "Annuler");

        var in_text = document.getElementById("textarea");
        var in_file = document.getElementById("infile");
        var btn_envoyer = document.getElementById("envoyer");
        var btn_annuler = document.getElementById("annuler");

        in_text.appendChild(text);
        in_file.appendChild(infile);
        btn_envoyer.appendChild(envoyer);
        btn_annuler.appendChild(annuler);

}


function refuser(id) {
    document.location.href="/Candidature/step2EtudiantR/"+id;
}
