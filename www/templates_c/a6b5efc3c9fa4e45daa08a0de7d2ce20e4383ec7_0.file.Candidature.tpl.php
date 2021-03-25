<?php
/* Smarty version 3.1.39, created on 2021-03-25 14:40:23
  from 'D:\SCOLAIRE\CESI\2eme_annee\projet\WEB\Projet_WEB\www\view\layout\Candidature.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_605ca0d7c58e56_61990907',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a6b5efc3c9fa4e45daa08a0de7d2ce20e4383ec7' => 
    array (
      0 => 'D:\\SCOLAIRE\\CESI\\2eme_annee\\projet\\WEB\\Projet_WEB\\www\\view\\layout\\Candidature.tpl',
      1 => 1616683217,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./common/header.tpl' => 1,
    'file:./common/footer.tpl' => 1,
  ),
),false)) {
function content_605ca0d7c58e56_61990907 (Smarty_Internal_Template $_smarty_tpl) {
ob_start();
echo $_smarty_tpl->tpl_vars['title']->value;
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_subTemplateRender("file:./common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>$_prefixVariable1), 0, false);
?>

<link rel="stylesheet" href="http://static.projet.com/css/Candidature.css">

<body>

<main class="container">
    <nav>
        <a href="/Accueil"><button>Retour</button></a>
        <a href="/Wishlist" <?php echo (($tmp = @$_smarty_tpl->tpl_vars['wishlist']->value)===null||$tmp==='' ? '' : $tmp);?>
><button>Wishlist</button></a>
    </nav>

    <div class="row justify-content-between">
        <article class="col">

            <!-- création étudiant -->
            <fieldset class="field">
                <legend id="legend_form">Liste des candidatures</legend>

                <!-- affichages des stages postulé -->
                <div class="">
                    <?php echo $_smarty_tpl->tpl_vars['candidature']->value;?>

                </div>
            </fieldset>
        </article>
    </div>
</main>

</body>

<?php echo '<script'; ?>
 src="/public/js/Candidature.js" charset="utf-8"><?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:./common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
