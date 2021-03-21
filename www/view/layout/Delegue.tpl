{include file="./common/header.tpl" title={$title}}

<body>
    <a href="/Accueil"><button>Retour</button></a>

    {$erreur|default:''}

    <!-- création étudiant -->
    Barre de Creation/Modification des Delegue
    <form id="formulaire" action="/Delegue/creation" method="post">
        nom :
        <input id="nom" type="text" name="nom" required>

        prenom :
        <input id="prenom" type="text" name="prenom" required>

        email :
        <input id="email" type="email" name="email" required>

        <span id="pwd_div">
            password :
            <input "pwd" type="password" name="pwd" required>
        </span>

        gestion Entreprise :
        <input type="checkbox" name="gestion[]" value="entreprise">

        gestion Offre :
        <input type="checkbox" name="gestion[]" value="offre">

        gestion Pilote :
        <input type="checkbox" name="gestion[]" value="pilote">

        gestion Délégué :
        <input type="checkbox" name="gestion[]" value="delegue">

        gestion Etudiant :
        <input type="checkbox" name="gestion[]" value="etudiant">

        gestion Candidature :
        <input type="checkbox" name="gestion[]" value="candidature">

        <input id="submit" type="submit" value="Créer">
    </form>

    <div id="annuler">
    </div>

    <!-- Recherche Etudiant -->
    Barre de Recherche des Delegue
    <form id="recherche" action="/Delegue/recherche" method="post">
        nom :
        <input id="r_nom" type="text" name="nom">

        Prenom :
        <input id="r_prenom" type="text" name="prenom">

        <input id="r_submit" type="submit" value="Rechercher">
    </form>
    <a href="/Delegue"><button>X</button></a>

    <!-- Affichage : -->
    {$delegue}

    <div>
        {$pagination|default:""}
    </div>

    <script src="/public/js/Delegue.js" charset="utf-8"></script>
</body>


{include file="./common/footer.tpl"}
