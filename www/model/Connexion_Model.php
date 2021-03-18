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
}
