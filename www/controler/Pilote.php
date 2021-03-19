<?php

class Pilote extends Controler {

  public function __construct() {
      session_start();
      $this->loadModel("Pilote_Model");
  }

    public function index() {

      $this->loadModel("Pilote_Model");

      $Centre = $this->Pilote_Model->getCentre();
      $Pilote = $this->Pilote_Model->getPilote();
      //$this->Pilote_Model->putPilote();

      require_once(ROOT.'/view/Pilote_View.php');

    }

    public function creation_pilote() {
      
    }
}
