<?php

Class Candidature_Model extends Model {
    public function __construct() {
        // Vérification des droits d'accés

        // if (!isset($_SESSION['id'])) {
        //     session_unset();
        //     // il faudrai affiché un message du genre "page inaxessible"
        //     header("location: /");
        // }
    }


    public function displayCandidature() {
        $this->getConnexion();

        $req = "CALL Affichage_Candidature(:id)";

        $query = $this->db->prepare($req);

        $query->bindParam(':id', $_SESSION['id']);

        $query->execute();

        return $query;
    }
}
