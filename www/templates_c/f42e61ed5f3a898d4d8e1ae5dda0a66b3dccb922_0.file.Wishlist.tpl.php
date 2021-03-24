<?php
/* Smarty version 3.1.39, created on 2021-03-24 14:00:23
  from 'C:\Users\catar\Documents\CESI\A2\4 - Web\Projet\Projet_WEB\www\view\layout\Wishlist.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_605b45f79fc3b7_67417442',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f42e61ed5f3a898d4d8e1ae5dda0a66b3dccb922' => 
    array (
      0 => 'C:\\Users\\catar\\Documents\\CESI\\A2\\4 - Web\\Projet\\Projet_WEB\\www\\view\\layout\\Wishlist.tpl',
      1 => 1616593682,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./common/header.tpl' => 1,
    'file:./common/footer.tpl' => 1,
  ),
),false)) {
function content_605b45f79fc3b7_67417442 (Smarty_Internal_Template $_smarty_tpl) {
ob_start();
echo $_smarty_tpl->tpl_vars['title']->value;
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_subTemplateRender("file:./common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>$_prefixVariable1), 0, false);
?>

<link rel="stylesheet" href="http://static.projet.com/css/Wishlist.css">

<body>

<main class="container">
    <nav>
        <a href="/Candidature"><button>Retour</button></a>
    </nav>

    <div class="row justify-content-between">
        <article class="col">

            <!-- création étudiant -->
            <fieldset class="field">
                <legend id="legend_form">WishList</legend>

                <!-- affichages des stages postulé -->


            </fieldset>
        </article>
    </div>
</main>

</body>

<?php echo '<script'; ?>
 src="/public/js/Wishlist.js" charset="utf-8"><?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:./common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
