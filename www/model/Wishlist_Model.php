<?php

Class Wishlist_Model extends Model {

    public function __construct() {
        // verification que l'utilisateur à bien le droit d'accédé à cette page

        // if (($_SESSION['role'] == "3" && $_SESSION['deleg']['offre'] != "1")) {
        //     session_unset();
        //     header("location: /");
        // }
    }

    public function displayOffre() {
        $req = "CALL Affichage_Wishlist(:id)";

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

        header('location: /Offre');


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

        header('location: /Offre');
    }


    public function addPost(int $id) {
        $req = "SELECT Candidature.Id_Stage AS id_stage, Candidature.Id_Users AS id_user FROM Candidature WHERE Candidature.Id_Users = :id AND Candidature.Id_Stage = :id_stage";

        $query = $this->db->prepare($req);

        $query->bindParam(':id', $_SESSION['id']);
        $query->bindParam(':id_stage', $id);

        $query->execute();

        $count = $query->rowCount();


        if ($count == 0) {

            $req = "CALL Creation_Postulation(:id_user, :id_stage)";
        }
        else {
            $req = "UPDATE Candidature SET
                Candidature.Postulation = Date(NOW()),
                Candidature.Step = 1
            WHERE Candidature.Id_Users = :id_user AND Candidature.Id_Stage = :id_stage;";
        }

        $query = $this->db->prepare($req);

        echo $_SESSION["id"] . $id;

        $query->bindParam(':id_user', $_SESSION['id']);
        $query->bindParam(':id_stage', $id);

        $query->execute();

        header('location: /Offre');
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

        header('location: /Offre');
    }

}
