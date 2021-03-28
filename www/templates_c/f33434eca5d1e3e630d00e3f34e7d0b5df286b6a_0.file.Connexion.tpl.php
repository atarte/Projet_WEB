<?php
/* Smarty version 3.1.39, created on 2021-03-28 12:02:03
  from 'C:\Users\catar\Documents\CESI\A2\4 - Web\Projet\Projet_WEB\www\view\layout\Connexion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6060703bdc5f73_25798378',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f33434eca5d1e3e630d00e3f34e7d0b5df286b6a' => 
    array (
      0 => 'C:\\Users\\catar\\Documents\\CESI\\A2\\4 - Web\\Projet\\Projet_WEB\\www\\view\\layout\\Connexion.tpl',
      1 => 1616931159,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./common/header.tpl' => 1,
    'file:./common/footer.tpl' => 1,
  ),
),false)) {
function content_6060703bdc5f73_25798378 (Smarty_Internal_Template $_smarty_tpl) {
ob_start();
echo $_smarty_tpl->tpl_vars['title']->value;
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_subTemplateRender("file:./common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>$_prefixVariable1), 0, false);
?>

<link rel="stylesheet" href="https://static.projet.com/css/Connexion.css">

<body>

<main class="connexion aff">
    <div class="aff">
        <fieldset>
            <legend>Connexion</legend>

            <form action="/Connexion/verification" method="POST">
                <div class="container">
                    <div class="row justify-content-center p-2">
                        <!-- errur : -->
                        <?php echo (($tmp = @$_smarty_tpl->tpl_vars['erreur']->value)===null||$tmp==='' ? '' : $tmp);?>

                    </div>
                    <div class="row justify-content-center">
                        <!-- Identifiant : -->
                        <input type="text" name="user" placeholder="Email" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['cookie']->value)===null||$tmp==='' ? '' : $tmp);?>
" required>
                    </div>
                    <div class="row justify-content-center p-2">
                        <!-- Mot de passe : -->
                        <input type="password" name="pwd" placeholder="Password" required>
                    </div>
                    <div class="row justify-content-center p-2">
                        <input type="submit" value="Connexion">
                    </div>
                </div>
            </form>
        </fieldset>
    </div>
</main>

</body>

<?php echo '<script'; ?>
 src="/public/js/Connexion.js" charset="utf-8"><?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:./common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
