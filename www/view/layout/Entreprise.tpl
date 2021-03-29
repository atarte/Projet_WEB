{include file="./common/header.tpl" title={$title}}

<link rel="stylesheet" href="https://static.projet.com/css/Entreprise.css">

<body>
<main class="container">
    <nav>
        <a href="/Accueil"><button>Retour</button></a>
    </nav>

    <div class="row justify-content-between">
        <article class="col"  {$entreprise|default:""}>

            <!-- création entreprise -->
            <fieldset class="field">
                <legend id="legend_form">Création d'entreprise</legend>

                <form id="formulaire" class="form" action="/Entreprise/creation" method="post">
                    <div class="container">
                        <div class="row justify-content-center p-1">
                            <!-- nom : -->
                            <input id="nom" type="text" name="nom" placeholder="Nom" required>
                        </div>
                        <div class="row justify-content-center p-1">
							<!-- email : -->
                            <input id="email" type="text" name="email" placeholder="Email" required>
                        </div>
                        <div class="row justify-content-center p-1">
						<!-- adresse : -->
                            <input id="adresse" type="text" name="adresse" placeholder="Adresse" required>
                            <!-- <div id="adresse"></div> -->
                        </div>
                        <div class="row justify-content-center p-1">
						<!-- code postal : -->
                            <input id="code_p" type="text" name="code_p" placeholder="Code Postal" required>
                        </div>
                        <div class="row justify-content-center p-1">
						<!-- ville : <br> -->
                            <select id="ville" name="ville">
                                <option value="">Choisissez une ville</option>

                            </select>
                        </div>
						<div class="row justify-content-center p-1">
						<!-- region : -->
                            <input id="region" type="text" name="region" placeholder="Region" required readonly>
                        </div>
                        <div class="row justify-content-center p-1">
						<!-- stagiaire : -->
                            <input id="nombre_accepter" type="text" name="nombre_accepter" placeholder="NbStagiaireAccepté" required>
                        </div>
                        <div class="row justify-content-center p-1">
                            <!-- secteur : <br> -->
                            <select id="secteur" name="secteur" required>
                                <option value="">Choisissez un secteur</option>
                                {$Secteur}
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
                <legend>Liste des entreprises</legend>

                <div class="">
                    <!-- Barre de Recherche des Entreprises -->
                    <form id="recherche" action="/Entreprise/recherche" method="post">

                        <!-- Entreprise : -->
                        <select id="r_entreprise" name="entreprise" >
                            <option value="">Choisissez une entreprise</option>
                            {$Nom}
                        </select>

                        <!-- Ville : -->
                        <select id="r_ville" name="ville">
                            <option value="">Choisissez une ville</option>
                            {$Ville}
                        </select>

                        <!-- Region : -->
                        <select id="r_region" name="region">
                            <option value="">Choisissez la region</option>
                            {$Region}
                        </select>

                        <!-- Secteur : -->
                        <select id="r_secteur" name="secteur">
                            <option value="">Choisissez le secteur</option>
                            {$Secteur}
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
                    {$Entreprise}
                </div>
            </fieldset>
        </article>
    </div>
</main>

    <script src="/public/js/Entreprise.js" charset="utf-8"></script>
</body>

{include file="./common/footer.tpl"}
