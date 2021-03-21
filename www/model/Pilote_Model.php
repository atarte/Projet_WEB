<?php

Class Pilote_Model extends Model {
    public function __construct() {
        // verification que l'utilisateur à bien le droit d'accédé à cette page

        if (($_SESSION['role'] == "3" && $_SESSION['deleg']['pilote'] != "1") || ($_SESSION['role'] == "2") || ($_SESSION['role'] == "4")) {
            header("location: /");
        }
    }


    // public function getCentre() {
    //
    //     $this->getConnexion();
    //
    //     $req = "SELECT Id_Centre, Centre FROM Centre ORDER BY Centre";
    //
    //     $query = $this->db->prepare($req);
    //
    //     $query->execute();
    //
    //     return $query;
    // }


    public function displayPilote(int $p) {

        $req = "CALL Affichage_Pilote(:p)";

        $query = $this->db->prepare($req);

        $query->bindParam(':p', $p);

        $query->execute();

        return $query;
    }


    public function addPilote() {

        $this->getConnexion();

        $req = "SELECT Email From Users WHERE Email = :email ;";

        $query = $this->db->prepare($req);

        $query->bindParam(':email', $_POST['email']);

        $query->execute();

        $count = $query->rowCount();
        $row = $query->fetch();

        if ($count == 1 && !empty($row)) {
            return 1;
        }
        else {
            $req  = "CALL Creation_Pilote(:nom, :prenom, :email, :pwd, :centre)";

            $query = $this->db->prepare($req);

            $query->bindParam(':nom', $_POST['nom']);
            $query->bindParam(':prenom', $_POST['prenom']);
            $query->bindParam(':email', $_POST['email']);
            $query->bindParam(':pwd', $_POST['pwd']);
            $query->bindParam(':centre', $_POST['centre']);

            $query->execute();
        }
    }


    public function deletePilote(int $id) {

        $this->getConnexion();

        $req = "CALL Suppression_Pilote(:id)";

        $query = $this->db->prepare($req);

        $query->bindParam(':id', $id);

        $query->execute();

        header("Location: /Pilote");
    }


    public function updatePilote(int $id) {

        $this->getConnexion();

        $req = "SELECT Id_Users AS id FROM Users WHERE Email = :email";

        $query = $this->db->prepare($req);

        $email = strtolower($_POST['email']);
        $query->bindParam(':email', $email);

        $query->execute();

        $row = $query->fetch();
        $count = $query->rowCount();

        if ($count == 0 || $row['id'] == strval($id)) {

            $_POST['centre'] = intval($_POST['centre']);

            $nom = strtolower($_POST['nom']);
            $prenom = strtolower($_POST['prenom']);

            $req = "CALL Modification_Pilote(:id, :nom, :prenom, :email, :centre)";

            $query = $this->db->prepare($req);

            $query->bindParam(':id', $id);
            $query->bindParam(':nom', $nom);
            $query->bindParam(':prenom', $prenom);
            $query->bindParam(':email', $email);
            $query->bindParam(':centre', $_POST['centre']);

            $query->execute();

            header("Location: /Pilote");
        }
        else {
            return 1;
        }
    }
}
