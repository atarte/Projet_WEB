{include file="./common/header.tpl" title={$title}}

<header>
    {$erreur|default:""}
</header>

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
       
	</select>	
	  <br>
      <br>
	Secteur : <br>
      <select name="secteur" required>
      
	</select>		
			<input type="submit" value="Valider" class="bouton">
            <input type="reset" value="Anuler" class="bouton">	
			
                
    </form>
    
    <script src="./asset/js/entreprise.js"></script>
</body>

{include file="./common/footer.tpl"}
