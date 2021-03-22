<?php

Class Etudiant_Model extends Model {
    public function __construct() {

        if (!isset($_SESSION['role']) || $_SESSION['role'] == "4" || ($_SESSION['role'] == "3" && $_SESSION['deleg']['etudiant'] != "1")) {
            session_unset();

            header("location: /");
        }
    }


    public function displayEtudiant(int $p) {
        $this->getConnexion();

        $req = "CALL Affichage_Etudiant(:p)";

        $query = $this->db->prepare($req);

        $query->bindParam(':p', $p);

        $query->execute();

        return $query;
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

            $req = "CALL Creation_Etudiant(:nom, :prenom, :email, :pwd, :pilote, :promotion, :specialite)";

            $query = $this->db->prepare($req);

            $query->bindParam(':nom', $nom);
            $query->bindParam(':prenom', $prenom);
            $query->bindParam(':email', $email);
            $query->bindParam(':pwd', $_POST['pwd']);
            $query->bindParam(':pilote', $_POST['pilote']);
            $query->bindParam(':promotion', $_POST['promotion']);
            $query->bindParam(':specialite', $_POST['specialite']);

            $query->execute();

            header("Location: /Etudiant");
        }
        else {
            return 1;
        }
    }


    public function updateEtudiant(int $id) {
        $this->getConnexion();

        $req = "SELECT Id_Users AS id FROM Users WHERE Email = :email";

        $query = $this->db->prepare($req);

        $email = strtolower($_POST['email']);
        $query->bindParam(':email', $email);

        $query->execute();

        $row = $query->fetch();
        $count = $query->rowCount();

        if ($count == 0 || $row['id'] == strval($id)) {

            $_POST['pilote'] = intval($_POST['pilote']);
            $_POST['promotion'] = intval($_POST['promotion']);
            $_POST['specialite'] = intval($_POST['specialite']);

            $nom = strtolower($_POST['nom']);
            $prenom = strtolower($_POST['prenom']);

            $req = "CALL Modification_Etudiant(:id, :nom, :prenom, :email, :pilote, :promotion, :specialite)";

            $query = $this->db->prepare($req);

            $query->bindParam(':id', $id);
            $query->bindParam(':nom', $nom);
            $query->bindParam(':prenom', $prenom);
            $query->bindParam(':email', $email);
            $query->bindParam(':pilote', $_POST['pilote']);
            $query->bindParam(':promotion', $_POST['promotion']);
            $query->bindParam(':specialite', $_POST['specialite']);

            $query->execute();

            header("Location: /Etudiant");
        }
        else {
            return 1;
        }
    }


    public function deleteEtudiant(int $id) {
        $this->getConnexion();

        $req = "CALL Suppression_Etudiant(:id)";

        $query = $this->db->prepare($req);

        $query->bindParam(':id', $id);

        $query->execute();

        header("Location: /Etudiant");

        // peut etre mettre une verification pour voir si la ligne a bien étais supprimer
    }


    public function search() {
        $this->getConnexion();

        $whr = "";

        if (!empty($_POST['nom'])) {
            $whr = $whr."AND Users.Nom = :nom ";
        }
        if (!empty($_POST['prenom'])) {
            $whr = $whr."AND Users.Prenom = :prenom ";
        }
        if (!empty($_POST['pilote'])) {
            $whr = $whr."AND Users.Id_Pilote = :pilote ";
        }
        if (!empty($_POST['promotion'])) {
            $whr = $whr."AND Users.Id_Promotion = :promotion ";
        }
        if (!empty($_POST['specialite'])) {
            $whr = $whr."AND Users.Id_Specialite = :specialite ";
        }
        if (!empty($_POST['centre'])) {
            $whr = $whr."AND Users.Id_Centre = :centre ";
        }

        $req =
            "SELECT
                Users.Id_Users AS id,
                Users.Nom AS nom,
                Users.Prenom As prenom,
                Users.Email AS email,
                u.Nom AS piloteNom,
                u.Prenom AS pilotePrenom,
                c.Centre AS centre,
                p.Promotion AS promotion,
                s.Specialite AS specialite
            FROM Users
            INNER JOIN Users u
                ON Users.Id_Pilote = u.Id_Users
            INNER JOIN Centre c
                ON Users.Id_Centre = c.Id_Centre
            INNER JOIN Promotion p
                ON Users.Id_Promotion = p.Id_Promotion
            INNER JOIN Specialite s
                ON Users.Id_Specialite = s.Id_Specialite
            INNER JOIN Droit d
                ON Users.Id_Users = d.Id_Users
            WHERE d.Id_Statut = 4 ".$whr;

        $query = $this->db->prepare($req);

        if (!empty($_POST['nom'])) {
            $query->bindParam(':nom', $_POST['nom']);
        }
        if (!empty($_POST['prenom'])) {
            $query->bindParam(':prenom', $_POST['prenom']);
        }
        if (!empty($_POST['pilote'])) {
            $query->bindParam(':pilote', $_POST['pilote']);
        }
        if (!empty($_POST['promotion'])) {
            $query->bindParam(':promotion', $_POST['promotion']);
        }
        if (!empty($_POST['specialite'])) {
            $query->bindParam(':specialite', $_POST['specialite']);
        }
        if (!empty($_POST['centre'])) {
            $query->bindParam(':centre', $_POST['centre']);
        }

        $query->execute();

        return $query;
    }


    // public function getPilote() {
    //     $this->getConnexion();
    //
    //     $req = "SELECT Users.Id_Users AS id, Users.Nom AS nom, Users.Prenom AS prenom FROM Users INNER JOIN Droit ON Users.Id_Users = Droit.Id_Users WHERE Droit.Id_Statut = 2";
    //
    //     $query = $this->db->prepare($req);
    //
    //     $query->execute();
    //
    //     return $query;
    // }


    // public function getPromotion() {
    //     $this->getConnexion();
    //
    //     $req = "SELECT Id_Promotion AS id, Promotion AS promotion FROM Promotion";
    //
    //     $query = $this->db->prepare($req);
    //
    //     $query->execute();
    //
    //     return $query;
    // }


    // public function getSpecialite() {
    //     $this->getConnexion();
    //
    //     $req = "SELECT Id_Specialite AS id, Specialite AS specialite FROM Specialite";
    //
    //     $query = $this->db->prepare($req);
    //
    //     $query->execute();
    //
    //     return $query;
    // }


    // public function getCentre() {
    //     $this->getConnexion();
    //
    //     $req = "SELECT Id_Centre AS id, Centre AS centre FROM Centre ORDER BY Centre";
    //
    //     $query = $this->db->prepare($req);
    //
    //     $query->execute();
    //
    //     return $query;
    // }
}
