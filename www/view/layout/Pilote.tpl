{include file="./common/header.tpl" title={$title}}

<header>
    {$erreur|default:""}
</header>

<body>
  <form action="/Pilote/creation_pilote" method="post">

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
      <input type="password" name="pass" required>

      <br>
      <br>

      Centre : <br>
      <select name="centre" required>
        {$Centre}
      </select>

      <br>
      <br>

      <input type="submit" name="Validation" value="Créer">
      <br>
      <br>

      {$Pilote}

</body>

{include file="./common/footer.tpl"}
