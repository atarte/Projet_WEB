<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Connexion</title>
</head>
<header>
    <?= $content ?>
</header>
<body>
    <form action="../../mvc/connexion/verification" method="POST">
        <fieldset>
            <legend>Connexion</legend>
            Identifiant :
            <input type="text" name="user" required>

            Mot de passe :
            <input type="password" name="pwd" required>

            <input type="submit" value="Connexion">
        </fieldset>
    </form>

    </form>
        <fieldset>
            <legend>Inscription</legend>
        
            <form action="../../mvc/connexion/inscription" method="POST">
            Nom :
            <input type="text" name="nom" required>

            Prenom :
            <input type="text" name="prenom" required>

            Identifiant :
            <input type="text" name="user" required>

            Mot de passe :
            <input type="password" name="pwd" required>

            <input type="submit" value="Inscription">
        </fieldset>        
    </form>

</body>
</html>