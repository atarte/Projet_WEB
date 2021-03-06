<?php

Class Accueil_Model extends Model {
    public function __construct() {
        session_start();

        if (!isset($_SESSION['id'])) {
            session_unset();
            // il faudrai affiché un message du genre "page inaxessible"
            header("location: /");
        }
    }


    public function getPower() {

        $this->getConnexion();
        // if (isset($_SESSION['id']))

        $req = "SELECT * FROM Droit WHERE Id_Users = :id";

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


    public function deconnexion() {
        session_unset();

        header("location: /");
    }
}
