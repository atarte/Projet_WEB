<?php

Class Pilote_Model extends Model {
    public function __construct() {
        // verification que l'utilisateur à bien le droit d'accédé à cette page

        if (!isset($_SESSION['id'])){// || ($_SESSION['role'] != "1" || ($_SESSION['role'] == "3" && $_SESSION['deleg']['pilote'] != "1"))) {
            header("location: ../../www");
        }
    }

    public function getCentre() {

        $this->getConnexion();

        $req = "SELECT Id_Centre, Centre FROM Centre";

        $query = $this->db->prepare($req);

        $query->execute();

        return $query;
    }

    public function getPilote() {

      $req = "CALL Affichage_Pilote()";

      $query = $this->db->prepare($req);

      $query->execute();

      return $query;
    }
}
