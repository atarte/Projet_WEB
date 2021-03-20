{include file="./common/header.tpl" title={$title}}

<body>
    <a href="/Accueil">retour</a>

    {$erreur|default:''}

    <!-- création étudiant -->
    <form action="/Etudiant/creation" method="post">
        nom :
        <input type="text" name="nom" required>

        Prenom :
        <input type="text" name="prenom" required>

        email :
        <input type="email" name="email" required>

        <div id="pwd">
            password :
            <input "pwd" type="password" name="pwd" required>
        </div>

        pilote :
        <select name="pilote" required>
            <option value="">Choisiez un pilote</option>
            {$pilote}
        </select>

        promotion :
        <select name="promotion" required>
            <option value="">Choisiez une promotion</option>
            {$promotion}
        </select>

        spécialité :
        <select name="specialite" required>
            <option value="">Choisiez une spécialité</option>
            {$specialite}
        </select>
        <input id="submit" type="submit" value="Créer">
    </form>

    <div id="annuler">
    </div>

    {$etudiant}

    <div>
        {$pagination}
    </div>

    <script src="/public/js/Etudiant.js" charset="utf-8"></script>
</body>

{include file="./common/footer.tpl"}
