<?php

Class Pilote_Model extends Model {
    public function __construct() {
        // verification que l'utilisateur à bien le droit d'accédé à cette page
        session_start();

        if (!isset($_SESSION['id']) || ($_SESSION['role'] != "1" || ($_SESSION['role'] != "3" && $_SESSION['deleg']['pilote'] != "1"))) {
            header("location: ../../www");
        }
    }

    public function getCentre() {

        $this->getConnexion();

        $req = "SELECT Id_Centre, Centre FROM Centre";

        $query = $this->db->prepare($req);

        $query->execute();

        $id_centre = $row['Id_Centre'];
        $nom_centre = $row['Centre'];
    }

    public function getPilote() {

      $req = "SELECT Nom,Prenom,Email,Passwd FROM Users WHERE Id_Users = :id";

      $query = $this->db->prepare($req);

      $query->bindParam(':id', $_SESSION['id']);

      $query->execute();

      $count = $query->rowCount();
      $row = $query->fetch();

      if ($count == 1 && !empty($row)) {
          $_SESSION['role'] = $row['Id_Statut'];

          if ($_SESSION['role'] == "3") {
              $_SESSION['deleg'] = array(
                  'entreprise' => $row['Entreprise'],
                  'offre' => $row['Offre'],
                  'pilote' => $row['Pilote'],
                  'delegue' => $row['Delegue'],
                  'etudiant' => $row['Etudiant'],
                  'candidature' => $row['Candidature']
              );
          }
      }
    }
}
