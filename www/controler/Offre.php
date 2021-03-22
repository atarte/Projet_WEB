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
    }


    public function index() {
        $this->affichage();
    }


    public function affichage() {
        $pageLimit = 10 * ($this->p -1);

        $this->offre = $this->Offre_Model->displayOffre($pageLimit);
        // $this->competence = $this->Offre_Model->displayCompetence($pageLimit);

        $this->competence = $this->Offre_Model->reception;

        require_once(ROOT.'view/Offre_View.php');

    }
}
