<?php
/* Smarty version 3.1.39, created on 2021-03-20 21:08:38
  from 'D:\SCOLAIRE\CESI\2eme_annee\projet\WEB\Projet_WEB\www\view\layout\Etudiant.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60566456dfd5c0_56782411',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4bbf89a610c58c5a621a3b6f426a96fac3bc4c9d' => 
    array (
      0 => 'D:\\SCOLAIRE\\CESI\\2eme_annee\\projet\\WEB\\Projet_WEB\\www\\view\\layout\\Etudiant.tpl',
      1 => 1616274515,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./common/header.tpl' => 1,
    'file:./common/footer.tpl' => 1,
  ),
),false)) {
function content_60566456dfd5c0_56782411 (Smarty_Internal_Template $_smarty_tpl) {
ob_start();
echo $_smarty_tpl->tpl_vars['title']->value;
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_subTemplateRender("file:./common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>$_prefixVariable1), 0, false);
?>

<body>
    <a href="/Accueil">retour</a>

    <?php echo (($tmp = @$_smarty_tpl->tpl_vars['erreur']->value)===null||$tmp==='' ? '' : $tmp);?>


    <!-- création étudiant -->
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

    <?php echo $_smarty_tpl->tpl_vars['etudiant']->value;?>


    <div>
        <?php echo $_smarty_tpl->tpl_vars['pagination']->value;?>

    </div>

    <?php echo '<script'; ?>
 src="/public/js/Etudiant.js" charset="utf-8"><?php echo '</script'; ?>
>
</body>

<?php $_smarty_tpl->_subTemplateRender("file:./common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
