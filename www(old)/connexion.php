<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Connexion</title>
</head>
<body>
<!-- IL faudra mettre des div est du css un peu partout à l'avenir -->

    <form action="./asset/php/verification.php" method="POST">
        Email/login :
        <input type="text" name="login" required>

        Mot de passe :
        <input type="password" name="pwd" required>

        <input type="submit" value="submit">

        <?php
        if (isset($_GET['erreur'])) {
            $err = $_GET['erreur'];
            if ($err == 1) {
                echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
            }
        }
        ?>

    </form>
</body>
</html>
