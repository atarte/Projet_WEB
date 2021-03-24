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
}
