<?php

class Offre extends Controler {
    public $type_promo;
    public $ville;
    public $entreprise;
    public $offre;
    public $competence;

    public $err;
    public $p;

    public function __construct() {
        session_start();
        $this->loadModel("Offre_Model");

        $this->p = 1;

        $this->type_promo = $this->Offre_Model->getType();
        $this->ville = $this->Offre_Model->getVille();
        $this->entreprise = $this->Offre_Model->getEntreprise();
        $this->competence = $this->Offre_Model->getCompetence();
    }


    public function index() {
        $this->affichage();
    }


    public function affichage() {
        $pageLimit = 10 * ($this->p -1);

        $this->offre = $this->Offre_Model->displayOffre($pageLimit);

        $this->competence = $this->Offre_Model->reception;

        require_once(ROOT.'view/Offre_View.php');

    }


    public function creation() {
        $this->err = $this->Offre_Model->addOffre();

        $this->affichage();
    }


    public function suppression(int $id) {
        $this->err = $this->Offre_Model->deleteOffre($id);

        $this->affichage();
    }


    public function modification(int $id) {
        $this->err = $this->Offre_Model->updateOffre($id);

        $this->affichage();
    }


    public function recherche() {
        $this->offre = $this->Offre_Model->search();

        $this->p = 0;

        require_once(ROOT.'view/Offre_View.php');
    }
}
