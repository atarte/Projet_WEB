{include file="./common/header.tpl" title={$title}}

<body>
    <a href="/Accueil"><button>Retour</button></a>
    <br><br>
    <form action="/Offre/creation" method="post" id="formulaire">

        Nom : <br>
        <input id="nom" type="text" name="nom" required>

        <br>
        <br>

        Type de Promotion : <br>
        <select id="specialite" name="specialite" required>
            <option value="">--Choississez une spécialité--</option>
            {$Type}
        </select>

        <br>
        <br>

        Entreprise : <br>
        <select id="entreprise" name="entreprise" required>
            <option value="">--Choississez une entreprise--</option>
            {$Entreprise}
        </select>

        <br>
        <br>

        Ville : <br>
        <select id="r_ville" name="ville">
            <option value="">--Choisiez une ville--</option>
            {$Ville}
        </select>

        <br>
        <br>

        Email : <br>
        <input id="email" type="email" name="email" required>

        <br>
        <br>

        Durée : <br>
        <input id="duree" type="text" name="duree" required>

        <br>
        <br>

        Compétences : <br>
        <input id="competences" type="text" name="competences" required>
        <button onclick="add()">+</button>
        <div id="plus_comp"></div>

        <br>
        <br>

        Nombre de place(s) : <br>
        <input id="nb_place" type="text" name="nb_place" required>

        <br>
        <br>

        Rémunération : <br>
        <input id="remuneration" type="text" name="remuneration" required>

        <br>
        <br>

        Date : <br>
        <input id="date" type="date" name="date" required>

        <br>
        <br>

        <input type="submit" value="Créer" id="submit">
        <br>

      </form>

      <div id="annuler">
      </div>

      <br>

      Barre de Recherche des Offres
      <!-- <form id="recherche" action="/Offre/recherche" method="post"> -->
          Nom :
          <input id="r_nom" type="text" name="nom">

          Entreprise :
          <select id="entreprise" name="entreprise" required>
              <option value="">--Choississez une entreprise--</option>
              {$Entreprise}
          </select>

          Ville :
          <select id="r_ville" name="ville">
              <option value="">--Choisiez une ville--</option>
              {$Ville}
          </select>

          <input id="r_submit" type="submit" value="Rechercher">
      </form>
      <a href="/Pilote"><button>X</button></a><br><br>

        {$Offre}

      <div>
          <!-- {$pagination|default:""} -->
      </div>

      <script src="/public/js/Offre.js" charset="utf-8"></script>
</body>

{include file="./common/footer.tpl"}
