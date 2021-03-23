{include file="./common/header.tpl" title={$title}}

<link rel="stylesheet" href="http://static.projet.com/css/Connexion.css">

<body>

<main class="connexion aff">
    <div class="aff">
        <fieldset>
            <legend>Connexion</legend>

            <form action="/connexion/verification" method="POST">
                <div class="container">
                    <div class="row justify-content-center p-1">
                        <!-- errur : -->
                        {$erreur|default:''}
                    </div>
                    <div class="row justify-content-center">
                        <!-- Identifiant : -->
                        <input type="text" name="user" placeholder="Email" required>
                    </div>
                    <div class="row justify-content-center p-1">
                        <!-- Mot de passe : -->
                        <input type="password" name="pwd" placeholder="Password" required>
                    </div>
                    <div class="row justify-content-center p-1">
                        <input type="submit" value="Connexion">
                    </div>
                </div>
            </form>
        </fieldset>
    </div>
</main>

</body>

{include file="./common/footer.tpl"}
