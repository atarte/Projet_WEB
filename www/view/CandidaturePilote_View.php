<?php

$smarty = new Smarty;

$smarty->assign('title', 'Candidature');

// affichage de la wishList
if ($_SESSION['role'] == "2") { // si c'est un pilote
    $smarty->assign('wishlist', 'hidden');
}

$assist = $this->$assistant->fetchAll();

// Affichage des candidatures du coté pilote
$html = '';

while ($row = $this->candidature->fetch()) {

    $html = $html.'<div id=id_"'.$row['id'].'" class="p-1 m-1 contour">';

    $html = $html.' <div class="glob">';

    $html = $html.'<div class="gauche"><div><img class="ico" src="http://static.projet.com/img/intership.svg" alt="icone stage"></div>';

    $html = $html.' <div>';

    // $html = $html.'id : '.$row['id'].' ';

    $nom = strtoupper($row['nom']);
    $html = $html.'<span id="nom_'.$row['id'].'">'.$nom.'</span>  ';

    $prenom = ucfirst($row["prenom"]);
    $html = $html.'<span id="prenom_'.$row['id'].'">'.$prenom.'</span>';

    $html = $html.'  <span id="promotion_'.$row['id'].'">'.$row['promotion'].'</span>';

    $titre = strtoupper($row['nom_stage']);
    $html = $html.' | <u><b><span id="stage_'.$row['id'].'">'.$titre.'</span></b></u>';

    $entreprise = ucfirst($row['entreprise']);
    $html = $html.' chez <span id="entreprise_'.$row['id'].'">'.$entreprise.'</span>';

    $html = $html.' : <span id="email_'.$row['id'].'">'.$row['email'].'</span>';

    $html = $html.'</div>';

    $html = $html.'</div>'; // fermeture de gauche

    $html = $html.'<div>'; // Ouverture de la step

    $step = $row['step'];
    if ($step == "3") {
        $html = $html.'<div class="d-flex">';

        $html = $html.'<div id="textarea"><textarea id="story" name="story" rows="3" cols="30" style="resize: none;"></textarea></div>';

        $html = $html.'<div>';

        $html = $html.'<div id="infile"><input type="file" name="file-upload" id="file-upload"/>'.$postu[0]['email'].'</div>';

        $html = $html.'<div id="envoyer"><a href="/Candidature/step3Etudiant/'.$row['id_cand'].'"><button>Envoyer</button></a></div>';
        $html = $html.'</div>';
        $html = $html.'</div>';
    }

    $html = $html.'</div>'; // fermeture de la step

    $html = $html.'</div>'; // fermeture de glob



    $html = $html.'<div>';

    $html = $html.'je suis trop fort';

    $html = $html.'</div>';



    $html = $html.'</div>';


    // $html = $html.'</div>';
}


$smarty->assign('candidature', $html);


$smarty->display(ROOT.'view/layout/Candidature.tpl');
