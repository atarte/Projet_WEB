<?php
/* Smarty version 3.1.39, created on 2021-03-23 12:28:30
  from 'D:\SCOLAIRE\CESI\2eme_annee\projet\WEB\Projet_WEB\www\view\layout\Connexion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6059deeec783d7_13255200',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ff15853d3aaf5b84008589979b8d46480cdaaa9e' => 
    array (
      0 => 'D:\\SCOLAIRE\\CESI\\2eme_annee\\projet\\WEB\\Projet_WEB\\www\\view\\layout\\Connexion.tpl',
      1 => 1616502509,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./common/header.tpl' => 1,
    'file:./common/footer.tpl' => 1,
  ),
),false)) {
function content_6059deeec783d7_13255200 (Smarty_Internal_Template $_smarty_tpl) {
ob_start();
echo $_smarty_tpl->tpl_vars['title']->value;
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_subTemplateRender("file:./common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>$_prefixVariable1), 0, false);
?>

<link rel="stylesheet" href="http://static.projet.com/css/Connexion.css">

<body>

<main class="connexion aff">
    <div class="aff">
        <fieldset>
            <legend>Connexion</legend>

            <form action="/connexion/verification" method="POST">
                <div class="container">
                    <div class="row justify-content-center p-1">
                        <!-- errur : -->
                        <?php echo (($tmp = @$_smarty_tpl->tpl_vars['erreur']->value)===null||$tmp==='' ? '' : $tmp);?>

                    </div>
                    <div class="row justify-content-center">
                        <!-- Identifiant : -->
                        <input type="text" name="user" placeholder="Email" required>
                    </div>
                    <div class="row justify-content-center p-1">
                        <!-- Mot de passe : -->
                        <input type="password" name="pwd" placeholder="Password" required>
                    </div>
                    <div class="row justify-content-center p-1">
                        <input type="submit" value="Connexion">
                    </div>
                </div>
            </form>
        </fieldset>
    </div>
</main>

</body>

<?php $_smarty_tpl->_subTemplateRender("file:./common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
