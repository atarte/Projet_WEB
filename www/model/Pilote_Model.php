<?php

Class Pilote_Model extends Model {
    public function __construct() {
        // verification que l'utilisateur à bien le droit d'accédé à cette page

        if (($_SESSION['role'] == "3" && $_SESSION['deleg']['pilote'] != "1") || ($_SESSION['role'] == "2") || ($_SESSION['role'] == "4")) {
            header("location: /");
        }
    }

    public function getCentre() {

        $this->getConnexion();

        $req = "SELECT Id_Centre, Centre FROM Centre";

        $query = $this->db->prepare($req);

        $query->execute();

        return $query;
    }

    public function getPilote(int $p) {

      $req = "CALL Affichage_Pilote(:p)";

      $query = $this->db->prepare($req);

      $query->bindParam(':p', $p);

      $query->execute();

      return $query;
    }

    public function putPilote() {

      $this->getConnexion();

      $req = "SELECT Email From Users WHERE Email = :email ;";

      $query = $this->db->prepare($req);

      $query->bindParam(':email', $_POST['mail']);

      $query->execute();

      $count = $query->rowCount();
      $row = $query->fetch();

      if ($count == 1 && !empty($row)) {
        return '1';
      }
      else {
        $req  = "CALL Creation_Pilote(:nom, :prenom, :mail, :pass, :centre)";

        $query = $this->db->prepare($req);

        $query->bindParam(':nom', $_POST['nom']);
        $query->bindParam(':prenom', $_POST['prenom']);
        $query->bindParam(':mail', $_POST['mail']);
        $query->bindParam(':pass', $_POST['pass']);
        $query->bindParam(':centre', $_POST['centre']);

        $query->execute();

      }

    }

    public function supPilote() {

      $this->getConnexion();

      $req = "CALL Supprimer_Pilote(:id)";

      echo $_POST['supp'];

      $query = $this->db->prepare($req);

      $query->bindParam(':id', $_POST['supp']);

      $query->execute();

    }
}
