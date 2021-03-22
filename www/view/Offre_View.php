<?php

$smarty = new Smarty;

$smarty->assign('title', 'Gestion Offre');

$html = '';
while ($row = $this->type_promo->fetch()) {
    $html = $html.'<option value="'.$row['id'].'">'.$row['spe'].'</option>';
}

$smarty->assign('Type', $html);


$html = '';
while ($row = $this->ville->fetch()) {
    $html = $html.'<option value="'.$row['id'].'">'.$row['ville'].'</option>';
}

$smarty->assign('Ville', $html);


$html = '';
while ($row = $this->entreprise->fetch()) {
    $html = $html.'<option value="'.$row['id'].'">'.$row['entreprise'].'</option>';
}

$smarty->assign('Entreprise', $html);


$html = '';
// $html2 = '';
$i = 0;

while ($row = $this->offre->fetch()) {
    $html = $html.'<div id="'.$row["id"].'">';

    $html = $html.' Nom : <span id="nom_'.$row['id'].'">'.$row['nom'].'</span><br>';

    $html = $html.' Entreprise : <span id="entreprise_'.$row['id'].'">'.$row['entreprise'].'</span><br>';

    $html = $html.' Ville : <span id="ville_'.$row['id'].'">'.$row['ville'].'</span><br>';

    $html = $html.' Durée : <span id="duree_'.$row['id'].'">'.$row['stage'].'</span><br>';

    $html = $html.' Spécialité : <span id="spe_'.$row['id'].'">'.$row['specialite'].'</span><br>';

    // while ($row2 = $this->competence->fetchAll(PDO::FETCH_COLUMN)) {
    //     $html2 = $html2.' Compétences : <span id="competence_'.$row2['Nom'].'">'.$row2['competence'].'</span><br>';
    // }
    $html = $html.' Competence : ';
    while ($comp = $this->competence[i]->fetch()) {
        $html = $html.'<span id="comp'.i.'_'.$comp['id'].'">'.$comp['competence'].'</span><br>';
    }
    $i++;

    $html = $html.' Nombres de place(s) : <span id="nb_'.$row['id'].'">'.$row['nb_place'].'</span><br>';

    $html = $html.' Rémunération (mensuelle) : <span id="remuneration_'.$row['id'].'">'.$row['remuneration'].' €</span><br>';

    $html = $html.' Date de dépôt : <span id="date_'.$row['id'].'">'.$row['date_offre'].'</span><br>';

    $html = $html.' Email : <span id="email_'.$row['id'].'">'.$row['email'].'</span><br>';

    $html = $html.'<button onclick=confirmation('.$row['id'].')>Supprimer</button>';

    $html = $html.'<button onclick=modification('.$row['id'].')>Modifier</button><br><br>';

    $html = $html.'<br></div>';

}

$smarty->assign('Offre',$html);
// $smarty->assign('Competence',$html2);

$smarty->display(ROOT.'/view/layout/Offre.tpl');
