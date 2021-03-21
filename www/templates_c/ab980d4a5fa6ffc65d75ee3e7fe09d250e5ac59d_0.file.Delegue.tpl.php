<?php
/* Smarty version 3.1.39, created on 2021-03-21 22:11:38
  from 'D:\SCOLAIRE\CESI\2eme_annee\projet\WEB\Projet_WEB\www\view\layout\Delegue.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6057c49a846093_32061625',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ab980d4a5fa6ffc65d75ee3e7fe09d250e5ac59d' => 
    array (
      0 => 'D:\\SCOLAIRE\\CESI\\2eme_annee\\projet\\WEB\\Projet_WEB\\www\\view\\layout\\Delegue.tpl',
      1 => 1616364345,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./common/header.tpl' => 1,
    'file:./common/footer.tpl' => 1,
  ),
),false)) {
function content_6057c49a846093_32061625 (Smarty_Internal_Template $_smarty_tpl) {
ob_start();
echo $_smarty_tpl->tpl_vars['title']->value;
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_subTemplateRender("file:./common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>$_prefixVariable1), 0, false);
?>

<body>
    <a href="/Accueil"><button>Retour</button></a>

    <?php echo (($tmp = @$_smarty_tpl->tpl_vars['erreur']->value)===null||$tmp==='' ? '' : $tmp);?>


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
        <input id="entreprise" type="checkbox" name="gestion[]" value="entreprise">

        gestion Offre :
        <input id="offre" type="checkbox" name="gestion[]" value="offre">

        gestion Pilote :
        <input id="pilote" type="checkbox" name="gestion[]" value="pilote">

        gestion Délégué :
        <input id="delegue" type="checkbox" name="gestion[]" value="delegue">

        gestion Etudiant :
        <input id="etudiant" type="checkbox" name="gestion[]" value="etudiant">

        gestion Candidature :
        <input id="candidature" type="checkbox" name="gestion[]" value="candidature">

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
    <?php echo $_smarty_tpl->tpl_vars['delegue']->value;?>


    <div>
        <?php echo (($tmp = @$_smarty_tpl->tpl_vars['pagination']->value)===null||$tmp==='' ? '' : $tmp);?>

    </div>

    <?php echo '<script'; ?>
 src="/public/js/Delegue.js" charset="utf-8"><?php echo '</script'; ?>
>
</body>


<?php $_smarty_tpl->_subTemplateRender("file:./common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
