<?php

Class Candidature_Model extends Model {
    public function __construct() {
        // Vérification des droits d'accés

        if (!isset($_SESSION['role']) || $_SESSION['role'] == 1 || $_SESSION['role'] == 3) {
            session_unset();
            header("location: /");
        }
    }

    public function getAssit() {
        $this->getConnexion();

        $req = 'SELECT c.Centre AS centre,
        c.Assist_Nom AS nom,
        c.Assist_Prenom AS prenom,
        c.Assist_Mail AS email
        FROM Users
        INNER JOIN Centre c
        ON Users.Id_Centre = c.Id_Centre
        WHERE Users.Id_Users = :id;';

        $query = $this->db->prepare($req);

        $query->bindParam(':id',$_SESSION['id']);

        $query->execute();

        return $query;
    }


    public function getPilotePerso() {
        $this->getConnexion();

        $req = "
            SELECT
                u.Nom AS nom,
                u.Prenom AS prenom,
                u.Email AS email
            FROM Users
            INNER JOIN Users u
                ON Users.Id_Pilote = u.Id_Users
            WHERE Users.Id_Users = :id";

        $query = $this->db->prepare($req);

        $query->bindParam(':id', $_SESSION['id']);

        $query->execute();

        return $query;
    }


    public function displayCandidature() {
        $this->getConnexion();

        $req = "CALL Affichage_Candidature(:id)";

        $query = $this->db->prepare($req);

        $query->bindParam(':id', $_SESSION['id']);

        $query->execute();

        return $query;
    }


    public function addWish(int $id) {

        $req = "SELECT Candidature.Id_Stage AS id_stage, Candidature.Id_Users AS id_user FROM Candidature WHERE Candidature.Id_Users = :id AND Candidature.Id_Stage = :id_stage ";

        $query = $this->db->prepare($req);

        $query->bindParam(':id', $_SESSION['id']);
        $query->bindParam(':id_stage', $id);

        $query->execute();

        $count = $query->rowCount();

        if ($count == 0) {

            $req = "CALL Creation_Wishlist(:id_user, :id_stage)";
        }
        else {
            $req = "UPDATE Candidature SET
                Candidature.Souhait = Date(NOW())
            WHERE Candidature.Id_Users = :id_user AND Candidature.Id_Stage = :id_stage;";
        }

        $query = $this->db->prepare($req);

        $query->bindParam(':id_user', $_SESSION['id']);
        $query->bindParam(':id_stage', $id);

        $query->execute();

        header('location: /Candidature');


    }


    public function deleteWish(int $id) {
        $req = "SELECT Candidature.Id_Stage AS id_stage, Candidature.Id_Users AS id_user FROM Candidature WHERE Candidature.Id_Users = :id AND Candidature.Id_Stage = :id_stage AND (Candidature.Postulation IS NOT NULL)";

        $query = $this->db->prepare($req);

        $query->bindParam(':id', $_SESSION['id']);
        $query->bindParam(':id_stage', $id);

        $query->execute();

        $count = $query->rowCount();

        if ($count == 0) {
            $req = "CALL Delete_Candidature(:id_user, :id_stage)";
        }
        else {
            $req = 'UPDATE Candidature SET
            Candidature.Souhait = NULL
            WHERE Candidature.Id_Users = :id_user AND Candidature.Id_Stage = :id_stage;';
        }

        $query = $this->db->prepare($req);

        $query->bindParam(':id_user', $_SESSION['id']);
        $query->bindParam(':id_stage', $id);

        $query->execute();

        header('location: /Candidature');
    }


    public function deletePost(int $id) {
        $req = "SELECT Candidature.Id_Stage AS id_stage, Candidature.Id_Users AS id_user FROM Candidature WHERE Candidature.Id_Users = :id AND Candidature.Id_Stage = :id_stage AND (Candidature.Souhait IS NOT NULL)";

        $query = $this->db->prepare($req);

        $query->bindParam(':id', $_SESSION['id']);
        $query->bindParam(':id_stage', $id);

        $query->execute();

        $count = $query->rowCount();

        if ($count == 0) {
            $req = "CALL Delete_Candidature(:id_user, :id_stage)";
        }
        else {
            $req = 'UPDATE Candidature SET
            Candidature.Postulation = NULL,
            Candidature.Step = NULL
            WHERE Candidature.Id_Users = :id_user AND Candidature.Id_Stage = :id_stage;';
        }

        $query = $this->db->prepare($req);

        $query->bindParam(':id_user', $_SESSION['id']);
        $query->bindParam(':id_stage', $id);

        $query->execute();

        header('location: /Candidature');
    }

    public function donneePilote() {

        $this->getConnexion();

        $req = "CALL Donnee_Pilote(:id_user)";

        $query = $this->db->prepare($req);

        $query->bindParam(':id_user', $_SESSION['id']);

        $query->execute();

        return $query;

    }


    public function updatestep2A(int $id) {
        $this->getConnexion();

        $req = 'UPDATE Candidature SET
        Candidature.Step = 2
        WHERE Id_candidature = :id;';

        $query = $this->db->prepare($req);

        $query->bindParam(':id', $id);

        $query->execute();

        header('location: /Candidature');
    }


    public function updatestep2R(int $id) {
        $this->getConnexion();

        $req = 'UPDATE Candidature SET
        Candidature.Step = 8
        WHERE Id_candidature = :id;';

        $query = $this->db->prepare($req);

        $query->bindParam(':id', $id);

        $query->execute();

        header('location: /Candidature');
    }

    public function updatestep3(int $id) {
        $this->getConnexion();

        $req = 'UPDATE Candidature SET
        Candidature.Step = 3
        WHERE Id_candidature = :id;';

        $query = $this->db->prepare($req);

        $query->bindParam(':id', $id);

        $query->execute();

        header('location: /Candidature');
    }


    public function updatestep4(int $id) {
        $this->getConnexion();

        $req = 'UPDATE Candidature SET
        Candidature.Step = 4
        WHERE Id_candidature = :id;';

        $query = $this->db->prepare($req);

        $query->bindParam(':id', $id);

        $query->execute();

        header('location: /Candidature');
    }


    public function updatestep5(int $id) {
        $this->getConnexion();

        $req = 'UPDATE Candidature SET
        Candidature.Step = 5
        WHERE Id_candidature = :id;';

        $query = $this->db->prepare($req);

        $query->bindParam(':id', $id);

        $query->execute();

        header('location: /Candidature');
    }

    public function updatestep6(int $id) {
        $this->getConnexion();

        $req = 'UPDATE Candidature SET
        Candidature.Step = 6
        WHERE Id_candidature = :id;';

        $query = $this->db->prepare($req);

        $query->bindParam(':id', $id);

        $query->execute();



        // faire l'autre requète
        $req2 = 'CALL Update_Step6(:id)';

        $query2 = $this->db->prepare($req);

        $query2->bindParam(':id', $id);

        $query2->execute();


        header('location: /Candidature');
    }
}
