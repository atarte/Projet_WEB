<?php
/* Smarty version 3.1.39, created on 2021-03-21 14:01:03
  from 'D:\SCOLAIRE\CESI\2eme_annee\projet\WEB\Projet_WEB\www\view\layout\Pilote.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6057519f7d05b4_76133922',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0c9267f11a73835fa1277f26300c5f04970873e1' => 
    array (
      0 => 'D:\\SCOLAIRE\\CESI\\2eme_annee\\projet\\WEB\\Projet_WEB\\www\\view\\layout\\Pilote.tpl',
      1 => 1616335260,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./common/header.tpl' => 1,
    'file:./common/footer.tpl' => 1,
  ),
),false)) {
function content_6057519f7d05b4_76133922 (Smarty_Internal_Template $_smarty_tpl) {
ob_start();
echo $_smarty_tpl->tpl_vars['title']->value;
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_subTemplateRender("file:./common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>$_prefixVariable1), 0, false);
?>

<header>
    <?php echo (($tmp = @$_smarty_tpl->tpl_vars['erreur']->value)===null||$tmp==='' ? '' : $tmp);?>

</header>

<body>

  <a href="/Accueil"><button>Retour</button></a>
  <br><br>
  <form action="/Pilote/creation_pilote" method="post" id="formulaire">

      Nom : <br>
      <input type="text" name="nom" required>

      <br>
      <br>

      Prenom : <br>
      <input type="text" name="prenom" required>

      <br>
      <br>

      Mail : <br>
      <input type="email" name="mail" required>

      <br>
      <br>

      Password : <br>
      <input type="password" name="pass" id="pass" required>

      <br>
      <br>

      Centre : <br>
      <select name="centre" required>
        <option value="">--Choississez votre centre--</option>
        <?php echo $_smarty_tpl->tpl_vars['Centre']->value;?>

      </select>

      <br>
      <br>

      <input type="submit" name="Validation" value="Créer" id="submit">
      <br>

    </form>

    <div id="annuler">
    </div>

    <br>

    <!--<form action="/Pilote/supprime_pilote" method="post">-->
      <?php echo $_smarty_tpl->tpl_vars['Pilote']->value;?>

    <!--</form>-->

    <div>
        <?php echo $_smarty_tpl->tpl_vars['pagination']->value;?>

    </div>

    <?php echo '<script'; ?>
 src="/public/js/Pilote.js" charset="utf-8"><?php echo '</script'; ?>
>
</body>

<?php $_smarty_tpl->_subTemplateRender("file:./common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
