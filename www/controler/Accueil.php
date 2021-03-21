<?php

class Accueil extends Controler {
    public function index() {
        $this->loadModel("Accueil_Model");

        $this->Accueil_Model->getPower();

        // echo $_SESSION['role'];
        // echo $_SESSION['deleg']['etudiant'];

        require_once(ROOT.'view/Accueil_View.php');
    }

    public function deconnexion() {
        $this->loadModel("Accueil_Model");

        $this->Accueil_Model->deconnexion();
    }
}
