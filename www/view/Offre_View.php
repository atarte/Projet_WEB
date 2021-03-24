<?php

$smarty = new Smarty;

$smarty->assign('title', 'Gestion Offre');

$html = '<input type="hidden" id="role" value="'.$_SESSION['role'].'">';
$smarty->assign('role', $html);


// affichage de l'icone de fermeture
if ($this->close) {
    $smarty->assign('close', '<a href="/Offre"><img class="icop"  src="http://static.projet.com/img/close.svg" alt="icone close"></a>');
}


// Affichage des Spécialité
$html = '';
while ($row = $this->type_promo->fetch()) {
    $html = $html.'<option value="'.$row['id'].'">'.$row['spe'].'</option>';
}

$smarty->assign('Type', $html);

// Affichage des Villes
$html = '';
while ($row = $this->ville->fetch()) {
    $html = $html.'<option value="'.$row['id'].'">'.$row['ville'].'</option>';
}

$smarty->assign('Ville', $html);

// Affichage des Entreprises
$html = '';
while ($row = $this->entreprise->fetch()) {
    $html = $html.'<option value="'.$row['id'].'">'.$row['entreprise'].'</option>';
}

$smarty->assign('Entreprise', $html);

// Affichage des Compétences
$html = '';
while ($row = $this->competence->fetch()) {
    $html = $html.'<option value="'.$row['competence'].'">'.$row['competence'].'</option>';
}

$smarty->assign('Competence', $html);

// Affichage des durées de stage
$html = '';
while ($row = $this->durer->fetch()) {
    $html = $html.'<option value="'.$row['durer'].'">'.$row['durer'].'</option>';
}

$smarty->assign('Durer', $html);

// Appel des Souhaits et Postulation
$cand = $this->wish->fetchAll();
$postu = $this->post->fetchAll();

print_r($postu);

// Affichage des Offres
$html = '';
$i = 0;

while ($row = $this->offre->fetch()) {
    $html = $html.'<div id=id_"'.$row['id'].'" class="p-1 m-1 case">';

    $html = $html.'<div class="gauche"><div><img class="ico" src="http://static.projet.com/img/intership.svg" alt="icone stage"></div>';

    // $html = $html.'<input type="hidden" id="id_offre" value="'.$row['id'].'">';

    $titre = strtoupper($row['nom']);
    $html = $html.' <div><div><span id="nom_'.$row['id'].'"><u><b>'.$titre.'</b></u></span></div>';

    $entreprise = ucfirst($row['entreprise']);
    $html = $html.' <div>L\'entreprise <span id="entreprise_'.$row['id'].'">'.$entreprise.'</span>';

    $html = $html.' situé à <span id="ville_'.$row['id'].'">'.$row['ville'].'</span>';

    $html = $html.' recherche <span id="nb_'.$row['id'].'">'.$row['nb_place'].'</span> stagiaire(s)';

    $html = $html.' pour une durée <span id="duree_'.$row['id'].'">'.$row['stage'].'</span>';

    $html = $html.' à partir du <span id="date_'.$row['id'].'">'.$row['date_offre'].'</span>.';

    $html = $html.' Ce stage vise les étudiants dont la spécialité est <span id="specialite_'.$row['id'].'">'.$row['specialite'].'</span>.';

    $html = $html.' L\'étudiant devra avoir les compétences suivante : <span id="competences_'.$row['id'].'">'.$row['competence'].'</span>.';

    $html = $html.' Ce stage permettra une rémunération de <span id="remuneration_'.$row['id'].'">'.$row['remuneration'].'</span>€.';

    $html = $html.' Pour plus d\'information, merci de nous contacter à cette adresse : <span id="email_'.$row['id'].'">'.$row['email'].'</span>.</div></div></div>';

    $jsp = '';
    $jsp2 = '';

    if ($_SESSION['role'] == 4) {

        if (count($cand) == 0) {

            // $jsp = '<button id="btn_wish" onclick=wish('.$row['id'].')>WishList</button>';
            $jsp = '<img class="icop" src="http://static.projet.com/img/noWish.png" alt="icone modification" onclick=ajout_wish('.$row['id'].')>';
        }
        else {

            for ($i = 0; $i < count($cand); $i++) {

                if ($cand[$i]['id_stage'] == $row['id'] && !empty($cand[$i]['souhait'])) {

                    // $jsp ='<a href="/Offre/deleteWishlist/'.$row['id'].'"><button>Déwishlister</button></a>';
                    $jsp = '<img class="icop" src="http://static.projet.com/img/Wish.png" alt="icone modification" onclick=rejet_wish('.$row['id'].')>';

                    // $jsp2 = '<button onclick=postuler('.$row['id'].')>Dépostuler</button>';
                    break;
                }
                else {

                    // $jsp = '<a href="/Offre/wishList/'.$row['id'].'"><button>WishList</button></a>';
                    $jsp = '<img class="icop" src="http://static.projet.com/img/noWish.png" alt="icone modification" onclick=ajout_wish('.$row['id'].')>';

                    // $jsp2 = '<button onclick=postuler('.$row['id'].')>Postuler</button>';
                }
            }
        }

        if (count($postu) == 0) {

            $jsp2 = '<img class="icop" src="http://static.projet.com/img/noPost.png" alt="icone modification" onclick=ajout_post('.$row['id'].')>';
        }
        else {

            for ($i = 0; $i < count($postu); $i++) {

                if ($postu[$i]['id_stage'] == $row['id'] && !empty($postu[$i]['postulation'])) {

                    $jsp2 = '<img class="icop" src="http://static.projet.com/img/Post.png" alt="icone modification" onclick=rejet_post('.$row['id'].')>';

                    break;
                }
                else {
                    $jsp2 = '<img class="icop" src="http://static.projet.com/img/noPost.png" alt="icone modification" onclick=ajout_post('.$row['id'].')>';
                }
            }
        }
    }
    else {

        $jsp = '<img class="icop" src="http://static.projet.com/img/update.svg" alt="icone modification" onclick=modification('.$row['id'].')>';

        $jsp2 = '<img class="icop" src="http://static.projet.com/img/delete.svg" alt="icone suppression" onclick=confirmation('.$row['id'].')>';

    }

    $html = $html.'<div><div>'.$jsp.'</div><div>'.$jsp2.'</div></div>';


    $html = $html.'</div>';
}
$smarty->assign('Offre',$html);

// Gestion des Errreur
if (isset($this->err)) {
    if ($$this->err == 1) {
        $smarty->assign('erreur', 'Email déjà utilisé pour un autre compte');
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

// Remove Form
if($_SESSION['role'] == 4) {
    $smarty->assign('etudiant', 'hidden disabled');
}

$smarty->display(ROOT.'/view/layout/Offre.tpl');
