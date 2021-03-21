<?php

class Delegue extends Controler {
    public $delegue;

    public $err;
    public $p;


    public function __construct() {
        session_start();
        $this->loadModel("Delegue_Model");

        $this->p = 1;
    }


    public function index() {
        $this->affichage();
    }


    public function affichage() {
        $pageLimit = 10 * ($this->p -1);

        $this->delegue = $this->Delegue_Model->displayDelegue($pageLimit);

        require_once(ROOT.'view/Delegue_View.php');
    }


    public function page(int $page) {
        $this->p = $page;

        $this->affichage();
    }


    public function recherche() {
        $this->delegue = $this->Delegue_Model->search();

        $this->p = 0;

        require_once(ROOT.'view/Delegue_View.php');
    }


    public function creation() {
        $this->err = $this->Delegue_Model->addDelegue();

        $this->affichage();
    }


    public function modification(int $id) {
        $this->err = $this->Delegue_Model->updateDelegue($id);

        $this->affichage();
    }


    public function suppression(int $id) {
        $this->err = $this->Delegue_Model->deleteDelegue($id);

        $this->affichage();
    }
}
