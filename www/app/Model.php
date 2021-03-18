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

    // propiété contenant les information de requête
    public $tab;
    public $id;

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

    public function getAll() {
        $req = "SELECT * FROM ". $this->tab;
        $query = $this->db->prepare($req);
        $query->execute();
        return $query->fetchAll();
    }

    // public function getOne() {
    //     $req = "SELECT * FROM ". $this->tab ."WHERE ID_". $this->tab ."=". $this->id;
    //     $query = $this->db->prepare($req);
    //     $query->execute();
    //     return $query->fetch();
    // }
}
