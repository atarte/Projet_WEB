{include file="./common/header.tpl" title={$title}}

<link rel="stylesheet" href="https://static.projet.com/css/Accueil.css">

<body>

<main class="accueil aff">

    <nav class="aff">
        <fieldset>
            <legend>Interface {$role|default:""}</legend>
            <div class="container">
                <div class="row justify-content-center p-2">
                    <a href="/Accueil/deconnexion"><button>Deconnexion</button></a>
                </div>
                {$button}
            </div>
        </fieldset>
    </nav>
</main>

</body>

{include file="./common/footer.tpl"}
