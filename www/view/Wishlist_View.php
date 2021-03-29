<?php

$smarty = new Smarty;

$smarty->assign('title', 'Wishlist');


// Appel des Souhaits et Postulation
$postu = $this->post->fetchAll();


// Affichage des Offres
$html = '';
$i = 0;

while ($row = $this->offre->fetch()) {
    $html = $html.'<div id=id_"'.$row['id'].'" class="p-1 m-1 case">';

    $html = $html.'<div class="gauche"><div><img class="ico" src="https://static.projet.com/img/intership.svg" alt="icone stage"></div>';

    $titre = strtoupper($row['nom']);
    $html = $html.' <div><div><u><b><span id="nom_'.$row['id'].'">'.$titre.'</span></b></u></div>';

    $entreprise = ucfirst($row['entreprise']);
    $html = $html.' <div>L\'entreprise <span id="entreprise_'.$row['id'].'">'.$entreprise.'</span>';

    $html = $html.' située à <span id="ville_'.$row['id'].'">'.$row['ville'].'</span>';

    $html = $html.' recherche <span id="nb_'.$row['id'].'">'.$row['nb_place'].'</span> stagiaire(s)';

    $html = $html.' pour une durée <span id="duree_'.$row['id'].'">'.$row['stage'].'</span>';

    $html = $html.' à partir du <span id="date_'.$row['id'].'">'.$row['date_offre'].'</span>.';

    $html = $html.' Ce stage vise les étudiants dont la spécialité est <span id="specialite_'.$row['id'].'">'.$row['specialite'].'</span>.';

    $html = $html.' L\'étudiant devra avoir les compétences suivantes : <span id="competences_'.$row['id'].'">'.$row['competence'].'</span>.';

    $html = $html.' Ce stage permettra une rémunération de <span id="remuneration_'.$row['id'].'">'.$row['remuneration'].'</span>€.';

    $html = $html.' Pour plus d\'informations, merci de nous contacter à cette adresse : <span id="email_'.$row['id'].'">'.$row['email'].'</span>.</div></div></div>';

    $jsp = '';
    $jsp2 = '';

    $jsp = '<img class="icop" src="https://static.projet.com/img/Wish.png" alt="icone whish" onclick=rejet_wish('.$row['id'].')>';

    if (count($postu) == 0) {

        $jsp2 = '<img class="icop" src="https://static.projet.com/img/noPost.png" alt="icone postuler" onclick=ajout_post('.$row['id'].')>';
    }
    else {

        for ($i = 0; $i < count($postu); $i++) {

            if ($postu[$i]['id_stage'] == $row['id'] && !empty($postu[$i]['postulation'])) {

                $jsp2 = '<img class="icop" src="https://static.projet.com/img/Post.png" alt="icone postuler" onclick=rejet_post('.$row['id'].')>';

                break;
            }
            else {
                $jsp2 = '<img class="icop" src="https://static.projet.com/img/noPost.png" alt="icone postuler" onclick=ajout_post('.$row['id'].')>';
            }
        }
    }

    $html = $html.'<div><div>'.$jsp.'</div><div>'.$jsp2.'</div></div>';

    $html = $html.'</div>';
}


$smarty->assign('Offre',$html);

$smarty->display(ROOT.'/view/layout/Wishlist.tpl');
