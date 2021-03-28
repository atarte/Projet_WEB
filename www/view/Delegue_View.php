<?php

$smarty = new Smarty;

$smarty->assign('title', 'Gestion Délégué');


// affichage de l'erreur
if (isset($this->err)) {
    if ($this->err == 1) {
        $smarty->assign('erreur', '<span class="erreur">Adresse email déjà utilisé</span>');
    }
}


// affichage de l'icone de fermeture
if ($this->close) {
    $smarty->assign('close', '<a href="/Delegue"><img class="icop"  src="https://static.projet.com/img/close.svg" alt="icone close"></a>');
}


// affichage des étudiants
$i = 0;
$aff = '';
while ($row = $this->delegue->fetch()) {
    $i++;

    $aff = $aff.'<div id="'.$row["id"].'" class="p-1 m-1 case">';

    $aff = $aff.'<div class="gauche"><div><img class="ico" src="https://static.projet.com/img/user.svg" alt="icone user"></div>';

    $nom = strtoupper($row['nom']);
    $aff = $aff.'<div><div><span id="nom_'.$row['id'].'">'.$nom.'</span>  ';

    $prenom = ucfirst($row["prenom"]);
    $aff = $aff.'<span id="prenom_'.$row['id'].'">'.$prenom.'</span></div>';

    $aff = $aff.'<div><span id="email_'.$row['id'].'">'.$row['email'].'</span></div>';

    $aff = $aff.'<div>Entreprise : <span id="entreprise_'.$row['id'].'">'.$row['entreprise'].'</span>';

    $aff = $aff.' | Offre : <span id="offre_'.$row['id'].'">'.$row['offre'].'</span>';

    $aff = $aff.' | Pilote : <span id="pilote_'.$row['id'].'">'.$row['pilote'].'</span>';

    $aff = $aff.' | Délégué : <span id="delegue_'.$row['id'].'">'.$row['delegue'].'</span>';

    $aff = $aff.' | Etudiant : <span id="etudiant_'.$row['id'].'">'.$row['etudiant'].'</span>';

    $aff = $aff.' | Candidature : <span id="candidature_'.$row['id'].'">'.$row['candidature'].'</span></div></div></div>';

    $aff = $aff.'<div><div><img class="icop" src="https://static.projet.com/img/update.svg" alt="icone modification" onclick=modification('.$row['id'].')></div>';

    if ($_SESSION['role'] != "3") {
        $aff = $aff.'<div><img class="icop" src="https://static.projet.com/img/delete.svg" alt="icone suppression" onclick=confirmation('.$row['id'].')></div>';
    }

    $aff = $aff.'</div></div>';
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
