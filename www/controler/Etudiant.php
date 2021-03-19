<?php

class Etudiant extends Controler {
    public function __construct() {
        session_start();
        $this->loadModel("Etudiant_Model");
    }


    public function index() {
        $this->page();
        // require_once(ROOT.'view/Etudiant_View.php');
    }


    public function page(int $p = 1) {
        // $this->loadModel("Etudiant_Model");

        $p = 10 * ($p -1);

        $etudiant = $this->Etudiant_Model->getEtudiant($p);

        $pilote = $this->Etudiant_Model->getPilote();
        $promotion = $this->Etudiant_Model->getPromotion();
        $specialite = $this->Etudiant_Model->getSpecialite();

        require_once(ROOT.'view/Etudiant_View.php');
    }
}
