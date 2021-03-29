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
$conf = $this->confiance->fetchAll();
$not = $this->note->fetchAll();
$moy = $this->moyenne->fetchAll();


$html = '';
$i = 0;

while ($row = $this->entreprise->fetch()) {
    // contour
    $html = $html.'<div id=id_"'.$row['id'].'" class="p-1 m-1 contour">';

    // up
    $html = $html.' <div class="up">';

    // gauche
    $html = $html.'<div class="gauche"><div><img class="ico" src="https://static.projet.com/img/entreprise.svg" alt="icone entreprise"></div>';

    // paragraphe avec titre
    $html = $html.'<div>';

    $titre = strtoupper($row['nom']);
    $html = $html.'<div><u><b><span id="nom_'.$row['id'].'">'.$titre.'</span></b></u></div>';

    // paragraphe sans titre
    $html = $html.'<div>';

    $html = $html.'<div>';
    $html = $html.'<u>Adresse : </u>';
    $html = $html.'<span id="adresse_'.$row['id'].'">'.$row['adresse'].'</span> ,';
    $html = $html.'<span id="ville_'.$row['id'].'">'.$row['ville'].'</span> ,';
    $html = $html.'<span id="code_p_'.$row['id'].'">'.$row['code_p'].'</span> ,';
    $html = $html.'<span id="region_'.$row['id'].'">'.$row['region'].'</span> ';
    $html = $html.'</div>';


    $html = $html.'<div>';
    $html = $html.'<u>Secteur : ';
    $html = $html.'</u><span id="secteur_'.$row['id'].'">'.$row['secteur'].'</span>';
    $html = $html.'</div>';


    $html = $html.'<div>';
    $html = $html.'<u>Nombre de Stagiaire pris : </u>';
    $html = $html.'<span id="nombre_'.$row['id'].'">'.$row['nombre'].'</span>';
    $html = $html.'</div>';


    $html = $html.'<div>';
    $html = $html.'<u>Email : </u>';
    $html = $html.'<span id="email_'.$row['id'].'">'.$row['email'].'</span>';
    $html = $html.'</div>';

    // fermeture de paragraphe sans titre
    $html = $html.'</div>'
    ;
    // fermeture du paragraphe avec titre
    $html = $html.'</div>';

    // fermeture de gauche
    $html = $html.'</div>';


    // button
    $html = $html.'<div>';

    $html = $html.'<img class="icop" src="https://static.projet.com/img/update.svg" alt="icone modification" onclick=modification('.$row['id'].')>';

    $html = $html.'<img class="icop" src="https://static.projet.com/img/delete.svg" alt="icone suppression" onclick=confirmation('.$row['id'].')>';

    $flag = false;
    if ($_SESSION['role'] == '2'){
        if(count($conf) == 0) {

            $html = $html.'<img id="conf" class="icop" src="https://static.projet.com/img/trust.svg" alt="icone d\'ajout de confiance" onclick=confiance('.$row['id'].')>';
        }
        else {
            for ($i = 0; $i < count($conf); $i++) {
                if ($conf[$i]['id_ent'] == $row['id'] && $conf[$i]['id_user'] == $_SESSION['id']) {

                    $html = $html.'<img id="conf" class="icop" src="https://static.projet.com/img/untrust.svg" alt="icone retrait de confiance" onclick=confiance('.$row['id'].')>';

                    $flag = true;

                    break;
                }
            }
        }
    }
    if (!$flag && $_SESSION['role'] == '2') {
        $html = $html.'<img id="conf" class="icop" src="https://static.projet.com/img/trust.svg" alt="icone d\'ajout de confiance" onclick=confiance('.$row['id'].')>';
    }

    // fermeture de button
    $html = $html.'</div>';

    // fermeture de up
    $html = $html.'</div>';


    // down
    $html = $html.' <div class="down">';


    //confiance
    $html = $html.'<div class="space">';

    $nb = 0;
    for ($i = 0; $i < count($conf); $i++) {
        if ($conf[$i]['id_ent'] == $row['id']) {
            $nb++;
        }
    }

    if ($nb == 0) {
        // nothing
    }
    else if ($nb == 1) {
        $html = $html.$nb.' pilote fait confiance |';
    }
    else {
        $html = $html.$nb.' pilotes font confiances |';
    }


    // fermeture de confiance
    $html = $html.'</div>';


    // moyenne
    $html = $html.'<div class="space">';

    for ($i = 0; $i < count($moy); $i++) {
        if ($moy[$i]['id_entreprise'] == $row['id']) {
            $html = $html.'Note : '.$moy[$i]['note'].' |';
            break;
        }
    }
    // fermeture de moyenne
    $html = $html.'</div>';


    // grande div
    $html = $html.'<div class="note space">';

    $flag = false;
    for ($z = 0; $z < count($not); $z++) {
        if ($not[$z]['id_entreprise'] == $row['id']) {
            $i = intval($not[$z]['note']);


            // retirer
            $html = $html.'<div>';

            $html = $html.'<span><img class="star" src="https://static.projet.com/img/unstar.svg" alt="étoile suppression" onclick=deleteEtoile('.$row['id'].')></span>';

            // fermeture de retirer
            $html = $html.'</div>';


            // div des notes
            $html = $html.'<div id="point_'.$row['id'].'" onmouseout="sortie('.$row['id'].', '.$i.')">';

            for ($j = 0; $j < $i; $j++) {
                $y = $j +1;
                $html = $html.'<span id="'.$row['id'].'_note_'.$y.'" class="star" onclick="envoie('.$row['id'].', '.$y.')" onmouseover="entre('.$row['id'].', '.$y.')">⭐</span>';
            }

            $v = 5 - $i;

            for ($w = 0; $w < $v; $w++) {
                $x = $w +$i +1;
                $html = $html.'<span id="'.$row['id'].'_note_'.$x.'" class="star" onclick="envoie('.$row['id'].', '.$x.')" onmouseover="entre('.$row['id'].', '.$x.')">☆</span>';
            }
            $flag = true;

            break;
        }
    }
    if (!$flag) {
        $html = $html.'<div  onmouseout="sortie('.$row['id'].', 0)">';

        for ($i = 0; $i < 5; $i++) {
            $x = $i +1;
            $html = $html.'<span id="'.$row['id'].'_note_'.$x.'" class="star" onclick="envoie('.$row['id'].', '.$x.')" onmouseover="entre('.$row['id'].', '.$x.')">☆</span>';
        }
    }

    // fermeture de div des notes
    $html = $html.'</div>';

    // fermeture de la grande div
    $html = $html.'</div>';

    // fermeture de down
    $html = $html.'</div>';

    // fermeture de countour
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
