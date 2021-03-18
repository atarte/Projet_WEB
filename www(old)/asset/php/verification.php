<?php
session_start();

if (isset($_POST['login']) && isset($_POST['pwd'])) {
    include 'config.php';

    $req = "SELECT id_Users AS id FROM Users WHERE Email='". $_POST['login'] ."' AND Passwd='". $_POST['pwd'] ."';";
    $query =$bdd->query($req);

    $count = $query->rowCount();
    $row = $query->fetch();

    if ($count == 1 && !empty($row)) {
        $_SESSION['id'] = $row['id'];

        header("Location: ../../accueil.php");
    }
    else {
        header("Location: ../../connexion.php?erreur=1");
    }
    // echo $row['id'] . '; '. $count;
}
else {
    header('Location: ../../connexion.php');
}
?>
