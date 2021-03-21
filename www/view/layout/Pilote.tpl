{include file="./common/header.tpl" title={$title}}

<header>
    {$erreur|default:""}
</header>

<body>

  <a href="/Accueil"><button>Retour</button></a>
  <br><br>
  <form action="/Pilote/creation" method="post" id="formulaire">

      Nom : <br>
      <input id="nom" type="text" name="nom" required>

      <br>
      <br>

      Prenom : <br>
      <input id="prenom" type="text" name="prenom" required>

      <br>
      <br>

      Mail : <br>
      <input id="email" type="email" name="email" required>

      <br>
      <br>

      <span id="pwd_div">
          Password : <br>
          <input type="password" name="pwd" id="pwd" required>
      </span>

      <br>
      <br>

      Centre : <br>
      <select id="centre" name="centre" required>
        <option value="">--Choississez un centre--</option>
        {$Centre}
      </select>

      <br>
      <br>

      <input type="submit" value="Créer" id="submit">
      <br>

    </form>

    <div id="annuler">
    </div>

    <br>

    Barre de Recherche des Pilotes
    <form id="recherche" action="/Pilote/recherche" method="post">
        Nom :
        <input id="r_nom" type="text" name="nom">

        Prenom :
        <input id="r_prenom" type="text" name="prenom">

        Centre :
        <select id="r_centre" name="centre">
            <option value="">--Choisiez un centre--</option>
            {$Centre}
        </select>

        <input id="r_submit" type="submit" value="Rechercher">
    </form>
    <a href="/Pilote"><button>X</button></a>

      {$Pilote}

    <div>
        {$pagination|default:""}
    </div>

    <script src="/public/js/Pilote.js" charset="utf-8"></script>
</body>

{include file="./common/footer.tpl"}
