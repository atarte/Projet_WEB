<?php

Class Delegue_Model extends Model {
    public function __construct() {
        if (!isset($_SESSION['role']) || $_SESSION['role'] == "4" || ($_SESSION['role'] == "3" && $_SESSION['deleg']['delegue'] != "1")) {
            session_unset();

            header("location: /");
        }
    }


    public function displayDelegue(int $p) {
        $this->getConnexion();

        $req = "CALL Affichage_Delegue(:p)";

        $query = $this->db->prepare($req);

        $query->bindParam(':p', $p);

        $query->execute();

        return $query;
    }


    public function addDelegue() {

    }


    public function updateDelegue() {

    }


    public function deleteDelegue() {

    }


    public function search() {

    }
}
