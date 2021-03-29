<?php

$smarty = new Smarty;

$smarty->assign('title', 'Candidature Etudiant');


$pil = $this->pilote->fetchAll();


// Affichage des candidatures du coté étudiant
$cand = $this->wish->fetchAll();

$html = '';

while ($row = $this->candidature->fetch()) {

    $html = $html.'<div id=id_"'.$row['id'].'" class="p-1 m-1 contour">';

    // $html = $html.' <div class="glob">';
    $html = $html.' <div class="glob">';

    $html = $html.'<div class="gauche"><div><img class="ico" src="https://static.projet.com/img/intership.svg" alt="icone stage"></div>'; // début de gauche 1


    $html = $html.' <div>';

    $titre = strtoupper($row['nom']);
    $html = $html.'<div><u><b><span id="nom_'.$row['id'].'">'.$titre.'</span></b></u></div>';

    $entreprise = ucfirst($row['entreprise']);
    $html = $html.' <div>L\'entreprise <span id="entreprise_'.$row['id'].'">'.$entreprise.'</span>';

    $html = $html.' situé à <span id="ville_'.$row['id'].'">'.$row['ville'].'</span>';

    $html = $html.' recherche <span id="nb_'.$row['id'].'">'.$row['nb_place'].'</span> stagiaire(s)';

    $html = $html.' pour une durée <span id="duree_'.$row['id'].'">'.$row['stage'].'</span>';

    $html = $html.' à partir du <span id="date_'.$row['id'].'">'.$row['date_offre'].'</span>.';

    $html = $html.' Ce stage vise les étudiants dont la spécialité est <span id="specialite_'.$row['id'].'">'.$row['specialite'].'</span>.';

    $html = $html.' L\'étudiant devra avoir les compétences suivante : <span id="competences_'.$row['id'].'">'.$row['competence'].'</span>.';

    $html = $html.' Ce stage permettra une rémunération de <span id="remuneration_'.$row['id'].'">'.$row['remuneration'].'</span>€.';

    $html = $html.' Pour plus d\'information, merci de nous contacter à cette adresse : <span id="email_'.$row['id'].'">'.$row['email'].'</span>.</div>';

    $html = $html.'</div>';

    $html = $html.'</div>'; // fin de gauche 1



    $html = $html.'<div class="gauche">'; // début de gauche 2
    $jsp = '';
    $jsp2 = '';

    if (count($cand) == 0) {

        $jsp = '<img class="icop" src="https://static.projet.com/img/noWish.png" alt="icone whish" onclick=ajout_wish('.$row['id'].')>';
    }
    else {

        for ($i = 0; $i < count($cand); $i++) {

            if ($cand[$i]['id_stage'] == $row['id'] && !empty($cand[$i]['souhait'])) {

                $jsp = '<img class="icop" src="https://static.projet.com/img/Wish.png" alt="icone whish" onclick=rejet_wish('.$row['id'].')>';
                break;
            }
            else {

                $jsp = '<img class="icop" src="https://static.projet.com/img/noWish.png" alt="icone whish" onclick=ajout_wish('.$row['id'].')>';
            }
        }
    }

    $jsp2 = '<img class="icop" src="https://static.projet.com/img/Post.png" alt="icone postuler" onclick=rejet_post('.$row['id'].')>';

    $html = $html.'<div><div>'.$jsp.'</div><div>'.$jsp2.'</div></div>';


    $html = $html.'<div>';

    $step = $row['step'];

    if ($step == "1") {
        $html = $html.'Avez vous été retenue par l\'entreprise';
        $html = $html.'  <div><span class="coche" onclick=accepter('.$row['id_cand'].')>✔️</span>';
        $html = $html.'  <span class="coche" onclick=refuser('.$row['id_cand'].')>❌</span></div>';
    }
    else if ($step == "6") {
        $html = $html.'Accepter';

    }
    else if ($step == "8") {
        $html = $html.'Refuser';
    }
    else {
        $html = $html.'<div class="step">step : '.$step.'</div>';
    }



    $html = $html.'</div>';

    $html = $html.'</div>'; // fin de gauche 2

    $html = $html.'</div>'; // fin de glob


    $html = $html.'<div class="entre">';

    if ($step == "2") {
        $html = $html.'<div class="env_mail">';

        $html = $html.'<div id="textarea"><textarea id="story" name="story" rows="3" cols="40">'.$pil[0]['email'].'</textarea></div>';

        $html = $html.'<div>';

        $html = $html.'<div id="infile"><input type="file" name="file-upload" id="file-upload"/></div>';

        $html = $html.'<div id="envoyer"><a href="/Candidature/step3Etudiant/'.$row['id_cand'].'"><button>Envoyer</button></a></div>';
        $html = $html.'</div>';
        $html = $html.'</div>';
    }

    $html = $html.'</div>';



    $html = $html.'</div>';


}




$smarty->assign('candidature', $html);


$smarty->display(ROOT.'view/layout/Candidature.tpl');
