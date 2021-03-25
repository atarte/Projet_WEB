<?php

class Candidature extends Controler {
    public $candidature;
    public $wish;


    public function __construct() {
        session_start();

        $this->loadModel("Candidature_Model");

        $this->wish = $this->Candidature_Model->getWishlist();
    }


    public function index() {
        $this->affichage();
    }


    public function affichage() {
        if ($_SESSION['role'] == "4") {
            $this->candidature = $this->Candidature_Model->displayCandidature();
        }
        else if ($_SESSION['role'] == "2") {
            $this->candidature = $this->Candidature_Model->donneePilote();
        }

        require_once(ROOT.'view/Candidature_View.php');
    }

    public function wishList(int $id) {
        if ($_SESSION['role'] == "4") {
            $this->Candidature_Model->addWish($id);
        }
    }


    public function deleteWishlist(int $id) {
        if ($_SESSION['role'] == "4") {
            $this->Candidature_Model->deleteWish($id);
        }
    }

    public function deletePostuler(int $id) {
        if ($_SESSION['role'] == "4") {
            $this->Candidature_Model->deletePost($id);
        }
    }
}
