<?php
/* Smarty version 3.1.39, created on 2021-03-23 14:02:38
  from 'D:\SCOLAIRE\CESI\2eme_annee\projet\WEB\Projet_WEB\www\view\layout\Etudiant.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6059f4feaf74c3_63196992',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4bbf89a610c58c5a621a3b6f426a96fac3bc4c9d' => 
    array (
      0 => 'D:\\SCOLAIRE\\CESI\\2eme_annee\\projet\\WEB\\Projet_WEB\\www\\view\\layout\\Etudiant.tpl',
      1 => 1616507775,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./common/header.tpl' => 1,
    'file:./common/footer.tpl' => 1,
  ),
),false)) {
function content_6059f4feaf74c3_63196992 (Smarty_Internal_Template $_smarty_tpl) {
ob_start();
echo $_smarty_tpl->tpl_vars['title']->value;
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_subTemplateRender("file:./common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>$_prefixVariable1), 0, false);
?>

<link rel="stylesheet" href="http://static.projet.com/css/Etudiant.css">

<body>
<main class="container">
    <a href="/Accueil"><button>Retour</button></a>


    <div class="row justify-content-between">
        <article class="col">

            <!-- création étudiant -->
            <fieldset class="field">
                <legend id="legend_form">Création d'étudiant</legend>

                <form id="formulaire" class="form" action="/Etudiant/creation" method="post">
                    <div class="container">
                        <div class="row justify-content-center p-1">
                            <!-- nom : -->
                            <input id="nom" type="text" name="nom" placeholder="Nom" required>
                        </div>
                        <div class="row justify-content-center p-1">
                            <!-- Prenom : -->
                            <input id="prenom" type="text" name="prenom" placeholder="Prenom" required>
                        </div>
                        <div class="row justify-content-center">
                            <!-- errur : -->
                            <?php echo (($tmp = @$_smarty_tpl->tpl_vars['erreur']->value)===null||$tmp==='' ? '' : $tmp);?>

                        </div>
                        <div class="row justify-content-center p-1">
                            <!-- email : -->
                            <input id="email" type="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="row justify-content-center p-1">
                            <span id="pwd_div">
                                <!-- password : -->
                                <input "pwd" type="password" name="pwd" placeholder="Password" required>
                            </span>
                        </div>
                        <div class="row justify-content-center p-1">
                            <!-- pilote : -->
                            <select id="pilote" name="pilote" required>
                                <option value="">Choisiez un pilote</option>
                                <?php echo $_smarty_tpl->tpl_vars['pilote']->value;?>

                            </select>
                        </div>
                        <div class="row justify-content-center p-1">
                        <!-- promotion : -->
                            <select id="promotion" name="promotion" required>
                                <option value="">Choisiez une promotion</option>
                                <?php echo $_smarty_tpl->tpl_vars['promotion']->value;?>

                            </select>
                        </div>
                        <div class="row justify-content-center p-1">
                        <!-- spécialité : -->
                            <select id="specialite" name="specialite" required>
                                <option value="">Choisiez une spécialité</option>
                                <?php echo $_smarty_tpl->tpl_vars['specialite']->value;?>

                            </select>
                        </div>
                        <div class="row justify-content-center p-1">
                            <input id="submit" type="submit" value="Créer">
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
                <legend>Liste des étudiants</legend>
                
                <!-- Recherche Etudiant -->
                <div class="">
                    <form id="recherche" action="/Etudiant/recherche" method="post">
                        <!-- nom : -->
                        <input id="r_nom" type="text" name="nom" placeholder="Nom">

                        <!-- prenom : -->
                        <input id="r_prenom" type="text" name="prenom" placeholder="Prenom">

                        <!-- pilote : -->
                        <select id="r_pilote" name="pilote">
                            <option value="">Choisiez un pilote</option>
                            <?php echo $_smarty_tpl->tpl_vars['pilote']->value;?>

                        </select>

                        <!-- promotion : -->
                        <select id="r_promotion" name="promotion">
                            <option value="">Choisiez une promotion</option>
                            <?php echo $_smarty_tpl->tpl_vars['promotion']->value;?>

                        </select>

                        <!-- spécialité : -->
                        <select id="r_specialite" name="specialite">
                            <option value="">Choisiez une spécialité</option>
                            <?php echo $_smarty_tpl->tpl_vars['specialite']->value;?>

                        </select>

                        <!-- centre : -->
                        <select id="r_centre" name="centre">
                            <option value="">Choisiez un centre</option>
                            <?php echo $_smarty_tpl->tpl_vars['centre']->value;?>

                        </select>

                        <input id="r_submit" type="submit" value="Rechercher">
                    </form>
                    <a href="/Etudiant"><button>X</button></a>
                </div>

                <!-- Affichage : -->
                <div class="page">
                    <?php echo (($tmp = @$_smarty_tpl->tpl_vars['pagination']->value)===null||$tmp==='' ? '' : $tmp);?>

                </div>

                <div class="">
                    <?php echo $_smarty_tpl->tpl_vars['etudiant']->value;?>

                </div>
            </fieldset>
        </article>

    </div>
</main>



    <?php echo '<script'; ?>
 src="/public/js/Etudiant.js" charset="utf-8"><?php echo '</script'; ?>
>
</body>

<?php $_smarty_tpl->_subTemplateRender("file:./common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
