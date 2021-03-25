<?php
/* Smarty version 3.1.39, created on 2021-03-25 20:00:36
  from 'D:\SCOLAIRE\CESI\2eme_annee\projet\WEB\Projet_WEB\www\view\layout\Wishlist.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_605cebe433a5e0_62994471',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5f40c6d6c24b82a186f01881cdfbc092107877e8' => 
    array (
      0 => 'D:\\SCOLAIRE\\CESI\\2eme_annee\\projet\\WEB\\Projet_WEB\\www\\view\\layout\\Wishlist.tpl',
      1 => 1616702426,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./common/header.tpl' => 1,
    'file:./common/footer.tpl' => 1,
  ),
),false)) {
function content_605cebe433a5e0_62994471 (Smarty_Internal_Template $_smarty_tpl) {
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
            <fieldset class="fieldconst">
                <legend id="legend_form">WishList</legend>

                <!-- affichages des stages postulé -->
                <div class="">
                    <?php echo $_smarty_tpl->tpl_vars['Offre']->value;?>

                </div>

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
