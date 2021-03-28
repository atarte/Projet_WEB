<?php

class Entreprise extends Controler {
    public $entreprise;
    public $nom;
    public $ville;
    public $region;
    public $secteur;
    public $confiance;
    public $note;
    public $moyenne;


    public $close;
    public $err;
    public $p;


    public function __construct() {
        session_start();
        $this->loadModel("Entreprise_Model");

        $this->p = 1;

        $this->close = false;

        $this->secteur = $this->Entreprise_Model->getSecteur();
        $this->ville = $this->Entreprise_Model->getVille();
        $this->nom = $this->Entreprise_Model->getNomEntreprise();
        $this->region = $this->Entreprise_Model->getRegion();
        $this->confiance = $this->Entreprise_Model->getConfiance();
        $this->note = $this->Entreprise_Model->getNote();
        $this->moyenne = $this->Entreprise_Model->getMoyenne();

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
        $this->close = true;

        require_once(ROOT.'view/Entreprise_View.php');
    }


    public function confiance(int $id) {
        $this->Entreprise_Model->faireConfiance($id);
    }


    public function ajout_Note(int $id, int $note) {
        $this->Entreprise_Model->noter($id, $note);
    }
}
