<?php

// ceci est la class du model global, elle est abstraite pour qu'elle ne puisse etre utilisable que par l'héritage
abstract class Model {
    // Information de la base de donnée
    private $host = 'projetweb.cokj0wfmdhfw.eu-west-3.rds.amazonaws.com';
    private $dbname = 'GroupeCat_Test';
    private $port = '3315';
    private $login = 'admin';
    private $pwd = 'ProjetNulle';

    // Base de donné
    protected $db;


    public function getConnexion() {
        $this->db = null;

        try {
            $this->db = new PDO('mysql:host='. $this->host .';dbname='. $this->dbname .';port='.$this->port.'', $this->login, $this->pwd);
        }
        catch (PDOException $e) {
            echo "Erreur de Connexion : ". $e->getMessage();
            die();
        }
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

        $req = "SELECT Id_Promotion AS id, Promotion AS promotion FROM Promotion";

        $query = $this->db->prepare($req);

        $query->execute();

        return $query;
    }


    public function getSpecialite() {
        $this->getConnexion();

        $req = "SELECT Id_Specialite AS id, Specialite AS specialite FROM Specialite";

        $query = $this->db->prepare($req);

        $query->execute();

        return $query;
    }


    public function getCentre() {
        $this->getConnexion();

        $req = "SELECT Id_Centre AS id, Centre AS centre FROM Centre ORDER BY Centre";

        $query = $this->db->prepare($req);

        $query->execute();

        return $query;
    }
}
