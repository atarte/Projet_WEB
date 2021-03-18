<?php
    session_start();
    echo 'id user : '. $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Accueil</title>
</head>
<body>
    <a href="./accueil.php?deconnexion=true">Déconnexion</a>

    <?php
    if (isset($_GET['deconnexion'])) {
        if ($_GET['deconnexion'] == true){
            session_unset();
            header("Location: connexion.php");
        }
    }
    ?>

</body>
</html>
