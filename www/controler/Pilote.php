<?php

class Pilote extends Controler {

  public function __construct() {
      session_start();
      $this->loadModel("Pilote_Model");
  }

    public function index() {

      $Centre = $this->Pilote_Model->getCentre();
      $Pilote = $this->Pilote_Model->getPilote();

      require_once(ROOT.'view/Pilote_View.php');

    }

    public function creation_pilote() {
      $compte = $this->Pilote_Model->putPilote();

      $Centre = $this->Pilote_Model->getCentre();
      $Pilote = $this->Pilote_Model->getPilote();

      require_once(ROOT.'view/Pilote_View.php');
    }

    public function supprime_pilote() {
      $compte = $this->Pilote_Model->supPilote();

      $Centre = $this->Pilote_Model->getCentre();
      $Pilote = $this->Pilote_Model->getPilote();

      require_once(ROOT.'view/Pilote_View.php');
    }
}
