<?php

Class Wishlist extends Controler {
    public $offre;
    public $wish;
    public $post;


    public function __construct() {
        session_start();
        $this->loadModel("Wishlist_Model");

        $this->post = $this->Wishlist_Model->getPostulation();
    }


    public function index() {
        $this->affichage();
    }


    public function affichage() {
        $this->offre = $this->Wishlist_Model->displayOffre();

        require_once(ROOT.'view/Wishlist_View.php');
    }


    public function deleteWishlist(int $id) {
        $this->Wishlist_Model->deleteWish($id);
    }

    public function postuler(int $id) {
        $this->Wishlist_Model->addPost($id);
    }

    public function deletePostuler(int $id) {
        $this->Wishlist_Model->deletePost($id);
    }

}
