<?php

class Pilote extends Controler {
    public function index() {

      $this->loadModel("Pilote_Model");

      $this->Pilote_Model->getCentre();
      $this->Pilote_Model->getPilote();
      $this->Pilote_Model->putPilote();

      require_once(ROOT.'/view/Pilote_View.php');

    }
}
