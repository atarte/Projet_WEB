<?php

$smarty = new Smarty;

$smarty->assign('title', 'Candidature');

// affichage de la wishList
if ($_SESSION['role'] == "2") { // si c'est un pilote
    $smarty->assign('wishlist', 'hidden');
}

// Affichage des candidatures

$cand = $this->wish->fetchAll();

$html = '';

// $ok = $this->candidature->fetchAll();
// print_r($ok);

while ($row = $this->candidature->fetch()) {
    $html = $html.'<div id=id_"'.$row['id'].'" class="p-1 m-1 case">';

    // Div image
    $html = $html.'<div class="gauche"><div><img class="ico" src="http://static.projet.com/img/intership.svg" alt="icone stage"></div>';

    // Div paragraphe
    $html = $html.' <div>';

    if ($_SESSION['role'] == "4") { // si c'est un étudiant

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
    }
    else if ($_SESSION['role'] == "2") { // si c'est un pilote

        $html = $html.'pilote';

    }

    $html = $html.'</div></div>';

    $jsp = '';
    $jsp2 = '';

    if ($_SESSION['role'] == "4") { // si c'est un étudiant
        if (count($cand) == 0) {

            $jsp = '<img class="icop" src="http://static.projet.com/img/noWish.png" alt="icone whish" onclick=ajout_wish('.$row['id'].')>';
        }
        else {

            for ($i = 0; $i < count($cand); $i++) {

                if ($cand[$i]['id_stage'] == $row['id'] && !empty($cand[$i]['souhait'])) {

                    $jsp = '<img class="icop" src="http://static.projet.com/img/Wish.png" alt="icone whish" onclick=rejet_wish('.$row['id'].')>';
                    break;
                }
                else {

                    $jsp = '<img class="icop" src="http://static.projet.com/img/noWish.png" alt="icone whish" onclick=ajout_wish('.$row['id'].')>';
                }
            }
        }

        $jsp2 = '<img class="icop" src="http://static.projet.com/img/Post.png" alt="icone postuler" onclick=rejet_post('.$row['id'].')>';

    }
    else if ($_SESSION['role'] == "2") { // si c'est un pilote

    }

    $html = $html.'<div class="gauche">';

    $html = $html.'<div><div>'.$jsp.'</div><div>'.$jsp2.'</div></div>';

    $html = $html.'<div>';

    if ($_SESSION['role'] == "4") { // si c'est un étudiant
        $html = $html .'step : <span>'.$row['step'].'</span>';

    }
    else if ($_SESSION['role'] == "2") { // si c'est un pilote

    }


    $html = $html.'</div>';

    $html = $html.'</div></div>';
}




$smarty->assign('candidature', $html);


$smarty->display(ROOT.'view/layout/Candidature.tpl');
