<?php

class Accueil extends Controler {    
    public function index() {
        $this->loadModel("Accueil_Model");

        $this->Accueil_Model->getPower();

        require_once(ROOT.'/view/Accueil_View.php');
    }

    public function deconnexion() {
        $this->loadModel("Accueil_Model");

        $this->Accueil_Model->deconnexion();
    }
}
