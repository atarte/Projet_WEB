{include file="./common/header.tpl" title={$title}}

<link rel="stylesheet" href="https://static.projet.com/css/Connexion.css">

<body>

<main class="connexion aff">
    <div class="aff">
        <fieldset>
            <legend>Connexion</legend>

            <form action="/Connexion/verification" method="POST">
                <div class="container">
                    <div class="row justify-content-center p-2">
                        <!-- errur : -->
                        {$erreur|default:''}
                    </div>
                    <div class="row justify-content-center">
                        <!-- Identifiant : -->
                        <input type="text" name="user" placeholder="Email" value="{$cookie|default:""}" required>
                    </div>
                    <div class="row justify-content-center p-2">
                        <!-- Mot de passe : -->
                        <input type="password" name="pwd" placeholder="Password" required>
                    </div>
                    <div class="row justify-content-center p-2">
                        <input type="submit" value="Connexion">
                    </div>
                </div>
            </form>
        </fieldset>
    </div>
</main>

</body>

<script src="/public/js/Connexion.js" charset="utf-8"></script>

{include file="./common/footer.tpl"}
