{include file="./common/header.tpl" title={$title}}

<body>
    <a href="/Accueil"><button>Retour</button></a>

    {$erreur|default:''}

    <!-- création étudiant -->
    Barre de Creation/Modification des étudiants
    <form id="formulaire" action="/Etudiant/creation" method="post">
        nom :
        <input id="nom" type="text" name="nom" required>

        Prenom :
        <input id="prenom" type="text" name="prenom" required>

        email :
        <input id="email" type="email" name="email" required>

        <span id="pwd_div">
            password :
            <input "pwd" type="password" name="pwd" required>
        </span>

        pilote :
        <select id="pilote" name="pilote" required>
            <option value="">Choisiez un pilote</option>
            {$pilote}
        </select>

        promotion :
        <select id="promotion" name="promotion" required>
            <option value="">Choisiez une promotion</option>
            {$promotion}
        </select>

        spécialité :
        <select id="specialite" name="specialite" required>
            <option value="">Choisiez une spécialité</option>
            {$specialite}
        </select>

        <input id="submit" type="submit" value="Créer">
    </form>

    <div id="annuler">
    </div>

    <!-- Recherche Etudiant -->
    Barre de Recherche des étudiants
    <form id="recherche" action="/Etudiant/recherche" method="post">
        nom :
        <input id="r_nom" type="text" name="nom">

        Prenom :
        <input id="r_prenom" type="text" name="prenom">

        pilote :
        <select id="r_pilote" name="pilote">
            <option value="">Choisiez un pilote</option>
            {$pilote}
        </select>

        promotion :
        <select id="r_promotion" name="promotion">
            <option value="">Choisiez une promotion</option>
            {$promotion}
        </select>

        spécialité :
        <select id="r_specialite" name="specialite">
            <option value="">Choisiez une spécialité</option>
            {$specialite}
        </select>

        centre :
        <select id="r_centre" name="centre">
            <option value="">Choisiez un centre</option>
            {$centre}
        </select>

        <input id="r_submit" type="submit" value="Rechercher">
    </form>
    <a href="/Etudiant"><button>X</button></a>

    <!-- Affichage : -->
    {$etudiant}

    <div>
        {$pagination|default:""}
    </div>

    <script src="/public/js/Etudiant.js" charset="utf-8"></script>
</body>

{include file="./common/footer.tpl"}
