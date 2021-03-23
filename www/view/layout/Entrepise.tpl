{include file="./common/header.tpl" title={$title}}

<body>
<form action="./asset/php/Creation_Entreprise.php" method="post">
      Nom : <br>
      <input type="text" name="nom" required>
      <br>
      <br>
      E-mail : <br>
      <input type="email" name="mail" required>
      <br>
      <br>
	  Adresse :<br>
      <input type="text" name="adresse" class="taille_b">
	  <br>
      <br>
      Code postal :<br>
      <input id="code_p" type="number" name="code_p" class="taille_b">
      <br>
      <br>             
      Ville :<br>
      <select id="ville" class="taille_b" name="ville">
      </select>
	  <br>
      <br>
	  Region :<br>
      <input id="region" type="text" name="region" class="taille_b" readonly>
	  <br>
      <br>
	  Stagiaire : <br>
      <select name="stagiaire" required>
        <?php
          
          $requete = 'SELECT Id_Stagiaire, Stagiaire FROM Stagiaire';
          $resultat =$bdd->query($requete);
          while ($data = $resultat->fetch()){
            echo '<option value="'.$data['Id_Stagiaire'].'">'.$data['Stagiaire'].'</option>';
          }
        ?>
	</select>	
	  <br>
      <br>
	Secteur : <br>
      <select name="secteur" required>
        <?php
          
          $requete = 'SELECT Id_Secteur, Secteur FROM Secteur';
          $resultat =$bdd->query($requete);
          while ($data = $resultat->fetch()){
            echo '<option value="'.$data['Id_Secteur'].'">'.$data['Secteur'].'</option>';
          }
        ?>	
	</select>		
			<input type="submit" value="Valider" class="bouton">
            <input type="reset" value="Anuler" class="bouton">	
			
                
    </form>
    
    <script src="./asset/js/entreprise.js"></script>
</body>

{include file="./common/footer.tpl"}
