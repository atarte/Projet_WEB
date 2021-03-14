<?php
    session_start();

    include './asset/php/config.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>
<body>
    <!-- création étudiant -->
    <form action="./asset/php/creation_etudiant.php" method="post">
        nom :
        <input type="text" name="nom">
        
        Prenom :
        <input type="text" name="prenom">

        email :
        <input type="email" name="email">

        password :
        <input type="password" name="pwd">

        pilote :
        <select name="pilote">
            <option value="">Choisiez le pilote</option>
            <?php
                $req = "SELECT Users.Id_Users AS id, Users.Nom AS nom, Users.Prenom AS prenom FROM Users INNER JOIN Droit ON Users.Id_Users = Droit.Id_Users WHERE Droit.Id_Statut = 2;";
                
                $query = $bdd->query($req);

                while ($row = $query->fetch()) {
                    $nom = ucfirst($row['nom']);
                    $prenom = ucfirst($row['prenom']);

                    echo '<option value="'.$row['id'].'">'.$nom.' '.$prenom.'</option>';
                }
            ?>
        </select>

        promotion :
        <select name="promotion">

        </select>

        spécialité :
        <select name="specilite">

        </select>

        <input type="submit" value="crée">
    </form>
</body>
</html>