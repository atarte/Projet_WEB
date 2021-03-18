<?php

// ceci est la class du model global, elle est abstraite pour qu'elle ne puisse etre utilisable que par l'héritage
abstract class Model {
    // Information de la base de donnée
    private $host = 'localhost';
    private $dbname = 'prosit_7';
    private $port = '3306';
    private $login = 'root';
    private $pwd = '';

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