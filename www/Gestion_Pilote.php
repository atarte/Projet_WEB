<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Gestion des Pilotes</title>
  </head>
  <body>
    <form action="./asset/php/Creation_Pilote.php" method="post">
      Nom : <br>
      <input type="text" name="nom" required>
      <br>
      <br>
      Prenom : <br>
      <input type="text" name="prenom" required>
      <br>
      <br>
      Mail : <br>
      <input type="email" name="mail" required>
      <br>
      <br>
      Centre : <br>
      <select name="centre" required>
        <?php
          include './asset/php/config.php';
          $requete = 'SELECT Id_Centre, Centre FROM Centre';
          $resultat =$bdd->query($requete);
          while ($data = $resultat->fetch()){
            echo '<option value="'.$data['Id_Centre'].'">'.$data['Centre'].'</option>';
          }
        ?>
      </select>
      <br>
      <br>
      <input type="submit" name="Validation">

      <?php
      if (isset($_GET['erreur'])) {
          $err = $_GET['erreur'];
          if ($err == 1) {
              echo "<p style='color:red'>Email déjà utilisé dans un autre compte</p>";
          }
      }
      ?>
    </form>
  </body>
</html>
