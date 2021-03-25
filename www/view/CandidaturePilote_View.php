<?php

$smarty = new Smarty;

$smarty->assign('title', 'Candidature');

// affichage de la wishList
if ($_SESSION['role'] == "2") { // si c'est un pilote
    $smarty->assign('wishlist', 'hidden');
}



// Affichage des candidatures du coté pilote
$html = '';

while ($row = $this->candidature->fetch()) {

    $html = $html.'<div id=id_"'.$row['id'].'" class="p-1 m-1 case">';

    $html = $html.'<div class="gauche"><div><img class="ico" src="http://static.projet.com/img/intership.svg" alt="icone stage"></div>';

    $html = $html.' <div>';


    $nom = strtoupper($row['nom']);
    $html = $html.'<span id="nom_'.$row['id'].'">'.$nom.'</span>  ';

    $prenom = ucfirst($row["prenom"]);
    $html = $html.'<span id="prenom_'.$row['id'].'">'.$prenom.'</span>';

    // $html = $html.


    $html = $html.'</div></div>';

    $html = $html.'<div>';



    $html = $html.'bouton des step';



    $html = $html.'</div>';

    $html = $html.'</div></div>';
}


$smarty->assign('candidature', $html);


$smarty->display(ROOT.'view/layout/Candidature.tpl');
