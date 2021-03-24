{include file="./common/header.tpl" title={$title}}

<link rel="stylesheet" href="http://static.projet.com/css/Offre.css">

<body>
{$role}
<main class="container">
    <nav>
        <a href="/Accueil"><button>Retour</button></a>
    </nav>

    <div class="row justify-content-between">
        <article class="col" id="art_form" {$etudiant|default: ""}>

            <!-- création étudiant -->
            <fieldset class="field">
                <legend id="legend_form">Création d'une offre de Stage</legend>

                <form id="formulaire" class="form" action="/Offre/creation" method="post">
                    <div class="container">
                        <div class="row justify-content-center p-1">
                            <!-- nom : -->
                            <input id="nom" type="text" name="nom" placeholder="Nom" required>
                        </div>
                        <div class="row justify-content-center p-1">
                            <!-- Type de Promotion : <br> -->
                            <select id="specialite" name="specialite" required>
                                <option value="">Choississez une spécialité</option>
                                {$Type}
                            </select>
                        </div>
                        <div class="row justify-content-center p-1">
                            <!-- Entreprise : <br> -->
                            <select id="entreprise" name="entreprise" required>
                                <option value="">Choississez une entreprise</option>
                                {$Entreprise}
                            </select>
                        </div>
                        <div class="row justify-content-center p-1">
                            <!-- Ville : <br> -->
                            <select id="ville" name="ville">
                                <option value="">Choisiez une ville</option>
                                {$Ville}
                            </select>
                        </div>
                        <div class="row justify-content-center p-1">
                            <!-- Email : <br> -->
                            <input id="email" type="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="row justify-content-center p-1">
                            <!-- Durée : <br> -->
                            <input id="duree" type="text" name="duree" placeholder="Durée" required>
                        </div>
                        <div class="row justify-content-center p-1">
                            <!-- Compétences : <br> -->
                            <input id="competences" type="text" name="competences" placeholder="Compétence(s)" required>
                            <!-- <button onclick="add()">+</button> -->
                            <!-- <div id="plus_comp"></div> -->
                        </div>
                        <div class="row justify-content-center p-1">
                            <!-- Nombre de place(s) : <br> -->
                            <input id="nb_place" type="text" name="nb_place" placeholder="Nombre de place(s)" required>
                        </div>
                        <div class="row justify-content-center p-1">
                            <!-- Rémunération : <br> -->
                            <input id="remuneration" type="text" name="remuneration" placeholder="Rémunération" required>
                        </div>
                        <div class="row justify-content-center p-1">
                            <!-- Date : <br> -->
                            <input id="date" type="date" name="date" placeholder="Date" required>
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
                <legend>Liste des Stages</legend>

                <div class="">
                    <!-- Barre de Recherche des Offres -->
                    <form id="recherche" action="/Offre/recherche" method="post">

                        <!-- Entreprise : -->
                        <select id="r_entreprise" name="entreprise" >
                            <option value="">Choississez une entreprise</option>
                            {$Entreprise}
                        </select>

                        <!-- Ville : -->
                        <select id="r_ville" name="ville">
                            <option value="">Choisiez une ville</option>
                            {$Ville}
                        </select>

                        <!-- Compétences : -->
                        <select id="r_competence" name="competence">
                            <option value="">Choisiez le(s) Compétence(s)</option>
                            {$Competence}
                        </select>

                        <!-- Durée : -->
                        <select id="r_durer" name="durer">
                            <option value="">Choisiez la Durée de votre stage</option>
                            {$Durer}
                        </select>

                        <!-- Rémunération : -->
                        <select id="r_remuneration" name="remuneration">
                            <option value="">Choisiez une rémunération</option>
                            <option value="0"> Non rémunéré </option>
                            <option value="100"> > 100 </option>
                            <option value="300"> > 300 </option>
                            <option value="500"> > 500 </option>
                            <option value="700"> > 700 </option>
                            <option value="1000"> > 1000 </option>
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
                    {$Offre}
                </div>
            </fieldset>
        </article>
    </div>
</main>

    <script src="/public/js/Offre.js" charset="utf-8"></script>
</body>

{include file="./common/footer.tpl"}
