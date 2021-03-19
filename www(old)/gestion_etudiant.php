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
    <main>
        <article>

            <!-- création étudiant -->
            <form action="./asset/php/creation_etudiant.php" method="post">
                nom :
                <input type="text" name="nom" required>

                Prenom :
                <input type="text" name="prenom" required>

                email :
                <input type="email" name="email" required>

                password :
                <input type="password" name="pwd" required>

                pilote :
                <select name="pilote" required>
                    <option value="">Choisiez un pilote</option>
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
                <select name="promotion" required>
                    <option value="">Choisiez une promotion</option>
                    <?php
                    $req = "SELECT Id_Promotion AS id, Promotion AS promotion FROM Promotion;";

                    $query = $bdd->query($req);
                    
                    while ($row = $query->fetch()) {
                        echo '<option value="'.$row['id'].'">'.$row['promotion'].'</option>';
                    }
                    ?>
                </select>

                spécialité :
                <select name="specialite" required>
                    <option value="">Choisiez une spécialité</option>
                    <?php
                $req = "SELECT Id_Specialite AS id, Specialite AS specialite FROM Specialite;";

                $query = $bdd->query($req);

                while ($row = $query->fetch()) {
                    echo '<option value="'.$row['id'].'">'.$row['specialite'].'</option>';
                }
                ?>
                </select>
                <input type="submit" value="crée">
            </form>
        </article>

        <article>
            <!-- Visualisation des etudiants -->
            <?php
            $req = "CALL Affichage_Etudiant();";
            $query = $bdd->query($req);

            while($row = $query->fetch()) { ?>
                <div>
                    Etudiant |
                    nom : <?php echo $row['nom']; ?>
                    prenom : <?php echo $row['prenom']; ?>
                    email : <?php echo $row['email']; ?>
                    pilote nom : <?php echo $row['piloteNom']; ?>
                    pilote prenom : <?php echo $row['pilotePrenom']; ?>
                    centre : <?php echo $row['centre']; ?>
                    promotion : <?php echo $row['promotion']; ?>
                    spécialité : <?php echo $row['specialite']; ?>
                    <br>
                </div>
            <?php
            }
            ?>
        </article>
    </main>
</body>
</html>
