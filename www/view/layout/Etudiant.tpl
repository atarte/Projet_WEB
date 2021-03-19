{include file="./common/header.tpl" title={$title}}

<body>
    <!-- création étudiant -->
    <form action="./creation" method="post">
        nom :
        <input type="text" name="nom" required>

        Prenom :
        <input type="text" name="prenom" required>

        email :
        <input type="email" name="email" required>

        password :
        <input type="password" name="pwd" required>

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
        <input type="submit" value="crée">
    </form>

    {$etudiant}
</body>

{include file="./common/footer.tpl"}