<?php

class Connexion_Model extends Model {
    public function __construct() {
        session_unset();
    }


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

                setcookie("userName", $_POST['user'], time()+2*60*60, "/");

                header("Location: /Accueil");
            }
            else {
                return '1';
                // header("location: /Connexion");
            }
        }
    }
}
