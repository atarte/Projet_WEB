<?php

Class Etudiant_Model extends Model {
    public function __construct() {

        if (!isset($_SESSION['role']) || $_SESSION['role'] == "4" || ($_SESSION['role'] == "3" && $_SESSION['role']['etudiant'] != "1")) {
            session_unset();
            // il faudrai affiché un message du genre "Vous n'avez pas les droits pour accédé à cette page"
            header("location: /");
        }
    }


    public function addEtudiant() {
        $this->getConnexion();

        $req = "SELECT Id_Users FROM Users WHERE Email = :email";

        $query = $this->db->prepare($req);

        $email = strtolower($_POST['email']);
        $query->bindParam(':email', $email);

        $query->execute();

        $count = $query->rowCount();

        if ($count == 0 ) {

            $_POST['pilote'] = intval($_POST['pilote']);
            $_POST['promotion'] = intval($_POST['promotion']);
            $_POST['specialite'] = intval($_POST['specialite']);

            $nom = strtolower($_POST['nom']);
            $prenom = strtolower($_POST['prenom']);
            $pwd = strtolower($_POST['pwd']);
            $pilote = strtolower($_POST['pilote']);
            $promotion = strtolower($_POST['promotion']);
            $specialite = strtolower($_POST['specialite']);

            $req = "CALL Creation_Etudiant(:nom, :prenom, :email, :pwd, :pilote, :promotion, :specialite)";

            $query = $this->db->prepare($req);

            $query->bindParam(':nom', $nom);
            $query->bindParam(':prenom', $prenom);
            $query->bindParam(':email', $email);
            $query->bindParam(':pwd', $pwd);
            $query->bindParam(':pilote', $pilote);
            $query->bindParam(':promotion', $promotion);
            $query->bindParam(':specialite', $specialite);

            $query->execute();

            header("Location: /Etudiant");
        }
        else {
            // header("Location: /Etudiant/creation");
            return 1;
        }

    }


    public function updateEtudiant() {

    }


    public function deleteEtudiant() {
        
    }


    public function getEtudiant(int $p) {
        $this->getConnexion();

        $req = "CALL Affichage_Etudiant(:p)";

        $query = $this->db->prepare($req);

        $query->bindParam(':p', $p);

        $query->execute();

        return $query;
    }


    public function getPilote() {
        $this->getConnexion();

        $req = "SELECT Users.Id_Users AS id, Users.Nom AS nom, Users.Prenom AS prenom FROM Users INNER JOIN Droit ON Users.Id_Users = Droit.Id_Users WHERE Droit.Id_Statut = 2";

        $query = $this->db->prepare($req);

        $query->execute();

        return $query;
    }


    public function getPromotion() {
        $this->getConnexion();

        $req = "SELECT Id_Promotion AS id, Promotion AS promotion FROM Promotion;";

        $query = $this->db->prepare($req);

        $query->execute();

        return $query;
    }


    public function getSpecialite() {
        $this->getConnexion();

        $req = "SELECT Id_Specialite AS id, Specialite AS specialite FROM Specialite;";

        $query = $this->db->prepare($req);

        $query->execute();

        return $query;
    }
}
