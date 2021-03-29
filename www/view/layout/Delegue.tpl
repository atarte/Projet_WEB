{include file="./common/header.tpl" title={$title}}

<link rel="stylesheet" href="https://static.projet.com/css/Delegue.css">

<body>
<main class="container">
    <nav>
        <a href="/Accueil"><button>Retour</button></a>
    </nav>

    <div class="row justify-content-between">
        <article class="col">

            <!-- création étudiant -->
            <fieldset class="field">
                <legend id="legend_form">Création de délégué</legend>

                <form id="formulaire" class="form" action="/Delegue/creation" method="post">
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
                            Gestion Entreprise :
                            <input id="entreprise" type="checkbox" name="gestion[]" value="entreprise">
                        </div>
                        <div class="row justify-content-center p-1">
                            Gestion Offre :
                            <input id="offre" type="checkbox" name="gestion[]" value="offre">
                        </div>
                        <div class="row justify-content-center p-1">
                            Gestion Pilote :
                            <input id="pilote" type="checkbox" name="gestion[]" value="pilote">
                        </div>
                        <div class="row justify-content-center p-1">
                            Gestion Délégué :
                            <input id="delegue" type="checkbox" name="gestion[]" value="delegue">
                        </div>
                        <div class="row justify-content-center p-1">
                            Gestion Etudiant :
                            <input id="etudiant" type="checkbox" name="gestion[]" value="etudiant">
                        </div>
                        <div class="row justify-content-center p-1">
                            Gestion Candidature :
                            <input id="candidature" type="checkbox" name="gestion[]" value="candidature">
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
                <legend>Liste des délégués</legend>

                <!-- Recherche Etudiant -->
                <div class="">
                    <form id="recherche" action="/Delegue/recherche" method="post">
                        <!-- nom : -->
                        <input id="r_nom" type="text" name="nom" placeholder="Nom">

                        <!-- Prenom : -->
                        <input id="r_prenom" type="text" name="prenom" placeholder="Prenom">

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

                <div>
                    {$delegue}
                </div>
            </fieldset>
        </article>
    </div>
</main>

    <script src="/public/js/Delegue.js" charset="utf-8"></script>
</body>


{include file="./common/footer.tpl"}
