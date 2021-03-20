<?php

class Etudiant extends Controler {
    public $etudiant;
    public $pilote;
    public $promotion;
    public $specialite;
    public $err;

    public $p;

    public function __construct() {
        session_start();
        $this->loadModel("Etudiant_Model");

        $this->p = 1;

        $this->pilote = $this->Etudiant_Model->getPilote();
        $this->promotion = $this->Etudiant_Model->getPromotion();
        $this->specialite = $this->Etudiant_Model->getSpecialite();
    }


    public function index() {
        $this->affichage();
    }


    public function affichage() {
        $pageLimit = 10 * ($this->p -1);

        $this->etudiant = $this->Etudiant_Model->getEtudiant($pageLimit);

        require_once(ROOT.'view/Etudiant_View.php');
    }


    public function page(int $page) {
        $this->p = $page;

        $this->affichage();
    }


    public function creation() {
        $this->err = $this->Etudiant_Model->addEtudiant();

        $this->affichage();
    }


    public function modification(int $id) {
        $this->err = $this->Etudiant_Model->updateEtudiant($id);

        $this->affichage();
    }


    public function suppression(int $id) {
        // $this->err = $this->Etudiant_Model->deleteEtudiant($id);
        //
        // $this->affichage();
    }
}
