<?php

Class Entreprise_Model extends Model {
    public function __construct() {
        // verification que l'utilisateur à bien le droit d'accédé à cette page

        if (($_SESSION['role'] == "3" && $_SESSION['deleg']['entreprise'] != "1")) {
            header("location: /");
        }
    }


    public function getSecteur() {

        $this->getConnexion();

        $req = "SELECT Id_Secteur AS id, Secteur AS secteur FROM Secteur ORDER BY Secteur;";

        $query = $this->db->prepare($req);

        $query->execute();

        return $query;
    }

    public function getVille() {

        $this->getConnexion();

        $req = "SELECT Id_Ville AS id, Ville AS ville FROM Ville ORDER BY Ville;";

        $query = $this->db->prepare($req);

        $query->execute();

        return $query;
    }


    public function getNomEntreprise() {

        $this->getConnexion();

        $req = "SELECT Id_Entreprise AS id, Nom AS nom FROM Entreprise ORDER BY Nom;";

        $query = $this->db->prepare($req);

        $query->execute();

        return $query;
    }


    public function getRegion() {

        $this->getConnexion();

        $req = "SELECT Id_Region AS id, Region AS region FROM Region ORDER BY Region;";

        $query = $this->db->prepare($req);

        $query->execute();

        return $query;
    }


    public function getConfiance() {
        $this->getConnexion();

        $req = "SELECT Id_Entreprise AS id_ent, Id_Users AS id_user FROM Confiance";

        $query = $this->db->prepare($req);

        $query->execute();

        return $query;
    }


    public function getNote() {
        $this->getConnexion();

        $req = "SELECT Id_Entreprise AS id_entreprise, Note AS note
        FROM Note WHERE Id_Users = :id";

        $query = $this->db->prepare($req);

        $query->bindParam(':id', $_SESSION['id']);

        $query->execute();

        return $query;
    }


    public function getMoyenne() {
        $this->getConnexion();

        $req = "SELECT Id_Entreprise AS id_entreprise, ROUND(AVG(Note)) AS note
        FROM Note GROUP BY Id_Entreprise";

        $query = $this->db->prepare($req);

        $query->execute();

        return $query;
    }



    public function displayEntreprise(int $p) {

        $this->getConnexion();

        $req = "CALL Affichage_Entreprise(:p)";

        $query = $this->db->prepare($req);

        $query->bindParam(':p', $p);

        $query->execute();

        return $query;
    }


    public function addEntreprise() {

        $this->getConnexion();

        $req = "SELECT Email From Entreprise WHERE Email = :email";

        $query = $this->db->prepare($req);

        $query->bindParam(':email', $_POST['email']);

        $query->execute();

        $count = $query->rowCount();
        $row = $query->fetch();

        if ($count == 1 && !empty($row)) {
            return 1;
        }
        else {
            $req = "SELECT Ville From Ville WHERE Ville = :ville";

            $query = $this->db->prepare($req);

            $query->bindParam(':ville', $_POST['ville']);

            $query->execute();

            $count = $query->rowCount();
            $row = $query->fetch();

            if($count == 1 && !empty($row)){
                $req  = "CALL Creation_EntrepriseEx(:nom, :email, :nb_accepter, :id_secteur, :ville, :adresse)";

                $query = $this->db->prepare($req);

                $query->bindParam(':nom', $_POST['nom']);
                $query->bindParam(':email', $_POST['email']);
                $query->bindParam(':nb_accepter', $_POST['nombre_accepter']);
                $query->bindParam(':adresse', $_POST['adresse']);
                $query->bindParam(':ville', $_POST['ville']);
                $query->bindParam(':id_secteur', $_POST['secteur']);

                $query->execute();
            }
            else {
                $req  = "CALL Creation_EntrepriseInex(:nom, :email, :nb_accepter, :id_secteur, :ville, :cp, :region, :adresse)";

                $query = $this->db->prepare($req);

                $query->bindParam(':nom', $_POST['nom']);
                $query->bindParam(':email', $_POST['email']);
                $query->bindParam(':nb_accepter', $_POST['nombre_accepter']);
                $query->bindParam(':adresse', $_POST['adresse']);
                $query->bindParam(':cp', $_POST['code_p']);
                $query->bindParam(':ville', $_POST['ville']);
                $query->bindParam(':id_secteur', $_POST['secteur']);
                $query->bindParam(':region', $_POST['region']);

                $query->execute();
            }
        }
        header("Location: /Entreprise");
    }


    public function deleteEntreprise(int $id) {

        $this->getConnexion();

        $req = "CALL Suppression_Entreprise(:id)";

        $query = $this->db->prepare($req);

        $query->bindParam(':id', $id);

        $query->execute();

        header("Location: /Entreprise");
    }


    public function updateEntreprise(int $id) {

        $this->getConnexion();

        $req = "SELECT Id_Entreprise AS id FROM Entreprise WHERE Email = :email";

        $query = $this->db->prepare($req);

        $email = strtolower($_POST['email']);
        $query->bindParam(':email', $email);

        $query->execute();

        $row = $query->fetch();
        $count = $query->rowCount();

        if ($count == 0 || $row['id'] == strval($id)) {

            $_POST['nombre_accepter'] = intval($_POST['nombre_accepter']);
			$_POST['secteur'] = intval($_POST['secteur']);



            $req = "CALL Modification_Entreprise(:id, :nom, :email, :adresse, :cp, :ville, :region, :nb_stagiaire, :secteur)";

            $query = $this->db->prepare($req);

            $query->bindParam(':id', $id);
            $query->bindParam(':nom', $_POST['nom']);
            $query->bindParam(':email', $email);
            $query->bindParam(':nb_stagiaire', $_POST['nombre_accepter']);
            $query->bindParam(':adresse', $_POST['adresse']);
			$query->bindParam(':cp', $_POST['code_p']);
			$query->bindParam(':ville', $_POST['ville']);
			$query->bindParam(':region', $_POST['region']);
			$query->bindParam(':secteur', $_POST['secteur']);

            $query->execute();

            header("Location: /Entreprise");
        }
        else {
            return 1;
        }
    }


    public function search() {
        $this->getConnexion();

        $whr = "";

        if (!empty($_POST['entreprise'])) {
            $whr = $whr."AND e.Id_Entreprise = :nom ";
        }
		if (!empty($_POST['ville'])) {
            $whr = $whr."AND z.Id_Ville = :ville ";
        }
		if (!empty($_POST['region'])) {
            $whr = $whr."AND z.Region = :region ";
        }
		if (!empty($_POST['secteur'])) {
            $whr = $whr."AND s.Secteur = :secteur ";
        }

        $whr = substr($whr,4);

        $req ="SELECT
                e.Id_Entreprise AS id,
                e.Nom AS nom,
                e.Email AS email,
                e.Nombre_Accepter AS nombre,
                s.Secteur AS secteur,
                z.Id_Adresse AS id_ad,
                z.Adresse AS adresse,
                z.Id_Ville AS id_vil,
                z.Ville AS ville,
                z.Code_Postal AS code_p,
                z.Id_Region AS id_reg,
                z.Region AS region,
                z.Id_Pays AS id_pa,
                z.Pays AS pays
            FROM Reside
            INNER JOIN Entreprise e
            ON Reside.Id_Entreprise = e.Id_Entreprise
            INNER JOIN (
                SELECT
                    Adresse.Id_Adresse,
                    Adresse.Adresse,
                    v.Id_Ville,
                    v.Ville,
                    v.Code_Postal,
                    v.Id_Region,
                    v.Region,
                    v.Id_Pays,
                    v.Pays
                FROM (
                    SELECT
                        Ville.Id_Ville,
                        Ville.Ville,
                        Ville.Code_Postal,
                        r.Id_Region,
                        r.Region,
                        r.ID_Pays,
                        r.Pays
                    FROM (
                        SELECT
                            Region.Id_region,
                            Region.Region,
                            p.Id_Pays,
                            p.Pays
                        FROM Pays p
                        INNER JOIN Region
                        ON p.Id_Pays = Region.Id_Pays
                    ) r
                    INNER JOIN Ville
                    ON r.Id_Region = Ville.Id_Region
                ) v
                INNER JOIN Adresse
                ON v.Id_ville = Adresse.Id_Ville
            ) z
            ON Reside.Id_Adresse = z.Id_Adresse
            INNER JOIN Secteur s
            ON e.Id_Secteur = s.Id_Secteur
            WHERE ".$whr;

        $query = $this->db->prepare($req);

        if (!empty($_POST['entreprise'])) {
            $query->bindParam(':nom', $_POST['entreprise']);
        }
        if (!empty($_POST['ville'])) {
            $query->bindParam(':ville', $_POST['ville']);
        }
        if (!empty($_POST['region'])) {
            $query->bindParam(':region', $_POST['region']);
        }
        if (!empty($_POST['secteur'])) {
            $query->bindParam(':secteur', $_POST['secteur']);
        }

        $query->execute();

        return $query;
    }


    public function faireConfiance(int $id) {
        $this->getConnexion();

        $req = "SELECT * FROM Confiance WHERE Id_Entreprise = :id_ent AND Id_Users = :id_user;";

        $query = $this->db->prepare($req);

        $query->bindParam(':id_ent', $id);
        $query->bindParam(':id_user', $_SESSION['id']);

        $query->execute();

        $count = $query->rowCount();

        if ($count == 0) {

            $req = "CALL Faire_Confiance(:id_ent, :id_user)";
        }
        else {
            $req = "DELETE FROM Confiance WHERE Id_Entreprise = :id_ent AND Id_Users = :id_user;";
        }

        $query = $this->db->prepare($req);

        $query->bindParam(':id_ent', $id);
        $query->bindParam(':id_user', $_SESSION['id']);

        $query->execute();

        header("Location: /Entreprise");
    }


    public function noter(int $id, int $note) {
        $this->getConnexion();

        $req = "SELECT * FROM note WHERE Id_Entreprise = :id_ent AND Id_Users = :id_user;";

        $query = $this->db->prepare($req);

        $query->bindParam(':id_ent', $id);
        $query->bindParam(':id_user', $_SESSION['id']);

        $query->execute();

        $count = $query->rowCount();

        if ($count == 0) {

            $req = "INSERT INTO Note (Id_Entreprise, Id_Users, Note) VALUES
            (:id_ent, ;id_users, :note)";
        }
        else {
            $req = "UPDATE Note SET Note = :note WHERE Id_Entreprise = :id_ent
            AND Id_Users = id_users;";
        }

        $query->bindParam(':id_ent', $id);
        $query->bindParam(':id_user', $_SESSION['id']);
        $query->bindParam(':note', $note);

        $query->execute();

        header("Location: /Entreprise");

    }

}
