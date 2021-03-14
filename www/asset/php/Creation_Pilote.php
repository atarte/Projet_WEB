<?php
session_start();

if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mail']) && isset($_POST['centre'])) {
    include 'config.php';

    $req = "SELECT Email From Users WHERE Email ='".$_POST['mail']."';";
    $query = $bdd->query($req);

    $count = $query->rowCount();
    $row = $query->fetch();

    if ($count == 1 && !empty($row)) {
        header("Location: ../../Gestion_Pilote.php?erreur=1");
    }
    else {
      $requete = "CALL Creation_Pilote('".$_POST['nom']."','".$_POST['prenom']."','".$_POST['mail']."','9876','".$_POST['centre']."');" ;
      $insertion =$bdd->exec($requete);
    }
}
?>
