{include file="./common/header.tpl" title={$title}}

<link rel="stylesheet" href="http://static.projet.com/css/Candidature.css">

<body>

<main class="container">
    <nav>
        <a href="/Accueil"><button>Retour</button></a>
        <a href="/Wishlist" {$wishlist|default:""}><button>Wishlist</button></a>
    </nav>

    <div class="row justify-content-between">
        <article class="col">

            <!-- création étudiant -->
            <fieldset class="fieldconst">
                <legend id="legend_form">Liste des candidatures</legend>

                <!-- affichages des stages postulé -->
                <div class="">
                    {$candidature}
                </div>
            </fieldset>
        </article>
    </div>
</main>

</body>

<script src="/public/js/Candidature.js" charset="utf-8"></script>

{include file="./common/footer.tpl"}
