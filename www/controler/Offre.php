<?php

class Offre extends Controler {
    public $type_promo;
    public $ville;
    public $entreprise;
    public $offre;
    public $competence;
    public $durer;
    public $wish;
    public $post;

    public $err;
    public $p;
    public $close;


    public function __construct() {
        session_start();
        $this->loadModel("Offre_Model");

        $this->p = 1;

        $this->close = false;

        $this->type_promo = $this->Offre_Model->getType();
        $this->ville = $this->Offre_Model->getVille();
        $this->entreprise = $this->Offre_Model->getEntreprise();
        $this->competence = $this->Offre_Model->getCompetence();
        $this->durer = $this->Offre_Model->getDurer();
        $this->wish = $this->Offre_Model->getWishlist();
        $this->post = $this->Offre_Model->getPostulation();
    }


    public function index() {
        $this->affichage();
    }


    public function affichage() {
        $pageLimit = 10 * ($this->p -1);

        $this->offre = $this->Offre_Model->displayOffre($pageLimit);

        require_once(ROOT.'view/Offre_View.php');

    }


    public function creation() {
        $this->err = $this->Offre_Model->addOffre();

        $this->affichage();
    }


    public function suppression(int $id) {
        $this->err = $this->Offre_Model->deleteOffre($id);

        $this->affichage();
    }


    public function modification(int $id) {
        $this->err = $this->Offre_Model->updateOffre($id);

        $this->affichage();
    }


    public function recherche() {
        $this->offre = $this->Offre_Model->search();

        $this->p = 0;

        $this->close = true;

        require_once(ROOT.'view/Offre_View.php');
    }


    public function wishList(int $id) {
        // $this->offre = $this->Offre_Model->addWish($id);
        $this->Offre_Model->addWish($id);

        // header('location: /Offre')
        // $this->affichage();

        // require_once(ROOT.'view/Offre_View.php');
    }


    public function deleteWishlist(int $id) {
        $this->Offre_Model->deleteWish($id);
    }

    public function postuler(int $id) {
        $this->Offre_Model->addPost($id);
    }

    public function deletePostuler(int $id) {
        $this->Offre_Model->deletePost($id);
    }
}
