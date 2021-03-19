<?php

$smarty = new Smarty;

$smarty->assign('title', 'Gestion Etudiant');

$html = '';
while ($row = $etudiant->fetch()) {
    $html = $html.'nom :'.$row['nom'].'prenom :'.$row['prenom'].'email :'.$row['email'].'pilote nom :'.$row['piloteNom'].'pilote prenom :'.$row['pilotePrenom'].'centre :'.$row['centre'].'promotion :'.$row['promotion'].'spécialité :'.$row['specialite'].'<br>';
}
$smarty->assign('etudiant', $html);





$smarty->display(ROOT.'/view/layout/Etudiant.tpl');
