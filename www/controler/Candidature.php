<?php

class Candidature extends Controler {
    public $candidature;
    public $wish;
    public $assistant;


    public function __construct() {
        session_start();

        $this->loadModel("Candidature_Model");

        $this->wish = $this->Candidature_Model->getWishlist();
        $this->$assistant = $this->Candidature_Model->getAssit();
    }


    public function index() {
        $this->affichage();
    }


    public function affichage() {
        if ($_SESSION['role'] == "4") {
            $this->candidature = $this->Candidature_Model->displayCandidature();

            require_once(ROOT.'view/CandidatureEtudiant_View.php');
        }
        else if ($_SESSION['role'] == "2") {
            $this->candidature = $this->Candidature_Model->donneePilote();

            require_once(ROOT.'view/CandidaturePilote_View.php');
        }
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


    public function step2EtudiantA(int $id) {
        $this->Candidature_Model->updatestep2A($id);
    }


    public function step2EtudiantR(int $id) {
        $this->Candidature_Model->updatestep2R($id);
    }


    public function step3Etudiant(int $id) {
        $this->Candidature_Model->updatestep3($id);
    }


    public function step4Pilote(int $id) {
        $this->Candidature_Model->updatestep4($id);
    }
}
