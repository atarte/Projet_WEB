{include file="./common/header.tpl" title={$title}}

<link rel="stylesheet" href="http://static.projet.com/css/Wishlist.css">

<body>

<main class="container">
    <nav>
        <a href="/Candidature"><button>Retour</button></a>
    </nav>

    <div class="row justify-content-between">
        <article class="col">

            <!-- création étudiant -->
            <fieldset class="field">
                <legend id="legend_form">WishList</legend>

                <!-- affichages des stages postulé -->
                <div class="">
                    {$Offre}
                </div>

            </fieldset>
        </article>
    </div>
</main>

</body>

<script src="/public/js/Wishlist.js" charset="utf-8"></script>

{include file="./common/footer.tpl"}
