<?php

$smarty = new Smarty;

$smarty->assign('title', 'Gestion Entreprise');


// affichage de l'icone de fermeture
if ($this->close) {
    $smarty->assign('close', '<a href="/Entreprise"><img class="icop"  src="https://static.projet.com/img/close.svg" alt="icone close"></a>');
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


// Affichage des Nom d'Entreprise
$html = '';
while ($row = $this->nom->fetch()) {
    $html = $html.'<option value="'.$row['id'].'">'.$row['nom'].'</option>';
}
$smarty->assign('Nom', $html);


// Affichage des Regions
$html = '';
while ($row = $this->region->fetch()) {
    $html = $html.'<option value="'.$row['id'].'">'.$row['region'].'</option>';
}
$smarty->assign('Region', $html);



// Affichage des Entreprises
// $adr = $this->adresse->fetchAll();

$html = '';
$i = 0;

while ($row = $this->entreprise->fetch()) {
    $html = $html.'<div id=id_"'.$row['id'].'" class="p-1 m-1 case">';

    $html = $html.'<div class="gauche"><div><img class="ico" src="https://static.projet.com/img/entreprise.png" alt="icone entreprise"></div>';

    // $html = $html.'<input type="hidden" id="id_entreprise_'.$row['id'].'" value="'.$row['id'].'">';

    $titre = strtoupper($row['nom']);
    $html = $html.' <div><div><u><b><span id="nom_'.$row['id'].'">'.$titre.'</span></b></u></div>';

    $entreprise = ucfirst($row['nom']);
    $html = $html.'<div>Nom = <span id="nom_'.$row['id'].'">'.$entreprise.'</span><br>';

    $html = $html.'Secteur d\'activité : <span id="secteur_'.$row['id'].'">'.$row['secteur'].'</span><br>';

    $html = $html.'Adresse = <span id="adresse_'.$row['id'].'">'.$row['adresse'].'</span>, <span id="ville_'.$row['id'].'">'.$row['ville'].'</span> <span id="code_p_'.$row['id'].'">'.$row['code_p'].'</span> <span id="region_'.$row['id'].'">'.$row['region'].'</span><br>';

    $html = $html.'Nombre de Stagiaire pris : <span id="nombre_'.$row['id'].'">'.$row['nombre'].'</span><br>';

    $html = $html.'Email :<span id="email_'.$row['id'].'">'.$row['email'].'</span></div></div></div>';


    // $entreprise = ucfirst($row['nom']);
    //
    // $html = $html.' <div>L\'entreprise <span id="entreprise_'.$row['id'].'">'.$entreprise.'</span>';
    //
    // $html2 = '';
    //
    // for ($i = 0; $i < count($adr); $i++) {
    //     if ($adr[$i]['id_entreprise'] == $row['id']) {
    //
    //         $html2 = $html2.' est située dans la ville <span id="ville_'.$row['id'].'">'.$adr[$i]['ville'].'</span>';
    //
    //         $html2 = $html2.' à l\'adresse, <span id="adresse_'.$row['id'].'">'.$adr[$i]['adresse'].'</span>';
    //
    //         $html2 = $html2.', en <span id="region_'.$row['id'].'">'.$adr[$i]['region'].'</span>';
    //
    //         break;
    //     }
    // }
    // $html = $html.$html2;
    //
    // $html = $html.' Spécialisée dans le secteur <span id="secteur_'.$row['id'].'">'.$row['secteur'].'</span>';
    //
    // $html = $html.' elle a déjà accueilli <span id="nombre_accepter_'.$row['id'].'">'.$row['stagiaire'].'</span> étudiant(es)(s) en stage.';
    //
    // $html = $html.' Vous pouvez nous contacter à cette adresse : <span id="email_'.$row['id'].'">'.$row['email'].'</span>.</div></div></div>';

    $html = $html.'<div><img class="icop" src="https://static.projet.com/img/update.svg" alt="icone modification" onclick=modification('.$row['id'].')></div>';

    $html = $html.'<div><img class="icop" src="https://static.projet.com/img/delete.svg" alt="icone suppression" onclick=confirmation('.$row['id'].')></div>';

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
