<?php
/* Smarty version 3.1.39, created on 2021-03-23 15:47:53
  from 'C:\Users\catar\Documents\CESI\A2\4 - Web\Projet\Projet_WEB\www\view\layout\Accueil.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_605a0da91eaff3_06870635',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a9d59f3d80ac697f4f9b65b58b3fed6c0af6f11e' => 
    array (
      0 => 'C:\\Users\\catar\\Documents\\CESI\\A2\\4 - Web\\Projet\\Projet_WEB\\www\\view\\layout\\Accueil.tpl',
      1 => 1616514471,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./common/header.tpl' => 1,
    'file:./common/footer.tpl' => 1,
  ),
),false)) {
function content_605a0da91eaff3_06870635 (Smarty_Internal_Template $_smarty_tpl) {
ob_start();
echo $_smarty_tpl->tpl_vars['title']->value;
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_subTemplateRender("file:./common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>$_prefixVariable1), 0, false);
?>

<link rel="stylesheet" href="http://static.projet.com/css/Accueil.css">

<body>

<main class="accueil aff">

    <nav class="aff">
        <fieldset>
            <legend>Interface <?php echo (($tmp = @$_smarty_tpl->tpl_vars['role']->value)===null||$tmp==='' ? '' : $tmp);?>
</legend>
            <div class="container">
                <div class="row justify-content-center p-2">
                    <a href="/Accueil/deconnexion"><button>Deconnexion</button></a>
                </div>
                <?php echo $_smarty_tpl->tpl_vars['button']->value;?>

            </div>
        </fieldset>
    </nav>
</main>

</body>

<?php $_smarty_tpl->_subTemplateRender("file:./common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
