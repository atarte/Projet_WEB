{include file="./common/header.tpl" title={$title}}

<link rel="stylesheet" href="https://static.projet.com/css/Etudiant.css">

<body>
<main class="container">
    <nav>
        <a href="/Accueil"><button>Retour</button></a>
    </nav>

    <div class="row justify-content-between">
        <article class="col">

            <!-- création étudiant -->
            <fieldset class="field">
                <legend id="legend_form">Création d'étudiant</legend>

                <form id="formulaire" class="form" action="/Etudiant/creation" method="post">
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
                                <input "pwd" type="password" name="pwd" placeholder="Password" required>
                            </span>
                        </div>
                        <div class="row justify-content-center p-1">
                            <!-- pilote : -->
                            <select id="pilote" name="pilote" required>
                                <option value="">Choisiez un pilote</option>
                                {$pilote}
                            </select>
                        </div>
                        <div class="row justify-content-center p-1">
                        <!-- promotion : -->
                            <select id="promotion" name="promotion" required>
                                <option value="">Choisiez une promotion</option>
                                {$promotion}
                            </select>
                        </div>
                        <div class="row justify-content-center p-1">
                        <!-- spécialité : -->
                            <select id="specialite" name="specialite" required>
                                <option value="">Choisiez une spécialité</option>
                                {$specialite}
                            </select>
                        </div>
                        <div class="row justify-content-center p-1">
                            <input id="submit" type="submit" value="Créer">
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
                <legend>Liste des étudiants</legend>

                <!-- Recherche Etudiant -->
                <div class="">
                    <form id="recherche" action="/Etudiant/recherche" method="post">
                        <!-- nom : -->
                        <input id="r_nom" type="text" name="nom" placeholder="Nom">

                        <!-- prenom : -->
                        <input id="r_prenom" type="text" name="prenom" placeholder="Prenom">

                        <!-- pilote : -->
                        <select id="r_pilote" name="pilote">
                            <option value="">Choisiez un pilote</option>
                            {$pilote}
                        </select>

                        <!-- promotion : -->
                        <select id="r_promotion" name="promotion">
                            <option value="">Choisiez une promotion</option>
                            {$promotion}
                        </select>

                        <!-- spécialité : -->
                        <select id="r_specialite" name="specialite">
                            <option value="">Choisiez une spécialité</option>
                            {$specialite}
                        </select>

                        <!-- centre : -->
                        <select id="r_centre" name="centre">
                            <option value="">Choisiez un centre</option>
                            {$centre}
                        </select>

                        <input id="r_submit" type="submit" value="Rechercher">

                        <span id="close">
                            {$close|default:""}
                        </span>
                    </form>
                </div>

                <!-- Affichage : -->
                <div class="page">
                    {$pagination|default:""}
                </div>

                <div class="">
                    {$etudiant}
                </div>
            </fieldset>
        </article>

    </div>
</main>



    <script src="/public/js/Etudiant.js" charset="utf-8"></script>
</body>

{include file="./common/footer.tpl"}
