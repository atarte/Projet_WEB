<?php

class Connexion extends Controler {
    public function index() {
        $this->loadModel("Connexion_Model");
        
        $this->render('Connexion_View', 'Connexion');
    }

    public function erreurRender(string $fichier, string $templ, string $err) {
        ob_start();

        require_once(ROOT.'view/'.$fichier.'.php');

        $content = ob_get_clean();

        require_once(ROOT.'view/layout/'.$templ.'.php');
    }

    public function verification() {
        $this->loadModel("Connexion_Model");

        $err = $this->Connexion_Model->verification();

        $this->erreurRender('Connexion_View', 'Connexion', $err);
    }

    public function inscription() {
        $this->loadModel("Connexion_Model");

        $err = $this->Connexion_Model->inscription();

        $this->erreurRender('Connexion_View', 'Connexion', $err);
    }
}