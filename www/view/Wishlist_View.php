<?php

$smarty = new Smarty;

$smarty->assign('title', 'Wishlist');

$smarty->display(ROOT.'/view/layout/Wishlist.tpl');


// Appel des Souhaits et Postulation
// $cand = $this->wish->fetchAll();
// $postu = $this->post->fetchAll();
//
//
// // Affichage des Offres
// $html = '';
// $i = 0;
//
// while ($row = $this->offre->fetch()) {
//     $html = $html.'<div id=id_"'.$row['id'].'" class="p-1 m-1 case">';
//
//     $html = $html.'<div class="gauche"><div><img class="ico" src="http://static.projet.com/img/intership.svg" alt="icone stage"></div>';
//
//     $titre = strtoupper($row['nom']);
//
//     $html = $html.' <div><div><u><b><span id="nom_'.$row['id'].'">'.$titre.'</span></b></u></div>';
//
//     $entreprise = ucfirst($row['entreprise']);
//     $html = $html.' <div>L\'entreprise <span id="entreprise_'.$row['id'].'">'.$entreprise.'</span>';
//
//     $html = $html.' situé à <span id="ville_'.$row['id'].'">'.$row['ville'].'</span>';
//
//     $html = $html.' recherche <span id="nb_'.$row['id'].'">'.$row['nb_place'].'</span> stagiaire(s)';
//
//     $html = $html.' pour une durée <span id="duree_'.$row['id'].'">'.$row['stage'].'</span>';
//
//     $html = $html.' à partir du <span id="date_'.$row['id'].'">'.$row['date_offre'].'</span>.';
//
//     $html = $html.' Ce stage vise les étudiants dont la spécialité est <span id="specialite_'.$row['id'].'">'.$row['specialite'].'</span>.';
//
//     $html = $html.' L\'étudiant devra avoir les compétences suivante : <span id="competences_'.$row['id'].'">'.$row['competence'].'</span>.';
//
//     $html = $html.' Ce stage permettra une rémunération de <span id="remuneration_'.$row['id'].'">'.$row['remuneration'].'</span>€.';
//
//     $html = $html.' Pour plus d\'information, merci de nous contacter à cette adresse : <span id="email_'.$row['id'].'">'.$row['email'].'</span>.</div></div></div>';
//
//     $jsp = '';
//     $jsp2 = '';
//
// // Si un étudiant se connecte les boutons changent pour postuler et wishList
//     if ($_SESSION['role'] == 4) {
//
//         if (count($cand) == 0) {
//
//             $jsp = '<img class="icop" src="http://static.projet.com/img/noWish.png" alt="icone whish" onclick=ajout_wish('.$row['id'].')>';
//         }
//         else {
//
//             for ($i = 0; $i < count($cand); $i++) {
//
//                 if ($cand[$i]['id_stage'] == $row['id'] && !empty($cand[$i]['souhait'])) {
//
//                     $jsp = '<img class="icop" src="http://static.projet.com/img/Wish.png" alt="icone whish" onclick=rejet_wish('.$row['id'].')>';
//                     break;
//                 }
//                 else {
//
//                     $jsp = '<img class="icop" src="http://static.projet.com/img/noWish.png" alt="icone whish" onclick=ajout_wish('.$row['id'].')>';
//                 }
//             }
//         }
//
//         if (count($postu) == 0) {
//
//             $jsp2 = '<img class="icop" src="http://static.projet.com/img/noPost.png" alt="icone postuler" onclick=ajout_post('.$row['id'].')>';
//         }
//         else {
//
//             for ($i = 0; $i < count($postu); $i++) {
//
//                 if ($postu[$i]['id_stage'] == $row['id'] && !empty($postu[$i]['postulation'])) {
//
//                     $jsp2 = '<img class="icop" src="http://static.projet.com/img/Post.png" alt="icone postuler" onclick=rejet_post('.$row['id'].')>';
//
//                     break;
//                 }
//                 else {
//                     $jsp2 = '<img class="icop" src="http://static.projet.com/img/noPost.png" alt="icone postuler" onclick=ajout_post('.$row['id'].')>';
//                 }
//             }
//         }
//     }
//     else {
//         $jsp = '<img class="icop" src="http://static.projet.com/img/update.svg" alt="icone modification" onclick=modification('.$row['id'].')>';
//
//         $jsp2 = '<img class="icop" src="http://static.projet.com/img/delete.svg" alt="icone suppression" onclick=confirmation('.$row['id'].')>';
//     }
//
//     $html = $html.'<div><div>'.$jsp.'</div><div>'.$jsp2.'</div></div>';
//
//
//     $html = $html.'</div>';
// }
// $smarty->assign('Offre',$html);
