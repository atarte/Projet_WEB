<?php
    try {
        $bdd = new PDO('mysql:host=projetweb.cokj0wfmdhfw.eu-west-3.rds.amazonaws.com;dbname=GroupeCat_Test;port=3315', 'admin', 'ProjetNulle');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);  
    }
    catch (PDOException $e) {
        echo "Erreur de Connexion : ". $e->getMessage();
    }
?>