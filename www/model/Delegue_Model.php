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
        $this->getConnexion();

        $req = "SELECT Id_Users FROM Users WHERE Email = :email";

        $query = $this->db->prepare($req);

        $email = strtolower($_POST['email']);
        $query->bindParam(':email', $email);

        $query->execute();

        $count = $query->rowCount();

        if ($count == 0 ) {
            $entreprise = 0;
            $offre = 0;
            $pilote = 0;
            $delegue = 0;
            $etudiant = 0;
            $candidature = 0;

            foreach ($_POST['gestion'] as $key => $element) {
                if ($element == "entreprise") {
                    $entreprise = 1;
                }
                else if ($element == "offre") {
                    $offre = 1;
                }
                else if ($element == "pilote") {
                    $pilote = 1;
                }
                else if ($element == "delegue") {
                    $delegue = 1;
                }
                else if ($element == "etudiant") {
                    $etudiant = 1;
                }
                else if ($element == "candidature") {
                    $candidature = 1;
                }
            }

            $nom = strtolower($_POST['nom']);
            $prenom = strtolower($_POST['prenom']);

            $req = "CALL Creation_Delegue(:nom, :prenom, :email, :pwd, :entreprise, :offre, :pilote, :delegue, :etudiant, :candidature)";

            $query = $this->db->prepare($req);

            $query->bindParam(':nom', $nom);
            $query->bindParam(':prenom', $prenom);
            $query->bindParam(':email', $email);
            $query->bindParam(':pwd', $_POST['pwd']);
            $query->bindParam(':entreprise', $entreprise);
            $query->bindParam(':offre', $offre);
            $query->bindParam(':pilote', $pilote);
            $query->bindParam(':delegue', $delegue);
            $query->bindParam(':etudiant', $etudiant);
            $query->bindParam(':candidature', $candidature);

            $query->execute();

            header("Location: /Delegue");
        }
        else {
            return 1;
        }
    }


    public function updateDelegue(int $id) {
        $this->getConnexion();

        $req = "SELECT Id_Users AS id FROM Users WHERE Email = :email";

        $query = $this->db->prepare($req);

        $email = strtolower($_POST['email']);
        $query->bindParam(':email', $email);

        $query->execute();

        $row = $query->fetch();
        $count = $query->rowCount();

        if ($count == 0 || $row['id'] == strval($id)) {
            $entreprise = 0;
            $offre = 0;
            $pilote = 0;
            $delegue = 0;
            $etudiant = 0;
            $candidature = 0;

            foreach ($_POST['gestion'] as $key => $element) {
                if ($element == "entreprise") {
                    $entreprise = 1;
                }
                else if ($element == "offre") {
                    $offre = 1;
                }
                else if ($element == "pilote") {
                    $pilote = 1;
                }
                else if ($element == "delegue") {
                    $delegue = 1;
                }
                else if ($element == "etudiant") {
                    $etudiant = 1;
                }
                else if ($element == "candidature") {
                    $candidature = 1;
                }
            }

            $nom = strtolower($_POST['nom']);
            $prenom = strtolower($_POST['prenom']);

            $req = "CALL Modification_Delegue(:id, :nom, :prenom, :email, :entreprise, :offre, :pilote, :delegue, :etudiant, :candidature)";

            $query = $this->db->prepare($req);

            $query->bindParam(':id', $id);
            $query->bindParam(':nom', $nom);
            $query->bindParam(':prenom', $prenom);
            $query->bindParam(':email', $email);
            $query->bindParam(':entreprise', $entreprise);
            $query->bindParam(':offre', $offre);
            $query->bindParam(':pilote', $pilote);
            $query->bindParam(':delegue', $delegue);
            $query->bindParam(':etudiant', $etudiant);
            $query->bindParam(':candidature', $candidature);

            $query->execute();

            header("Location: /Delegue");
        }
        else {
            return 1;
        }
    }


    public function deleteDelegue(int $id) {
        $this->getConnexion();

        $req = "CALL Suppression_Delegue(:id)";

        $query = $this->db->prepare($req);

        $query->bindParam(':id', $id);

        $query->execute();

        header("Location: /Delegue");
    }


    public function search() {
        $this->getConnexion();

        $whr = "";

        if (!empty($_POST['nom'])) {
            $whr = $whr."AND u.Nom = :nom ";
        }
        if (!empty($_POST['prenom'])) {
            $whr = $whr."AND u.Prenom = :prenom ";
        }

        $req =
            "SELECT
                u.Id_Users AS id,
                u.Nom AS nom,
                u.Prenom As prenom,
                u.Email AS email,
                d.Entreprise AS entreprise,
                d.Offre AS offre,
                d.Pilote AS pilote,
                d.Delegue AS delegue,
                d.Etudiant AS etudiant,
                d.Candidature AS candidature
            FROM Users u
            INNER JOIN Droit d
                ON u.Id_Users = d.Id_Users
            WHERE d.Id_Statut = 3 ".$whr;

            // echo $req;

        $query = $this->db->prepare($req);

        if (!empty($_POST['nom'])) {
            $query->bindParam(':nom', $_POST['nom']);
        }
        if (!empty($_POST['prenom'])) {
            $query->bindParam(':prenom', $_POST['prenom']);
        }

        $query->execute();

        return $query;
    }
}
