<?php

Class Offre_Model extends Model {

    public function __construct() {
        // verification que l'utilisateur à bien le droit d'accédé à cette page

        if (($_SESSION['role'] == "3" && $_SESSION['deleg']['offre'] != "1")) {
            session_unset();
            header("location: /");
        }
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


    public function getCompetence() {

        $this->getConnexion();

        $req = "SELECT DISTINCT Id_Competence AS id, Competence AS competence FROM Competence ORDER BY Competence;";

        $query = $this->db->prepare($req);

        $query->execute();

        return $query;
    }


    public function getDurer() {

        $this->getConnexion();

        $req = "SELECT DISTINCT Stage.Durer_Stage AS durer FROM Stage ORDER BY Stage.Durer_Stage;";

        $query = $this->db->prepare($req);

        $query->execute();

        return $query;
    }


    public function getWishlist() {

        $this->getConnexion();

        $req = "SELECT Candidature.Id_Stage AS id_stage, Candidature.Id_Users AS id_user, Candidature.Souhait AS souhait FROM Candidature WHERE Candidature.Id_Users = :id";

        $query = $this->db->prepare($req);

        $query->bindParam(':id', $_SESSION['id']);

        $query->execute();

        return $query;

    }


    public function getPostulation() {

        $this->getConnexion();

        $req = "SELECT Candidature.Id_Stage AS id_stage, Candidature.Id_Users AS id_user, Candidature.Postulation AS postulation FROM Candidature WHERE Candidature.Id_Users = :id";

        $query = $this->db->prepare($req);

        $query->bindParam(':id', $_SESSION['id']);

        $query->execute();

        return $query;

    }


    public function displayOffre(int $p) {
        $req = "CALL Affichage_Offre(:p)";

        $query = $this->db->prepare($req);

        $query->bindParam(':p', $p);

        $query->execute();

        return $query;
    }


    public function addOffre() {
        $this->getConnexion();

        $req = "SELECT Id_Stage FROM Stage WHERE Email = :email";

        $query = $this->db->prepare($req);

        $email = strtolower($_POST['email']);
        $query->bindParam(':email', $email);

        $query->execute();

        $count = $query->rowCount();

        if ($count == 0 ) {

            $_POST['specialite'] = intval($_POST['specialite']);
            $_POST['entreprise'] = intval($_POST['entreprise']);
            $_POST['ville'] = intval($_POST['ville']);

            $nom = strtolower($_POST['nom']);
            $competence = strtolower($_POST['competences']);

            $req = "CALL Creation_Offre(:nom, :durer, :remuneration, :date_offre, :nb_place, :email, :id_ent, :id_ville, :id_spe, :competence)";

            $query = $this->db->prepare($req);

            $query->bindParam(':nom', $nom);
            $query->bindParam(':durer', $_POST['duree']);
            $query->bindParam(':remuneration', $_POST['remuneration'] );
            $query->bindParam(':date_offre', $_POST['date']);
            $query->bindParam(':nb_place', $_POST['nb_place']);
            $query->bindParam(':email', $email);
            $query->bindParam('id_spe', $_POST['specialite']);
            $query->bindParam(':id_ent', $_POST['entreprise']);
            $query->bindParam(':id_ville', $_POST['ville']);
            $query->bindParam(':competence', $competence);

            $query->execute();

            header("Location: /Offre");
        }
        else {
            return 1;
        }
    }


    public function deleteOffre(int $id) {

        $this->getConnexion();

        $req = "CALL Suppression_Offre(:id)";

        $query = $this->db->prepare($req);

        $query->bindParam(':id', $id);

        $query->execute();

        header("Location: /Offre");
    }


    public function updateOffre(int $id) {
        $this->getConnexion();

        $req = "SELECT Id_Stage AS id FROM Stage WHERE Email = :email";

        $query = $this->db->prepare($req);

        $email = strtolower($_POST['email']);
        $query->bindParam(':email', $email);

        $query->execute();

        $row = $query->fetch();
        $count = $query->rowCount();

        if ($count == 0 || $row['id'] == strval($id)) {

            $_POST['specialite'] = intval($_POST['specialite']);
            $_POST['entreprise'] = intval($_POST['entreprise']);
            $_POST['ville'] = intval($_POST['ville']);

            $nom = strtolower($_POST['nom']);
            $competence = strtolower($_POST['competences']);

            $req = "CALL Modification_Offre(:nom, :durer, :remuneration, :date_offre, :nb_place, :email, :id_ent, :id_ville, :id_spe, :competence, :id)";

            $query = $this->db->prepare($req);

            $query->bindParam(':id', $id);
            $query->bindParam(':nom', $nom);
            $query->bindParam(':durer', $_POST['duree']);
            $query->bindParam(':remuneration', $_POST['remuneration'] );
            $query->bindParam(':date_offre', $_POST['date']);
            $query->bindParam(':nb_place', $_POST['nb_place']);
            $query->bindParam(':email', $email);
            $query->bindParam('id_spe', $_POST['specialite']);
            $query->bindParam(':id_ent', $_POST['entreprise']);
            $query->bindParam(':id_ville', $_POST['ville']);
            $query->bindParam(':competence', $competence);

            $query->execute();

            header("Location: /Offre");
        }
        else {
            return 1;
        }
    }


    public function search() {
        $this->getConnexion();

        $whr = "";

        if (!empty($_POST['entreprise'])) {
            $whr = $whr."AND Stage.Id_Entreprise = :entreprise ";
        }
        if (!empty($_POST['ville'])) {
            $whr = $whr."AND Stage.Id_Ville = :ville ";
        }
        if (!empty($_POST['competence'])) {
            $whr = $whr."AND comp.competence = :competence ";
        }
        if (!empty($_POST['durer'])) {
            $whr = $whr."AND Stage.Durer_Stage = :durer";
        }
        if (!empty($_POST['remuneration'])) {
            $whr = $whr."AND Stage.Remuneration >= :remuneration";
        }

        $req =
            "SELECT Stage.ID_Stage AS id,
               Stage.Nom AS nom,
               Stage.Durer_Stage AS stage,
               Stage.Remuneration AS remuneration,
               Stage.Date_Offre AS date_offre,
               Stage.Nombre_Place AS nb_place,
               Stage.Email AS email,
               s.Specialite AS specialite,
               e.Nom AS entreprise,
               v.Ville AS ville,
               comp.competence AS competence
            FROM Stage INNER JOIN
            (SELECT c.Competence AS competence, Id_Stage FROM Demande
            INNER JOIN Competence c ON Demande.Id_Competence = c.Id_Competence) AS comp ON 1=1
            INNER JOIN Specialite s ON Stage.Id_Specialite = s.Id_Specialite
            INNER JOIN Entreprise e ON Stage.Id_Entreprise = e.Id_Entreprise
            INNER JOIN Ville v ON Stage.Id_Ville = v.Id_Ville
            WHERE comp.Id_Stage = Stage.Id_Stage ".$whr;

        $query = $this->db->prepare($req);

        if (!empty($_POST['entreprise'])) {
            $query->bindParam(':entreprise', $_POST['entreprise']);
        }
        if (!empty($_POST['ville'])) {
            $query->bindParam(':ville', $_POST['ville']);
        }
        if (!empty($_POST['competence'])) {
            $query->bindParam(':competence', $_POST['competence']);
        }
        if (!empty($_POST['durer'])) {
            $query->bindParam(':durer', $_POST['durer']);
        }
        if (!empty($_POST['remuneration'])) {
            $query->bindParam(':remuneration', $_POST['remuneration']);
        }

        $query->execute();

        return $query;

    }


    public function addWish(int $id) {

        $req = "SELECT Candidature.Id_Stage AS id_stage, Candidature.Id_Users AS id_user FROM Candidature WHERE Candidature.Id_Users = :id AND Candidature.Id_Stage = :id_stage ";

        $query = $this->db->prepare($req);

        $query->bindParam(':id', $_SESSION['id']);
        $query->bindParam(':id_stage', $id);

        $query->execute();

        $row = $query->fetch();
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

        $row = $query->fetch();
        $count = $query->rowCount();

        if ($count == 0) {
            $req = "CALL Delete_Wishlist(:id_user, :id_stage)";
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

        // $row = $query->fetch();
        $count = $query->rowCount();

        // echo $count;

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

        $row = $query->fetch();
        $count = $query->rowCount();

        if ($count == 0) {
            $req = "CALL Delete_Postulation(:id_user, :id_stage)";
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
