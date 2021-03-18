<?php
/* Smarty version 3.1.39, created on 2021-03-18 16:35:08
  from 'D:\SCOLAIRE\CESI\2eme_annee\projet\WEB\Projet_WEB\www\view\layout\Connexion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6053813c1f6077_23058530',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ff15853d3aaf5b84008589979b8d46480cdaaa9e' => 
    array (
      0 => 'D:\\SCOLAIRE\\CESI\\2eme_annee\\projet\\WEB\\Projet_WEB\\www\\view\\layout\\Connexion.tpl',
      1 => 1616085224,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6053813c1f6077_23058530 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
</head>
<header>
    <?php echo (($tmp = @$_smarty_tpl->tpl_vars['erreur']->value)===null||$tmp==='' ? '' : $tmp);?>

</header>
<body>

    <form action="../../mvc/connexion/verification" method="POST">
        <fieldset>
            <legend>Connexion</legend>
            Identifiant :
            <input type="text" name="user" required>

            Mot de passe :
            <input type="password" name="pwd" required>

            <input type="submit" value="Connexion">
        </fieldset>
    </form>

</body>
</html>
<?php }
}
