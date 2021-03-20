<?php

class Etudiant extends Controler {
    public $etudiant;
    public $pilote;
    public $promotion;
    public $specialite;
    // public $err;


    public function __construct() {
        session_start();
        $this->loadModel("Etudiant_Model");

        $this->pilote = $this->Etudiant_Model->getPilote();
        $this->promotion = $this->Etudiant_Model->getPromotion();
        $this->specialite = $this->Etudiant_Model->getSpecialite();
    }


    public function index() {
        $this->page();
        // require_once(ROOT.'view/Etudiant_View.php');
    }


    public function affichage() {
        
    }


    public function page(int $p = 1) {
        $pageLimit = 10 * ($p -1);

        $this->etudiant = $this->Etudiant_Model->getEtudiant($pageLimit);

        require_once(ROOT.'view/Etudiant_View.php');
    }


    public function creation() {
        $this->err = $this->Etudiant_Model->addEtudiant();

        $p = 1;
        $pageLimit = 10 * ($p -1);

        $this->etudiant = $this->Etudiant_Model->getEtudiant($pageLimit);

        // $this->page();

        require_once(ROOT.'view/Etudiant_View.php');
    }


    public function modification(int $id) {
        $p = 1;
        $pageLimit = 10 * ($p -1);

        $etudiant = $this->Etudiant_Model->getEtudiant($pageLimit);

        require_once(ROOT.'view/Etudiant_View.php');
    }


    public function suppression() {

    }
}
