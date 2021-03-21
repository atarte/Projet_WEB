<?php
/* Smarty version 3.1.39, created on 2021-03-21 13:56:01
  from 'C:\Users\catar\Documents\CESI\A2\4 - Web\Projet\Projet_WEB\www\view\layout\Pilote.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_605750717fd740_25550799',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2de94e97273ef0ba26a5870d9a061a1fcd9a8893' => 
    array (
      0 => 'C:\\Users\\catar\\Documents\\CESI\\A2\\4 - Web\\Projet\\Projet_WEB\\www\\view\\layout\\Pilote.tpl',
      1 => 1616334959,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./common/header.tpl' => 1,
    'file:./common/footer.tpl' => 1,
  ),
),false)) {
function content_605750717fd740_25550799 (Smarty_Internal_Template $_smarty_tpl) {
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
