<?php

class Candidature extends Controler {
    public $candidature;
    public $wish;


    public function __construct() {
        session_start();

        $this->loadModel("Candidature_Model");

        $this->wish = $this->Candidature_Model->getWishlist();
    }


    public function index() {
        $this->affichage();
    }


    public function affichage() {
        $this->candidature = $this->Candidature_Model->displayCandidature();

        require_once(ROOT.'view/Candidature_View.php');
    }
}
