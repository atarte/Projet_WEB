{include file="./common/header.tpl" title={$title}}

<header>
    {$erreur|default:""}
</header>

<body>

  <a href="/Accueil"><button>Retour</button></a>
  <br><br>
  <form action="/Pilote/creation_pilote" method="post" id="formulaire">

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

      Password : <br>
      <input type="password" name="pass" id="pass" required>

      <br>
      <br>

      Centre : <br>
      <select name="centre" required>
        <option value="">--Choississez votre centre--</option>
        {$Centre}
      </select>

      <br>
      <br>

      <input type="submit" name="Validation" value="Créer" id="submit">
      <br>

    </form>

    <div id="annuler">
    </div>

    <br>

    <!--<form action="/Pilote/supprime_pilote" method="post">-->
      {$Pilote}
    <!--</form>-->

    <div>
        {$pagination}
    </div>

    <script src="/public/js/Pilote.js" charset="utf-8"></script>
</body>

{include file="./common/footer.tpl"}
