<?php

Class Accueil_Model extends Model {
    public function __construct() {
        $this->getConnexion();
    }

    public function deconnexion() {
        header("location: ../");
    }
}