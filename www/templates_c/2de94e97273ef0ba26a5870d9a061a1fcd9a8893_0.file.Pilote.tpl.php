<?php
/* Smarty version 3.1.39, created on 2021-03-19 17:23:12
  from 'C:\Users\catar\Documents\CESI\A2\4 - Web\Projet\Projet_WEB\www\view\layout\Pilote.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6054de0085da66_99223654',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2de94e97273ef0ba26a5870d9a061a1fcd9a8893' => 
    array (
      0 => 'C:\\Users\\catar\\Documents\\CESI\\A2\\4 - Web\\Projet\\Projet_WEB\\www\\view\\layout\\Pilote.tpl',
      1 => 1616174589,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./common/header.tpl' => 1,
    'file:./common/footer.tpl' => 1,
  ),
),false)) {
function content_6054de0085da66_99223654 (Smarty_Internal_Template $_smarty_tpl) {
ob_start();
echo $_smarty_tpl->tpl_vars['title']->value;
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_subTemplateRender("file:./common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>$_prefixVariable1), 0, false);
?>

<body>
  <form action="/Pilote/creation_pilote" method="post">

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
      <input type="text" name="pass" required>

      <br>
      <br>

      Centre : <br>
      <select name="centre" required>
        <?php echo $_smarty_tpl->tpl_vars['Centre']->value;?>

      </select>

      <br>
      <br>

      <input type="submit" name="Validation">
      <br>
      <br>

      <?php echo $_smarty_tpl->tpl_vars['Pilote']->value;?>


</body>

<?php $_smarty_tpl->_subTemplateRender("file:./common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}