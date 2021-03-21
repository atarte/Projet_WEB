<?php

$smarty = new Smarty;

$smarty->assign('title', 'Gestion Delegue');


// affichage de l'erreur
if (isset($this->err)) {
    if ($this->err == 1) {
        $smarty->assign('erreur', 'Email deja utilisé');
    }
    else {
    }
}


// affichage des etudiants
$i = 0;
$aff = '';
while ($row = $this->delegue->fetch()) {
    $i++;

    $aff = $aff.'<div id="'.$row["id"].'">';

    $aff = $aff.'Nom : <span id="nom_'.$row['id'].'">'.$row['nom'].'</span>';

    $aff = $aff.' | Prenom : <span id="prenom_'.$row['id'].'">'.$row["prenom"].'</span>';

    $aff = $aff.' | Email : <span id="email_'.$row['id'].'">'.$row['email'].'</span>';

    $aff = $aff.' | Entreprise : <span id="entreprise_'.$row['id'].'">'.$row['entreprise'].'</span>';

    $aff = $aff.' | Offre : <span id="offre_'.$row['id'].'">'.$row['offre'].'</span>';

    $aff = $aff.' | Pilote : <span id="pilote_'.$row['id'].'">'.$row['pilote'].'</span>';

    $aff = $aff.' | Délégué : <span id="delegue_'.$row['id'].'">'.$row['delegue'].'</span>';

    $aff = $aff.' | Etudiant : <span id="etudiant_'.$row['id'].'">'.$row['etudiant'].'</span>';

    $aff = $aff.' | Candidature : <span id="candidature_'.$row['id'].'">'.$row['candidature'].'</span>';

    $aff = $aff.'<button onclick=modification('.$row['id'].')>Modifier</button>';

    if ($_SESSION['role'] != "3") {
        $aff = $aff.'<button onclick=confirmation('.$row['id'].')>Supprimer</button>';
    }

    $aff = $aff.'<br></div>';
}
$smarty->assign('delegue', $aff);


// Pagination
$page  = $this->p;
$pageBack = $page -1;
$pageForward = $page +1;

$html = '<span ';
if ($page == 1) {
    $html = $html.'hidden';
}
$html = $html.'><a href="/Delegue/page/'.$pageBack.'"> << </a></span>';

$html = $html.'<span>page '.$page.'</span>';

$html = $html.'<span ';
if ($i < 10) {
    $html = $html.'hidden';
}
$html = $html.'><a href="/Delegue/page/'.$pageForward.'"> >> </a></span>';

if ($this->p != 0) {
    $smarty->assign('pagination', $html);
}


$smarty->display(ROOT.'/view/layout/Delegue.tpl');
