{include file="./common/header.tpl" title={$title}}

<header>
    {$erreur|default:""}
</header>
<body>

    <form action="/connexion/verification" method="POST">
        <fieldset>
            <legend>Connexion</legend>
            Identifiant :
            <input type="text" name="user" required>

            Mot de passe :
            <input type="password" name="pwd" required>

            <input type="submit" value="Connexion">
        </fieldset>
    </form>

</body>

{include file="./common/footer.tpl"}
