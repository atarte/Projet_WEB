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
    document.location.href="/Candidature/step2EtudiantA/"+id;
}


function refuser(id) {
    document.location.href="/Candidature/step2EtudiantR/"+id;
}

function envoyer() {

}
