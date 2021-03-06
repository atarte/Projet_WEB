<?php
/* Smarty version 3.1.39, created on 2021-03-28 11:34:34
  from 'D:\SCOLAIRE\CESI\2eme_annee\projet\WEB\Projet_WEB\www\view\layout\Delegue.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_606069ca741630_86829916',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ab980d4a5fa6ffc65d75ee3e7fe09d250e5ac59d' => 
    array (
      0 => 'D:\\SCOLAIRE\\CESI\\2eme_annee\\projet\\WEB\\Projet_WEB\\www\\view\\layout\\Delegue.tpl',
      1 => 1616931069,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./common/header.tpl' => 1,
    'file:./common/footer.tpl' => 1,
  ),
),false)) {
function content_606069ca741630_86829916 (Smarty_Internal_Template $_smarty_tpl) {
ob_start();
echo $_smarty_tpl->tpl_vars['title']->value;
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_subTemplateRender("file:./common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>$_prefixVariable1), 0, false);
?>

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
                            <?php echo (($tmp = @$_smarty_tpl->tpl_vars['erreur']->value)===null||$tmp==='' ? '' : $tmp);?>

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
                            gestion Entreprise :
                            <input id="entreprise" type="checkbox" name="gestion[]" value="entreprise">
                        </div>
                        <div class="row justify-content-center p-1">
                            gestion Offre :
                            <input id="offre" type="checkbox" name="gestion[]" value="offre">
                        </div>
                        <div class="row justify-content-center p-1">
                            gestion Pilote :
                            <input id="pilote" type="checkbox" name="gestion[]" value="pilote">
                        </div>
                        <div class="row justify-content-center p-1">
                            gestion Délégué :
                            <input id="delegue" type="checkbox" name="gestion[]" value="delegue">
                        </div>
                        <div class="row justify-content-center p-1">
                            gestion Etudiant :
                            <input id="etudiant" type="checkbox" name="gestion[]" value="etudiant">
                        </div>
                        <div class="row justify-content-center p-1">
                            gestion Candidature :
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
                            <?php echo (($tmp = @$_smarty_tpl->tpl_vars['close']->value)===null||$tmp==='' ? '' : $tmp);?>

                        </span>
                    </form>
                </div>

                <!-- Affichage : -->
                <div class="page">
                    <?php echo (($tmp = @$_smarty_tpl->tpl_vars['pagination']->value)===null||$tmp==='' ? '' : $tmp);?>

                </div>

                <div>
                    <?php echo $_smarty_tpl->tpl_vars['delegue']->value;?>

                </div>
            </fieldset>
        </article>
    </div>
</main>

    <?php echo '<script'; ?>
 src="/public/js/Delegue.js" charset="utf-8"><?php echo '</script'; ?>
>
</body>


<?php $_smarty_tpl->_subTemplateRender("file:./common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
