<?php
/* Smarty version 3.1.39, created on 2021-03-22 12:49:29
  from 'C:\Users\catar\Documents\CESI\A2\4 - Web\Projet\Projet_WEB\www\view\layout\Offre.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60589259e65c30_72814924',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5316064743d807fa49f515a4d61122fb6f690608' => 
    array (
      0 => 'C:\\Users\\catar\\Documents\\CESI\\A2\\4 - Web\\Projet\\Projet_WEB\\www\\view\\layout\\Offre.tpl',
      1 => 1616417367,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./common/header.tpl' => 1,
    'file:./common/footer.tpl' => 1,
  ),
),false)) {
function content_60589259e65c30_72814924 (Smarty_Internal_Template $_smarty_tpl) {
ob_start();
echo $_smarty_tpl->tpl_vars['title']->value;
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_subTemplateRender("file:./common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>$_prefixVariable1), 0, false);
?>

<body>
    <a href="/Accueil"><button>Retour</button></a>
    <br><br>
    <!-- <form action="/Offre/creation" method="post" id="formulaire"> -->

        Nom : <br>
        <input id="nom" type="text" name="nom" required>

        <br>
        <br>

        Type de Promotion : <br>
        <select id="specialite" name="specialite" required>
            <option value="">--Choississez une spécialité--</option>
            <?php echo $_smarty_tpl->tpl_vars['Type']->value;?>

        </select>

        <br>
        <br>

        Entreprise : <br>
        <select id="entreprise" name="entreprise" required>
            <option value="">--Choississez une entreprise--</option>
            <?php echo $_smarty_tpl->tpl_vars['Entreprise']->value;?>

        </select>

        <br>
        <br>

        Ville : <br>
        <select id="r_ville" name="ville">
            <option value="">--Choisiez une ville--</option>
            <?php echo $_smarty_tpl->tpl_vars['Ville']->value;?>

        </select>

        <br>
        <br>

        Email : <br>
        <input id="email" type="email" name="email" required>

        <br>
        <br>

        Durée : <br>
        <input id="duree" type="text" name="duree" required>

        <br>
        <br>

        Compétences : <br>
        <input id="competences" type="text" name="competences" required>
        <button onclick="add()">+</button>
        <div id="plus_comp"></div>

        <br>
        <br>

        Nombre de place(s) : <br>
        <input id="nb_place" type="text" name="nb_place" required>

        <br>
        <br>

        Rémunération : <br>
        <input id="remuneration" type="text" name="remuneration" required>

        <br>
        <br>

        Date : <br>
        <input id="date" type="date" name="date" required>

        <br>
        <br>

        <input type="submit" value="Créer" id="submit">
        <br>

      </form>

      <div id="annuler">
      </div>

      <br>

      Barre de Recherche des Offres
      <!-- <form id="recherche" action="/Offre/recherche" method="post"> -->
          Nom :
          <input id="r_nom" type="text" name="nom">

          Entreprise :
          <input id="r_entreprise" type="text" name="entreprise">

          Ville :
          <select id="r_ville" name="ville">
              <option value="">--Choisiez une ville--</option>
              <?php echo $_smarty_tpl->tpl_vars['Ville']->value;?>

          </select>

          <input id="r_submit" type="submit" value="Rechercher">
      </form>
      <a href="/Pilote"><button>X</button></a><br><br>

        <?php echo $_smarty_tpl->tpl_vars['Offre']->value;?>

        <?php echo $_smarty_tpl->tpl_vars['Competence']->value;?>


      <div>
          <!-- <?php echo (($tmp = @$_smarty_tpl->tpl_vars['pagination']->value)===null||$tmp==='' ? '' : $tmp);?>
 -->
      </div>

      <?php echo '<script'; ?>
 src="/public/js/Offre.js" charset="utf-8"><?php echo '</script'; ?>
>
</body>

<?php $_smarty_tpl->_subTemplateRender("file:./common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
