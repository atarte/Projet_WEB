<?php

class Pilote extends Controler {
    public function __construct() {
        session_start();
        $this->loadModel("Pilote_Model");
    }


    public function index() {
        $this->page();
    }


    public function page(int $p = 1) {
        $pageLimit = 10 * ($p -1);

        $Centre = $this->Pilote_Model->getCentre();
        $Pilote = $this->Pilote_Model->getPilote($pageLimit);

        require_once(ROOT.'view/Pilote_View.php');
    }


    public function creation_pilote() {

        $p = 1;
        $pageLimit = 10 * ($p -1);

        $compte = $this->Pilote_Model->putPilote();

        $Centre = $this->Pilote_Model->getCentre();
        $Pilote = $this->Pilote_Model->getPilote($pageLimit);

        require_once(ROOT.'view/Pilote_View.php');
    }


    public function supprime_pilote() {
        $compte = $this->Pilote_Model->supPilote();

        $Centre = $this->Pilote_Model->getCentre();
        $Pilote = $this->Pilote_Model->getPilote($pageLimit);

        require_once(ROOT.'view/Pilote_View.php');
    }


    public function modification_pilote() {

        $p = 1;
        $pageLimit = 10 * ($p -1);

        $compte = $this->Pilote_Model->putPilote();

        $Centre = $this->Pilote_Model->getCentre();
        $Pilote = $this->Pilote_Model->getPilote($pageLimit);

        require_once(ROOT.'view/Pilote_View.php');
    }
}
