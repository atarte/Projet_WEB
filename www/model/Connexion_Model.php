<?php

class Connexion_Model extends Model {
    public function verification() {
        session_start();

        $this->getConnexion();

        if (isset($_POST['user']) && isset($_POST['pwd'])) {
            $req = "SELECT ID_Users AS id FROM Users WHERE Email = :user AND Passwd = :pwd";

            $query = $this->db->prepare($req);

            $query->bindParam(':user', $_POST['user']);
            $query->bindParam(':pwd', $_POST['pwd']);

            $query->execute();

            $count = $query->rowCount();
            $row = $query->fetch();

            if ($count == 1 && !empty($row)) {
                $_SESSION['id'] = $row['id'];

                header("Location: ../accueil");
            }
            else {
                return '1';
            }
        }
    }
}
