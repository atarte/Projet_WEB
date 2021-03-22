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

            <!-- création entreprise -->
            <form action="./asset/php/creation_entreprise.php" method="post">

                Nom :
                <input type="text" name="Nom" required>
		
		E-mail: 
		<input type="text" name="email" required>
		
		Stagiaire :
                 <select name="stagiaire" required>
                    <option value="">--Nombre accepté--</option>
                    <?php
                $req = "SELECT Id_Entreprise AS id, Nombre_Accepter AS Nombre_De_Stagiaire FROM Entreprise;";

                $query = $bdd->query($req);

                while ($row = $query->fetch()) {
                    echo '<option value="'.$row['id'].'">'.$row['Nombre_De_Stagiaire'].'</option>';
                }
                ?>
                </select>
		
		Adresse :
                <input type="text" name="adresse" required>
                    
                Code postal :
                    <input id="code_p" type="number" name="code_p" class="taille_b">
                    
                Ville :
                    <select id="ville" class="taille_b" name="ville">
                    </select>

                Region :
                    <input id="region" type="text" name="region" class="taille_b" readonly>
					
				Pays :
                <select name="pays" required>
                    <option value="">--Pays--</option>
                    <?php
                $req = "SELECT Id_Pays AS id, Pays AS pays FROM Pays;";

                $query = $bdd->query($req);

                while ($row = $query->fetch()) {
                    echo '<option value="'.$row['id'].'">'.$row['pays'].'</option>';
                }
                ?>
                </select>
                 



		Secteur :
                <select name="secteur" required>
                    <option value="">--Secteur Activite--</option>
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
            <!-- Visualisation des entreprises -->
            <?php
            $req = "CALL Affichage_Entreprise();";
            $query = $bdd->query($req);

            while($row = $query->fetch()) { ?>
                <div>
                    Entreprise |
                    Nom : <?php echo $row['nom']; ?>
                    E-mail : <?php echo $row['promotion']; ?>
                    Stagiaire : <?php echo $row['specialite']; ?>
		    Adresse : <?php echo $row['specialite']; ?>
		    Code Postal : <?php echo $row['specialite']; ?>
		    Ville : <?php echo $row['specialite']; ?>
		    Region : <?php echo $row['specialite']; ?>
		    Secteur : <?php echo $row['specialite']; ?>
                    <br>
                </div>
            <?php
            }
            ?>
        </article>
    </main>
	<script src="D:\projet\www\private\asset\vendor\jquery"></script>
    <script src="D:\projet\www\private\asset\js\entreprise.js"></script> 
</body>
</html>
