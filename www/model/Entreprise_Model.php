<?php

Class Entreprise_Model extends Model {
    public function __construct() {
        // verification que l'utilisateur à bien le droit d'accédé à cette page

        if (($_SESSION['role'] == "3" && $_SESSION['deleg']['entreprise'] != "1") || ($_SESSION['role'] == "2") || ($_SESSION['role'] == "4")) {
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



    public function displayEntreprise(int $p) {

        $this->getConnexion();

        $req = "CALL Affichage_Entreprise(:p)";

        $query = $this->db->prepare($req);

        $query->bindParam(':p', $p);

        $query->execute();

        return $query;
    }


    public function displayAdresse() {

        $this->getConnexion();

        $req = "CALL Affichage_AdresseEntreprise();";

        $query = $this->db->prepare($req);

        $query->execute();

        return $query;
    }


    public function addEntreprise() {

        $this->getConnexion();

        $req = "SELECT Email From Entreprise WHERE Email = :email";
        $req2 = "SELECT Ville From Ville WHERE Ville = :ville";

        $query = $this->db->prepare($req);
        $query2 = $this->db->prepare($req2);

        $query->bindParam(':email', $_POST['email']);
        $query2->bindParam(':ville', $_POST['ville']);

        $query->execute();
        $query2->execute();

        $count = $query->rowCount();
        $row = $query->fetch();

        $count2 = $query2->rowCount();
        $row2 = $query2->fetch();

        if ($count == 1 && !empty($row)) {
            return 1;
        }
        else if($count2 == 1 && !empty($row)){
            $req  = "CALL Creation_EntrepriseEx(:nom, :email, :nb_accepter, :id_secteur, :ville, :cp, :adresse)";

            $query = $this->db->prepare($req);

            $query->bindParam(':nom', $_POST['nom']);
            $query->bindParam(':email', $_POST['email']);
            $query->bindParam(':nb_accepter', $_POST['nombre_accepter']);
            $query->bindParam(':adresse', $_POST['adresse']);
            $query->bindParam(':cp', $_POST['code_p']);
			$query->bindParam(':ville', $_POST['ville']);
			$query->bindParam(':id_secteur', $_POST['secteur']);

            $query->execute();
        }
        elseif ($count2 == 0 && empty($row)) {
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

        $req = "SELECT Id_Users AS id FROM Users WHERE Email = :email";

        $query = $this->db->prepare($req);

        $email = strtolower($_POST['email']);
        $query->bindParam(':email', $email);

        $query->execute();

        $row = $query->fetch();
        $count = $query->rowCount();

        if ($count == 0 || $row['id'] == strval($id)) {

            $_POST['nombre_accepter'] = intval($_POST['nombre_accepter']);
			$_POST['secteur'] = intval($_POST['secteur']);



            $req = "CALL Modification_Entreprise(:id, :nom, :email, :nombre_accepter, :adresse, :codePostal, :ville, :region, :pays, :secteur)";

            $query = $this->db->prepare($req);

            $query->bindParam(':id', $id);
            $query->bindParam(':nom', $nom);
            $query->bindParam(':email', $email);
            $query->bindParam(':nombre_accepter', $_POST['nombre_accepter']);
            $query->bindParam(':adresse', $adresse);
			$query->bindParam(':codePostal', $codePostal);
			$query->bindParam(':ville', $ville);
			$query->bindParam(':region', $region);
			$query->bindParam(':pays', $pays);
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

        if (!empty($_POST['nom'])) {
            $whr = $whr."AND Entreprise.Nom = :nom ";
        }

		if (!empty($_POST['ville'])) {
            $whr = $whr."AND Ville.Ville = :ville ";
        }
		if (!empty($_POST['region'])) {
            $whr = $whr."AND Region.Region = :region ";
        }
		if (!empty($_POST['secteur'])) {
            $whr = $whr."AND Secteur.Secteur = :secteur ";
        }



        $req =
            "SELECT Ville.Ville as ville,
            Region.Region as region,
            TEntreprise.Tnom AS nom,
            TEntreprise.Tsecteur AS secteur
            FROM Ville
            INNER JOIN Region ON Region.Id_Region=Ville.Id_Region
            INNER JOIN (SELECT Entreprise.Nom AS Tnom,
                        Secteur.Secteur AS Tsecteur,
                        Reside.Id_Adresse as Tadresse
                        FROM Entreprise
                        INNER JOIN Reside ON Reside.Id_Entreprise = Entreprise.Id_Entreprise
                        INNER JOIN Secteur ON Secteur.Id_Secteur = Entreprise.Id_Secteur)
           AS TEntreprise
           ON TEntreprise.Tadresse = Ville.Id_Ville ".$whr;

        $query = $this->db->prepare($req);

        if (!empty($_POST['nom'])) {
            $query->bindParam(':nom', $_POST['nom']);
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

}
