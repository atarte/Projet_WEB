<?php

$smarty = new Smarty;

$smarty->assign('title', 'Candidature Pilote');

$smarty->assign('wishlist', 'hidden');


$assist = $this->assistant->fetchAll();


// Affichage des candidatures du coté pilote
$html = '';

while ($row = $this->candidature->fetch()) {

    $html = $html.'<div id=id_"'.$row['id'].'" class="p-1 m-1 contour">';

    $html = $html.' <div class="glob">';

    $html = $html.'<div class="gauche"><div><img class="ico" src="https://static.projet.com/img/intership.svg" alt="icone stage"></div>';

    $html = $html.' <div>';

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

    // fermeture de gauche
    $html = $html.'</div>';

    // Ouverture de la step
    $html = $html.'<div>';

    $step = $row['step'];

    if ($step == "8") {
        $html = $html.'Refuser';
    }
    else if ($step == "6") {
        $html = $html.'Accepter';

    }
    else {
        if ($step == 3) {
            $html = $html.'<div class="step">step '.$step.': Fiche envoyée</div>';
        }
        else if($step == 4) {
            $html = $html.'<div class="step">step '.$step.': Fiche signée</div>';
        }
        else if ($step == 5) {
            $html = $html.'<div class="step">step '.$step.': Convention envoyée</div>';
        }
        else if ($step == 6) {
            $html = $html.'<div class="step">step '.$step.': Convention signée</div>';
        }
    }

    // fermeture de la step
    $html = $html.'</div>';

    // fermeture de glob
    $html = $html.'</div>';



    $html = $html.'<div>';

    if ($step == "3") {
        $html = $html.'<div class="env_mail"> Prévenir l\'assistant que la fiche est signée : ' ;

        $html = $html.'<div id="textarea"><textarea id="story" name="story" rows="3" cols="40">'.$assist[0]['email'].'</textarea></div>';

        $html = $html.'<div>';

        $html = $html.'<div id="infile"><input type="file" name="file-upload" id="file-upload"/></div>';

        $html = $html.'<div id="envoyer"><a href="/Candidature/step4Pilote/'.$row['id'].'"><button>Envoyer</button></a></div>';
        $html = $html.'</div>';
        $html = $html.'</div>';
    }
    if ($step == "4") {
        $html = $html.'<div class="env_mail"> Envoyer la convention : ';

        $html = $html.'<div id="textarea"><textarea id="story" name="story" rows="3" cols="40"">'.$row['email_user'].'</textarea></div>';

        $html = $html.'<div>';

        $html = $html.'<div id="infile"><input type="file" name="file-upload" id="file-upload"/></div>';

        $html = $html.'<div id="envoyer"><a href="/Candidature/step5Pilote/'.$row['id'].'"><button>Envoyer</button></a></div>';
        $html = $html.'</div>';
        $html = $html.'</div>';
    }
    if ($step == "5") {
        $html = $html.'<div class="env_mail">Prévenir que la convention a été signée : ';

        $html = $html.'<div id="textarea"><textarea id="story" name="story" rows="3" cols="40">'.$row['email_user'].'</textarea></div>';

        $html = $html.'<div>';

        $html = $html.'<div id="infile"><input type="file" name="file-upload" id="file-upload"/></div>';

        $html = $html.'<div id="envoyer"><a href="/Candidature/step6Pilote/'.$row['id'].'"><button>Envoyer</button></a></div>';
        $html = $html.'</div>';
        $html = $html.'</div>';
    }



    $html = $html.'</div>';



    $html = $html.'</div>';

}


$smarty->assign('candidature', $html);


$smarty->display(ROOT.'view/layout/Candidature.tpl');
