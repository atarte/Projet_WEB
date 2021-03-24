<?php

Class Wishlist_Model extends Model {

    public function __construct() {
        // verification que l'utilisateur à bien le droit d'accédé à cette page

        // if (($_SESSION['role'] == "3" && $_SESSION['deleg']['offre'] != "1")) {
        //     session_unset();
        //     header("location: /");
        // }
    }

    public function getWishlist() {

        $this->getConnexion();

        $req = "SELECT Candidature.Id_Stage AS id_stage, Candidature.Id_Users AS id_user, Candidature.Souhait AS souhait FROM Candidature WHERE Candidature.Id_Users = :id";

        $query = $this->db->prepare($req);

        $query->bindParam(':id', $_SESSION['id']);

        $query->execute();

        return $query;

    }


    public function getPostulation() {

        $this->getConnexion();

        $req = "SELECT Candidature.Id_Stage AS id_stage, Candidature.Id_Users AS id_user, Candidature.Postulation AS postulation FROM Candidature WHERE Candidature.Id_Users = :id";

        $query = $this->db->prepare($req);

        $query->bindParam(':id', $_SESSION['id']);

        $query->execute();

        return $query;

    }

    public function displayOffre() {
        $req = "CALL Affichage_Whishlist()";

        $query = $this->db->prepare($req);

        $query->execute();

        return $query;
    }

}
