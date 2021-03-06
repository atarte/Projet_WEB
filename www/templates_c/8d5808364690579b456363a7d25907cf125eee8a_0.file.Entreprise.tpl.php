<?php
/* Smarty version 3.1.39, created on 2021-03-29 15:41:20
  from 'D:\SCOLAIRE\CESI\2eme_annee\projet\WEB\Projet_WEB\www\view\layout\Entreprise.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6061f520f127e8_22330609',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8d5808364690579b456363a7d25907cf125eee8a' => 
    array (
      0 => 'D:\\SCOLAIRE\\CESI\\2eme_annee\\projet\\WEB\\Projet_WEB\\www\\view\\layout\\Entreprise.tpl',
      1 => 1617032414,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./common/header.tpl' => 1,
    'file:./common/footer.tpl' => 1,
  ),
),false)) {
function content_6061f520f127e8_22330609 (Smarty_Internal_Template $_smarty_tpl) {
ob_start();
echo $_smarty_tpl->tpl_vars['title']->value;
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_subTemplateRender("file:./common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>$_prefixVariable1), 0, false);
?>

<link rel="stylesheet" href="https://static.projet.com/css/Entreprise.css">

<body>
<main class="container">
    <nav>
        <a href="/Accueil"><button>Retour</button></a>
    </nav>

    <div class="row justify-content-between">
        <article class="col"  <?php echo (($tmp = @$_smarty_tpl->tpl_vars['entreprise']->value)===null||$tmp==='' ? '' : $tmp);?>
>

            <!-- création entreprise -->
            <fieldset class="field">
                <legend id="legend_form">Création d'entreprise</legend>

                <form id="formulaire" class="form" action="/Entreprise/creation" method="post">
                    <div class="container">
                        <div class="row justify-content-center p-1">
                            <!-- nom : -->
                            <input id="nom" type="text" name="nom" placeholder="Nom" required>
                        </div>
                        <div class="row justify-content-center p-1">
							<!-- email : -->
                            <input id="email" type="text" name="email" placeholder="Email" required>
                        </div>
                        <div class="row justify-content-center p-1">
						<!-- adresse : -->
                            <input id="adresse" type="text" name="adresse" placeholder="Adresse" required>
                            <!-- <div id="adresse"></div> -->
                        </div>
                        <div class="row justify-content-center p-1">
						<!-- code postal : -->
                            <input id="code_p" type="text" name="code_p" placeholder="Code Postal" required>
                        </div>
                        <div class="row justify-content-center p-1">
						<!-- ville : <br> -->
                            <select id="ville" name="ville">
                                <option value="">Choisissez une ville</option>

                            </select>
                        </div>
						<div class="row justify-content-center p-1">
						<!-- region : -->
                            <input id="region" type="text" name="region" placeholder="Region" required readonly>
                        </div>
                        <div class="row justify-content-center p-1">
						<!-- stagiaire : -->
                            <input id="nombre_accepter" type="text" name="nombre_accepter" placeholder="NbStagiaireAccepté" required>
                        </div>
                        <div class="row justify-content-center p-1">
                            <!-- secteur : <br> -->
                            <select id="secteur" name="secteur" required>
                                <option value="">Choisissez un secteur</option>
                                <?php echo $_smarty_tpl->tpl_vars['Secteur']->value;?>

                            </select>
                        </div>

                        <div class="row justify-content-center p-1">
                            <input type="submit" value="Créer" id="submit">
                        </div>
                </form>
                        <div class="row justify-content-center p-1">
                            <span id="annuler">
                            </span>
                        </div>
                    </div>
            </fieldset>
        </article>

        <article class="col">
            <fieldset class="field">
                <legend>Liste des entreprises</legend>

                <div class="">
                    <!-- Barre de Recherche des Entreprises -->
                    <form id="recherche" action="/Entreprise/recherche" method="post">

                        <!-- Entreprise : -->
                        <select id="r_entreprise" name="entreprise" >
                            <option value="">Choisissez une entreprise</option>
                            <?php echo $_smarty_tpl->tpl_vars['Nom']->value;?>

                        </select>

                        <!-- Ville : -->
                        <select id="r_ville" name="ville">
                            <option value="">Choisissez une ville</option>
                            <?php echo $_smarty_tpl->tpl_vars['Ville']->value;?>

                        </select>

                        <!-- Region : -->
                        <select id="r_region" name="region">
                            <option value="">Choisissez la region</option>
                            <?php echo $_smarty_tpl->tpl_vars['Region']->value;?>

                        </select>

                        <!-- Secteur : -->
                        <select id="r_secteur" name="secteur">
                            <option value="">Choisissez le secteur</option>
                            <?php echo $_smarty_tpl->tpl_vars['Secteur']->value;?>

                        </select>



                        <input id="r_submit" type="submit" value="Rechercher">

                        <span id="close">
                            <?php echo (($tmp = @$_smarty_tpl->tpl_vars['close']->value)===null||$tmp==='' ? '' : $tmp);?>

                        </span>
                    </form>
                </div>

                <!-- Affichage : -->
                <div class="page">
                    <?php echo (($tmp = @$_smarty_tpl->tpl_vars['pagination']->value)===null||$tmp==='' ? '' : $tmp);?>

                </div>

                <div class="">
                    <?php echo $_smarty_tpl->tpl_vars['Entreprise']->value;?>

                </div>
            </fieldset>
        </article>
    </div>
</main>

    <?php echo '<script'; ?>
 src="/public/js/Entreprise.js" charset="utf-8"><?php echo '</script'; ?>
>
</body>

<?php $_smarty_tpl->_subTemplateRender("file:./common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
