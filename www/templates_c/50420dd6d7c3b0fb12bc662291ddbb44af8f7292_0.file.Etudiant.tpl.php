<?php
/* Smarty version 3.1.39, created on 2021-03-19 14:12:00
  from 'C:\Users\catar\Documents\CESI\A2\4 - Web\Projet\Projet_WEB\www\view\layout\Etudiant.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6054b13095d1f3_50049933',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '50420dd6d7c3b0fb12bc662291ddbb44af8f7292' => 
    array (
      0 => 'C:\\Users\\catar\\Documents\\CESI\\A2\\4 - Web\\Projet\\Projet_WEB\\www\\view\\layout\\Etudiant.tpl',
      1 => 1616162074,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./common/header.tpl' => 1,
    'file:./common/footer.tpl' => 1,
  ),
),false)) {
function content_6054b13095d1f3_50049933 (Smarty_Internal_Template $_smarty_tpl) {
ob_start();
echo $_smarty_tpl->tpl_vars['title']->value;
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_subTemplateRender("file:./common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>$_prefixVariable1), 0, false);
?>

<body>
    <!-- création étudiant -->
    <form action="./creation" method="post">
        nom :
        <input type="text" name="nom" required>

        Prenom :
        <input type="text" name="prenom" required>

        email :
        <input type="email" name="email" required>

        password :
        <input type="password" name="pwd" required>

        pilote :
        <select name="pilote" required>
            <option value="">Choisiez un pilote</option>
            <?php echo $_smarty_tpl->tpl_vars['pilote']->value;?>

        </select>

        promotion :
        <select name="promotion" required>
            <option value="">Choisiez une promotion</option>
            <?php echo $_smarty_tpl->tpl_vars['promotion']->value;?>

        </select>

        spécialité :
        <select name="specialite" required>
            <option value="">Choisiez une spécialité</option>
            <?php echo $_smarty_tpl->tpl_vars['specialite']->value;?>

        </select>
        <input type="submit" value="crée">
    </form>

    <?php echo $_smarty_tpl->tpl_vars['etudiant']->value;?>

</body>

<?php $_smarty_tpl->_subTemplateRender("file:./common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
