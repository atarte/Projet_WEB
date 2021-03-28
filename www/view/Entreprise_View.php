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
    $html = $html.'<div id=id_"'.$row['id'].'" class="p-1 m-1 case">';

    $html = $html.'<div class="gauche"><div><img class="ico" src="https://static.projet.com/img/entreprise.png" alt="icone entreprise"></div>';

    $titre = strtoupper($row['nom']);
    $html = $html.' <div><div><u><b><span id="nom_'.$row['id'].'">'.$titre.'</span></b></u></div>';

    $entreprise = ucfirst($row['nom']);
    $html = $html.'<div>Nom = <span id="nom_'.$row['id'].'">'.$entreprise.'</span><br>';

    $html = $html.'Secteur d\'activité : <span id="secteur_'.$row['id'].'">'.$row['secteur'].'</span><br>';

    $html = $html.'Adresse = <span id="adresse_'.$row['id'].'">'.$row['adresse'].'</span>, <span id="ville_'.$row['id'].'">'.$row['ville'].'</span> <span id="code_p_'.$row['id'].'">'.$row['code_p'].'</span> <span id="region_'.$row['id'].'">'.$row['region'].'</span><br>';

    $html = $html.'Nombre de Stagiaire pris : <span id="nombre_'.$row['id'].'">'.$row['nombre'].'</span><br>';

    $html = $html.'Email :<span id="email_'.$row['id'].'">'.$row['email'].'</span><br>';

    for ($i = 0; $i < count($conf); $i++) {
        if ($conf[$i]['id_ent'] == $row['id'] && !empty($conf)) {
            $html = $html.'Cette entreprise à la confiance de'.count($conf).' pilote(s).';
        }
    }

    $html = $html.'</div></div></div>';

    $html = $html.'<div><img class="icop" src="https://static.projet.com/img/update.svg" alt="icone modification" onclick=modification('.$row['id'].')></div>';

    $html = $html.'<div><img class="icop" src="https://static.projet.com/img/delete.svg" alt="icone suppression" onclick=confirmation('.$row['id'].')></div>';

    $html2 ="";



    if ($_SESSION['role'] == '2'){

        if(count($conf) == 0) {

            $html2 = $html2.'<div><button id="conf" onclick=confiance('.$row['id'].')>Faire Confiance</button></div>';
        }
        else {
            for ($i = 0; $i < count($conf); $i++) {
                if ($conf[$i]['id_ent'] == $row['id'] && $conf[$i]['id_user'] == $_SESSION['id']) {

                    $html2 = $html2.'<div><button id="conf" onclick=confiance('.$row['id'].')>Annuler la Confiance</button></div>';
                    break;
                }
                else {
                    $html2 = $html2.'<div><button id="conf" onclick=confiance('.$row['id'].')>Faire Confiance</button></div>';
                }
            }
        }
    }
    elseif ($_SESSION['role'] == '4') {

        $html = $html.'<div>'; //grande div

        $flag = false;
        for ($z = 0; $z < count($not); $z++) {
            if ($not[$z]['id_entreprise'] == $row['id']) {
                $i = intval($not[$z]['note']);

                $html = $html.'<div id="point_'.$row['id'].'" onmouseout="sortie('.$row['id'].', '.$i.')" onmo>';

                for ($j = 0; $j < $i; $j++) {
                    $y = $j +1;
                    $html = $html.'<span id="'.$row['id'].'_note_'.$y.'" class="star" onclick="envoie('.$row['id'].', '.$y.')" onmouseover="entre('.$row['id'].', '.$y.')">⭐</span>';
                }

                $v = 5 - $i;

                for ($w = 0; $w < $v; $w++) {
                    $x = $w +$i +1;
                    $html = $html.'<span id="'.$row['id'].'_note_'.$x.'" class="star" onclick="envoie('.$row['id'].', '.$y.')" onmouseover="entre('.$row['id'].', '.$x.')">☆</span>';
                }
                $flag = true;

                $html = $html.'<span><img class="star" src="https://static.projet.com/img/unstar.svg" alt="étoile suppression" onclick=deleteEtoile('.$row['id'].')></span>';
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


        $html = $html.'</div>';


        $html = $html.'<div>';  // moyenne

        $html = $html.'</div>';


        $html = $html.'</div>';
    }

    $html = $html.$html2.'</div>';

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
