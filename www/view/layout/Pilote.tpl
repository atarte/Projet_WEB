{include file="./common/header.tpl" title={$title}}

<link rel="stylesheet" href="http://static.projet.com/css/Pilote.css">


<body>
<main class="container">
    <nav>
        <a href="/Accueil"><button>Retour</button></a>
    </nav>

    <div class="row justify-content-between">
        <article class="col">

            <!-- création de pilote -->
            <fieldset class="field">
                <legend id="legend_form">Création de pilote</legend>

                <form id="formulaire" class="form" action="/Pilote/creation" method="post">
                    <div class="container">
                        <div class="row justify-content-center p-1">
                            <!-- nom : -->
                            <input id="nom" type="text" name="nom" placeholder="Nom" required>
                        </div>
                        <div class="row justify-content-center p-1">
                            <!-- Prenom : -->
                            <input id="prenom" type="text" name="prenom" placeholder="Prenom" required>
                        </div>
                        <div class="row justify-content-center">
                            <!-- errur : -->
                            {$erreur|default:''}
                        </div>
                        <div class="row justify-content-center p-1">
                            <!-- email : -->
                            <input id="email" type="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="row justify-content-center p-1">
                            <span id="pwd_div">
                                <!-- password : -->
                                <input id="pwd" type="password" name="pwd" placeholder="Password" required>
                            </span>
                        </div>
                        <div class="row justify-content-center p-1">
                            <select id="centre" name="centre" required>
                                <option value="">Choississez un centre</option>
                                {$Centre}
                            </select>
                        </div>
                        <div class="row justify-content-center p-1">
                            <input type="submit" value="Créer" id="submit">
                        </div>
                </form>

                        <div class="row justify-content-center p-1">
                            <span id="annuler">
                            </span>
                        </div>
                    </div>
            </fieldset>
        </article>

        <article class="col">
            <fieldset class="field">
                <legend>Liste des délégués</legend>

                <!-- Recherche Pilote -->
                <div class="">
                    <form id="recherche" action="/Pilote/recherche" method="post">
                        <!-- Nom : -->
                        <input id="r_nom" type="text" name="nom" placeholder="Nom">

                        <!-- Prenom : -->
                        <input id="r_prenom" type="text" name="prenom" placeholder="Prenom">

                        <!-- Centre : -->
                        <select id="r_centre" name="centre">
                            <option value="">Choisiez un centre</option>
                            {$Centre}
                        </select>

                        <input id="r_submit" type="submit" value="Rechercher">

                        <span id="close">
                            {$close|default:""}
                        </span>
                    </form>
                </div>
    <!-- <a href="/Pilote"><button>X</button></a> -->

                <div class="page">
                    {$pagination|default:""}
                </div>

                <div class="">
                    {$Pilote}
                </div>
            </fieldset>
        </article>
    </div>
</main>

    <script src="/public/js/Pilote.js" charset="utf-8"></script>
</body>

{include file="./common/footer.tpl"}
