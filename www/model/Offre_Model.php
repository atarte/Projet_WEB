<?php

Class Offre_Model extends Model {
    $this->competence;

    public function __construct() {
        // verification que l'utilisateur à bien le droit d'accédé à cette page

        // if (($_SESSION['role'] == "3" && $_SESSION['deleg']['offre'] == "1") || ($_SESSION['role'] == "2") || ($_SESSION['role'] == "1")) {
        //     header("location: /");
        // }
        $this->competence = array();
    }

    public function getType() {

        $this->getConnexion();

        $req = "SELECT Id_Specialite AS id, Specialite AS spe FROM Specialite ORDER BY Specialite";

            $query = $this->db->prepare($req);

            $query->execute();

            return $query;
    }

    public function getVille() {

        $this->getConnexion();

        $req = "SELECT Id_Ville AS id, Ville AS ville FROM Ville ORDER BY Ville";

            $query = $this->db->prepare($req);

            $query->execute();

            return $query;
    }


    public function getEntreprise() {

        $this->getConnexion();

        $req = "SELECT Id_Entreprise AS id, Nom AS entreprise FROM Entreprise ORDER BY Entreprise";

        $query = $this->db->prepare($req);

        $query->execute();

        return $query;
    }


    // public function displayOffre(int $p) {
    //     $req = "CALL Affichage_Offre(:p)";
    //
    //     $query = $this->db->prepare($req);
    //
    //     $query->bindParam(':p', $p);
    //
    //     $query->execute();
    //
    //     return $query;
    // }

    public function displayOffre(int $p) {
        $req = "CALL Affichage_Offre(:p)";

        $query = $this->db->prepare($req);

        $query->bindParam(':p', $p);

        $query->execute();

        $comp = $query;

        // $query_comp = array();

        while ($row = $comp->fetch()) {
            $req = "SELECT c.Id_Competence AS id, c.Competence AS competence FROM Demande
                    INNER JOIN Competence c ON Demande.Id_Competence = c.Id_Competence
                    WHERE Demande.Id_stage = :id";

            $autre = $this->db->prepare($req);

            $autre->bindParam(':id', $row["id"]);

            $autre->execute();

            // $query_comp =
            array_push($this->competence, $autre);
        }
        // return $query;

        return $queryp;
    }



    public function displayCompetence(int $p) {
        $req = "CALL Affichage_Competence(:p)";

        $query = $this->db->prepare($req);

        $query->bindParam(':p', $p);

        $query->execute();

        return $query;
    }
}
