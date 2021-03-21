<?php

class Pilote extends Controler {
    public $pilote;
    public $centre;

    public $err;
    public $p;


    public function __construct() {
        session_start();
        $this->loadModel("Pilote_Model");

        $this->p = 1;

        $this->centre = $this->Pilote_Model->getCentre();
    }


    public function index() {
        $this->affichage();
    }


    public function affichage() {
        $pageLimit = 10 * ($this->p -1);

        $this->pilote = $this->Pilote_Model->displayPilote($pageLimit);

        require_once(ROOT.'view/Pilote_View.php');

    }


    public function page(int $page = 1) {
        $this->p = $page;

        $this->affichage();
    }


    public function creation() {
        $this->err = $this->Pilote_Model->addPilote();

        $this->affichage();
    }


    public function suppression(int $id) {
        $this->err = $this->Pilote_Model->deletePilote($id);

        $this->affichage();
    }


    public function modification(int $id) {
        $this->err = $this->Pilote_Model->updatePilote($id);

        $this->affichage();
    }


    public function recherche() {
        $this->pilote = $this->Pilote_Model->search();

        $this->p = 0;

        require_once(ROOT.'view/Pilote_View.php');
    }
}
