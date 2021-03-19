<?php

Class Etudiant_Model extends Model {
    public function __construct() {

        if (!isset($_SESSION['role']) || $_SESSION['role'] == "3") {
            session_unset();
            // il faudrai affiché un message du genre "Vous n'avez pas les droits pour accédé à cette page"
            header("location: /");
        }
    }


    public function addEtudiant() {
        $this->getConnexion();

        $req = "SELECT Id_Users FROM Users WHERE Email = :email";

        $query = $this->db->prepare($req);

        $query->bindParam(':email', $_POST['email']);

        $query->execute();

        $count = $query->rowCount();

        if ($count == 0 ) {

            $_POST['pilote'] = intval($_POST['pilote']);
            $_POST['promotion'] = intval($_POST['promotion']);
            $_POST['specialite'] = intval($_POST['specialite']);

            $req = "CALL Creation_Etudiant(:nom, :prenom, :email, :pwd, :pilote, :promotion, :specialite)";

            $query = $this->db->prepare($req);

            $query->bindParam(':nom', $_POST['nom']);
            $query->bindParam(':prenom', $_POST['prenom']);
            $query->bindParam(':email', $_POST['email']);
            $query->bindParam(':pwd', $_POST['pwd']);
            $query->bindParam(':pilote', $_POST['pilote']);
            $query->bindParam(':promotion', $_POST['promotion']);
            $query->bindParam(':specialite', $_POST['specialite']);

            $query->execute();

            header("Location: /Etudiant");
        }
        else {
            // header("Location: /Etudiant/creation");
            return 1;
        }

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
