<?php

class Connexion_Model extends Model {
    public function verification() {
        // session_start();

        $this->getConnexion();

        if (isset($_POST['user']) && isset($_POST['pwd'])) {

            $req = "SELECT id_Utilisateur AS id FROM Utilisateur WHERE Email='". $_POST['user'] ."'  AND Pwd='". $_POST['pwd'] ."';";
            // \'-- 
            $query = $this->db->query($req);

            $count = $query->rowCount();
            $row = $query->fetch();

            if ($count == 1 && !empty($row)) {
                // $_SESSION['id'] = $row['id'];

                header("Location: ../accueil");
            }
            else {
                
                // header("Location: ../?erreur=1");
                // throw new BadInput();
                return '1';
            }
        }
    }

    public function inscription() {
        if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['user']) && isset($_POST['pwd'])) {
            $this->getConnexion();

            $req = "SELECT ID_Utilisateur FROM Utilisateur WHERE Email='". $_POST['user'] ."';";
            $query = $this->db->query($req);

            $count = $query->rowCount();

            if ($count == 0) {
                $insert = "INSERT INTO Utilisateur (Nom, Prenom, Email, Pwd) VALUE ('". $_POST['nom'] ."', '". $_POST['prenom'] ."', '". $_POST['user'] ."', '". $_POST['pwd'] ."');";
                $this->db->exec($insert);
                return '0';
            }
            else {
                return '2';
            }
        }
    }
}