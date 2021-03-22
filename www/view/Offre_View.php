<?php

$smarty = new Smarty;

$smarty->assign('title', 'Gestion Offre');

$html = '';
while ($row = $this->type_promo->fetch()) {
    $html = $html.'<option value="'.$row['id'].'">'.$row['spe'].'</option>';
}

$smarty->assign('Type', $html);


$html = '';
while ($row = $this->ville->fetch()) {
    $html = $html.'<option value="'.$row['id'].'">'.$row['ville'].'</option>';
}

$smarty->assign('Ville', $html);


$html = '';
while ($row = $this->entreprise->fetch()) {
    $html = $html.'<option value="'.$row['id'].'">'.$row['entreprise'].'</option>';
}

$smarty->assign('Entreprise', $html);


$html = '';
// $html2 = '';
$i = 0;

while ($row = $this->offre->fetch()) {
    $html = $html.'<div id="'.$row["id"].'">';

    $html = $html.' Nom : <span id="nom_'.$row['id'].'">'.$row['nom'].'</span><br>';

    $html = $html.' Entreprise : <span id="entreprise_'.$row['id'].'">'.$row['entreprise'].'</span><br>';

    $html = $html.' Ville : <span id="ville_'.$row['id'].'">'.$row['ville'].'</span><br>';

    $html = $html.' Durée : <span id="duree_'.$row['id'].'">'.$row['stage'].'</span><br>';

    $html = $html.' Spécialité : <span id="specialite_'.$row['id'].'">'.$row['specialite'].'</span><br>';

    $html = $html.'Compétence(s) : <span id="competences_'.$row['id'].'">'.$row['competence'].'</span><br>';

    $html = $html.' Nombres de place(s) : <span id="nb_'.$row['id'].'">'.$row['nb_place'].'</span><br>';

    $html = $html.' Rémunération (mensuelle) : <span id="remuneration_'.$row['id'].'">'.$row['remuneration'].' €</span><br>';

    $html = $html.' Date de dépôt : <span id="date_'.$row['id'].'">'.$row['date_offre'].'</span><br>';

    $html = $html.' Email : <span id="email_'.$row['id'].'">'.$row['email'].'</span><br>';

    $html = $html.'<button onclick=confirmation('.$row['id'].')>Supprimer</button>';

    $html = $html.'<button onclick=modification('.$row['id'].')>Modifier</button><br><br>';

    $html = $html.'<br></div>';

}

$smarty->assign('Offre',$html);

if (isset($this->err)) {
    if ($$this->err == 1) {
        $smarty->assign('erreur', 'Email déjà utilisé pour un autre compte');
    }
    else {
    }
}


$page  = $this->p;
$pageBack = $page -1;
$pageForward = $page +1;


$html = '<span ';
if ($page == 1) {
    $html = $html.'hidden';
}
$html = $html.'><a href="/Offre/page/'.$pageBack.'"> << </a></span>';

$html = $html.'<span>page '.$page.'</span>';

$html = $html.'<span ';
if ($i < 10) {
    $html = $html.'hidden';
}
$html = $html.'><a href="/Offre/page/'.$pageForward.'"> >> </a></span>';

if ($this->p != 0) {
    $smarty->assign('pagination', $html);
}

$smarty->display(ROOT.'/view/layout/Offre.tpl');
