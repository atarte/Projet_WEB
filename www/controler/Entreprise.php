<?php

class Entreprise extends Controler {
    public $nom;
    public $email; 
    public $adresse;
    public $codePostal;
    public $ville;
    public $region;
    public $stagiaire;
    public $secteur;

    public $err;
    public $p;


    public function __construct() {
        session_start();
        $this->loadModel("Entreprise_Model");

        $this->p = 1;

        $this->nom = $this->Entreprise_Model->getNom();
        $this->adresse = $this->Entreprise_Model->getAdresse();
        $this->ville = $this->Entreprise_Model->getVille();
        $this->region= $this->Entreprise_Model->getRegion();
        $this->stagiaire= $this->Entreprise_Model->getStagiaire();
        $this->secteur = $this->Entreprise_Model->getSecteur();
        
    }


    public function index() {
        $this->affichage();
    }


    public function affichage() {
        $pageLimit = 10 * ($this->p -1);

        $this->entreprise = $this->Entreprise_Model->displayEntreprise($pageLimit);

        require_once(ROOT.'view/Entreprise_View.php');

    }


    public function page(int $page = 1) {
        $this->p = $page;

        $this->affichage();
    }


    public function creation() {
        $this->err = $this->Entreprise_Model->addEntreprise();

        $this->affichage();
    }


    public function suppression(int $id) {
        $this->err = $this->Entreprise_Model->deleteEntreprise($id);

        $this->affichage();
    }


    public function modification(int $id) {
        $this->err = $this->Entreprise_Model->updateEntreprise($id);

        $this->affichage();
    }


    public function recherche() {
        $this->entreprise = $this->Entreprise_Model->search();

        $this->p = 0;

        require_once(ROOT.'view/Entreprise_View.php');
    }
}
