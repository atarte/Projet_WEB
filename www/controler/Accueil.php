<?php

// Class du controler d'accueil/ elle va hérité du controler global dans lequel on pouura mettre des fonction commune a tout le monde
class Accueil extends Controler {
    public function index() {
        $this->loadModel("Accueil_Model");

        $this->Accueil_Model->tab = 'Produit';
        $connexion = $this->Accueil_Model->getAll();

        $this->render('Accueil_View', 'Accueil', compact('connexion'));
    }

    public function deconnexion() {
        $this->loadModel("Accueil_Model");
        
        $this->Accueil_Model->deconnexion();
    }
}