<?php
/* Smarty version 3.1.39, created on 2021-03-21 18:35:16
  from 'C:\Users\catar\Documents\CESI\A2\4 - Web\Projet\Projet_WEB\www\view\layout\Etudiant.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_605791e427f582_72196501',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '50420dd6d7c3b0fb12bc662291ddbb44af8f7292' => 
    array (
      0 => 'C:\\Users\\catar\\Documents\\CESI\\A2\\4 - Web\\Projet\\Projet_WEB\\www\\view\\layout\\Etudiant.tpl',
      1 => 1616350538,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./common/header.tpl' => 1,
    'file:./common/footer.tpl' => 1,
  ),
),false)) {
function content_605791e427f582_72196501 (Smarty_Internal_Template $_smarty_tpl) {
ob_start();
echo $_smarty_tpl->tpl_vars['title']->value;
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_subTemplateRender("file:./common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>$_prefixVariable1), 0, false);
?>

<body>
    <a href="/Accueil"><button>Retour</button></a>

    <?php echo (($tmp = @$_smarty_tpl->tpl_vars['erreur']->value)===null||$tmp==='' ? '' : $tmp);?>


    <!-- création étudiant -->
    Barre de Creation/Modification des étudiants
    <form id="formulaire" action="/Etudiant/creation" method="post">
        nom :
        <input id="nom" type="text" name="nom" required>

        Prenom :
        <input id="prenom" type="text" name="prenom" required>

        email :
        <input id="email" type="email" name="email" required>

        <span id="pwd_div">
            password :
            <input "pwd" type="password" name="pwd" required>
        </span>

        pilote :
        <select id="pilote" name="pilote" required>
            <option value="">Choisiez un pilote</option>
            <?php echo $_smarty_tpl->tpl_vars['pilote']->value;?>

        </select>

        promotion :
        <select id="promotion" name="promotion" required>
            <option value="">Choisiez une promotion</option>
            <?php echo $_smarty_tpl->tpl_vars['promotion']->value;?>

        </select>

        spécialité :
        <select id="specialite" name="specialite" required>
            <option value="">Choisiez une spécialité</option>
            <?php echo $_smarty_tpl->tpl_vars['specialite']->value;?>

        </select>

        <input id="submit" type="submit" value="Créer">
    </form>

    <div id="annuler">
    </div>

    <!-- Recherche Etudiant -->
    Barre de Recherche des étudiants
    <form id="recherche" action="/Etudiant/recherche" method="post">
        nom :
        <input id="r_nom" type="text" name="nom">

        Prenom :
        <input id="r_prenom" type="text" name="prenom">

        pilote :
        <select id="r_pilote" name="pilote">
            <option value="">Choisiez un pilote</option>
            <?php echo $_smarty_tpl->tpl_vars['pilote']->value;?>

        </select>

        promotion :
        <select id="r_promotion" name="promotion">
            <option value="">Choisiez une promotion</option>
            <?php echo $_smarty_tpl->tpl_vars['promotion']->value;?>

        </select>

        spécialité :
        <select id="r_specialite" name="specialite">
            <option value="">Choisiez une spécialité</option>
            <?php echo $_smarty_tpl->tpl_vars['specialite']->value;?>

        </select>

        centre :
        <select id="r_centre" name="centre">
            <option value="">Choisiez un centre</option>
            <?php echo $_smarty_tpl->tpl_vars['centre']->value;?>

        </select>

        <input id="r_submit" type="submit" value="Rechercher">
    </form>
    <a href="/Etudiant"><button>X</button></a>

    <!-- Affichage : -->
    <?php echo $_smarty_tpl->tpl_vars['etudiant']->value;?>


    <div>
        <?php echo (($tmp = @$_smarty_tpl->tpl_vars['pagination']->value)===null||$tmp==='' ? '' : $tmp);?>

    </div>

    <?php echo '<script'; ?>
 src="/public/js/Etudiant.js" charset="utf-8"><?php echo '</script'; ?>
>
</body>

<?php $_smarty_tpl->_subTemplateRender("file:./common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
