<?php

class Connexion extends Controler {
    public function index() {
        // $this->loadModel("Connexion_Model");

        // $this->render('Connexion_View', 'Connexion');
        require_once(ROOT.'/view/Connexion_View.php');
    }


    public function verification() {
        $this->loadModel("Connexion_Model");

        $err = $this->Connexion_Model->verification();

        require_once(ROOT.'/view/Connexion_View.php');
    }

}
