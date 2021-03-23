<?php

$smarty = new Smarty;

$smarty->assign('title', 'Gestion Pilote');


// Affichage de l'erreur
if (isset($this->err)) {
    if ($$this->err == 1) {
        $smarty->assign('erreur', '<span class="erreur">Adresse email déjà utilisé</span>');
    }
}


// Affichage de l'icone de fermeture
if ($this->close) {
    $smarty->assign('close', '<a href="/Pilote"><img class="icop"  src="http://static.projet.com/img/close.svg" alt="icone close"></a>');
}


// Affichage des pilotes
$html = '';
$i = 0;
while ($row = $this->pilote->fetch()) {
    $i++;

    $html = $html.'<div id="'.$row["Id_Users"].'" class="p-1 m-1 case">';

    $html = $html.'<div class="gauche"><div><img class="ico" src="http://static.projet.com/img/user.svg" alt="icone user"></div>';

    $nom = strtoupper($row['nom']);
    $html = $html.'<div><div><span id="nom_'.$row['Id_Users'].'">'.$nom.'</span>';

    $prenom = ucfirst($row["prenom"]);
    $html = $html.'<span id="prenom_'.$row['Id_Users'].'">'.$prenom.'</span>';

    $html = $html.'<span id="centre_'.$row['Id_Users'].'">'.$row['centre'].'</span></div>';

    $html = $html.'<div><span id="email_'.$row['Id_Users'].'">'.$row['email'].'</span></div></div></div>';

    // $html = $html.'<button onclick=modification('.$row['Id_Users'].')>Modifier</button>';
    $html = $html.'<div><div><img class="icop" src="http://static.projet.com/img/update.svg" alt="icone modification" onclick=modification('.$row['Id_Users'].')></div>';

    // $html = $html.'<button onclick=confirmation('.$row['Id_Users'].')>Supprimer</button>';
    $html = $html.'<div><img class="icop" src="http://static.projet.com/img/delete.svg" alt="icone suppression" onclick=confirmation('.$row['Id_Users'].')></div>';

    $html = $html.'</div></div>';

}

$smarty->assign('Pilote',$html);


// Ajout des centres dans le select
$html = '';
while ($row = $this->centre->fetch()) {
    $html = $html.'<option value="'.$row['id'].'">'.$row['centre'].'</option>';
}

$smarty->assign('Centre', $html);


// Pagination
$page  = $this->p;
$pageBack = $page -1;
$pageForward = $page +1;


$html = '<span ';
if ($page == 1) {
    $html = $html.'hidden';
}
$html = $html.'><a href="/Pilote/page/'.$pageBack.'"> << </a></span>';

$html = $html.'<span>page '.$page.'</span>';

$html = $html.'<span ';
if ($i < 10) {
    $html = $html.'hidden';
}
$html = $html.'><a href="/Pilote/page/'.$pageForward.'"> >> </a></span>';

if ($this->p != 0) {
    $smarty->assign('pagination', $html);
}



$smarty->display(ROOT.'view/layout/Pilote.tpl');
