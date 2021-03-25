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
    console.log("accepter"+id);
}


function refuser(id) {
    console.log("refuser"+id);
}
