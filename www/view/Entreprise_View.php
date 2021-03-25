<?php

$smarty = new Smarty;

$smarty->assign('title', 'Gestion Entreprise');

$html = '<input type="hidden" id="role" value="'.$_SESSION['role'].'">';
$smarty->assign('role', $html);


// affichage de l'icone de fermeture
if ($this->close) {
    $smarty->assign('close', '<a href="/Entreprise"><img class="icop"  src="http://static.projet.com/img/close.svg" alt="icone close"></a>');
}



// Affichage des Villes
$html = '';
while ($row = $this->ville->fetch()) {
    $html = $html.'<option value="'.$row['id'].'">'.$row['ville'].'</option>';
}

$smarty->assign('Ville', $html);

// Affichage des Secteurs
$html = '';
while ($row = $this->secteur->fetch()) {
    $html = $html.'<option value="'.$row['id'].'">'.$row['secteur'].'</option>';
}

$smarty->assign('Secteur', $html);



// Affichage des Entreprises
$html = '';
$i = 0;

while ($row = $this->entreprise->fetch()) {
    $html = $html.'<div id=id_"'.$row['id'].'" class="p-1 m-1 case">';

   // $html = $html.'<div class="gauche"><div><img class="ico" src="http://static.projet.com/img/entreprise.png" alt="icone entreprise"></div>';

    // $html = $html.'<input type="hidden" id="id_entreprise" value="'.$row['id'].'">';

    $titre = strtoupper($row['nom']);
    $html = $html.' <div><div><span id="nom_'.$row['id'].'"><u><b>'.$titre.'</b></u></span></div>';

    $entreprise = ucfirst($row['entreprise']);
    $html = $html.' <div>L\'entreprise <span id="entreprise_'.$row['id'].'">'.$entreprise.'</span>';

    $html = $html.' est située dans la ville <span id="ville_'.$row['id'].'">'.$row['ville'].'</span>';

    $html = $html.' en <span id="nb_'.$row['id'].'">'.$row['region'].'</span>';

    $html = $html.' Spécialisée dans le secteur <span id="secteur_'.$row['id'].'">'.$row['secteur'].'</span>';

    $html = $html.' elle a déjà accueilli <span id="stagiaire_'.$row['id'].'">'.$row['stagiaire'].'</span> en stage';

    $html = $html.' Vous pouvez nous contacter à cette adresse : <span id="email_'.$row['id'].'">'.$row['email'].'</span>.</div></div></div>';

   


    $html = $html.'</div>';
}
$smarty->assign('Entreprise',$html);

// Gestion des Errreur
if (isset($this->err)) {
    if ($$this->err == 1) {
        $smarty->assign('erreur', 'Email déjà utilisé par une entreprise');
    }
}


// Pagination
$page  = $this->p;
$pageBack = $page -1;
$pageForward = $page +1;


$html = '<span ';
if ($page == 1) {
    $html = $html.'hidden';
}
$html = $html.'><a href="/Entreprise/page/'.$pageBack.'"> << </a></span>';

$html = $html.'<span>page '.$page.'</span>';

$html = $html.'<span ';
if ($i < 10) {
    $html = $html.'hidden';
}
$html = $html.'><a href="/Entreprise/page/'.$pageForward.'"> >> </a></span>';

if ($this->p != 0) {
    $smarty->assign('pagination', $html);
}



$smarty->display(ROOT.'/view/layout/Entreprise.tpl');
