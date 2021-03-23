<?php

$smarty = new Smarty;

$smarty->assign('title', 'Accueil');

if ($_SESSION['role'] == "1") {
    $smarty->assign('role', 'Administrateur');
}
else if ($_SESSION['role'] == "2") {
    $smarty->assign('role', 'Pilote');
}
else if ($_SESSION['role'] == "3") {
    $smarty->assign('role', 'Délégué');
}
else if ($_SESSION['role'] == "4") {
    $smarty->assign('role', 'Etudiant');
}

$html = '';

if ($_SESSION['role'] == "1" || $_SESSION['role'] == "2" || $_SESSION['role'] == "4" || ($_SESSION['role'] == "3" && $_SESSION['deleg']['entreprise'] == "1")) {
    $html = $html.'<div class="row justify-content-center p-2"><a href="/Entreprise"><button>Gestion Entreprise</button></a></div>';
}

if ($_SESSION['role'] == "4" || $_SESSION['role'] == "1" || $_SESSION['role'] == "2" || ($_SESSION['role'] == "3" && $_SESSION['deleg']['offre'] == "1")) {
    $html = $html.'<div class="row justify-content-center p-2"><a href="/Offre"><button>Gestion Offre</button></a></div>';
}

if ($_SESSION['role'] == "1" || ($_SESSION['role'] == "3" && $_SESSION['deleg']['pilote'] == "1")) {
    $html = $html.'<div class="row justify-content-center p-2"><a href="/Pilote"><button>Gestion Pilote</button></a></div>';
}

if ($_SESSION['role'] == "1" || $_SESSION['role'] == "2" || ($_SESSION['role'] == "3" && $_SESSION['deleg']['delegue'] == "1")) {
    $html = $html.'<div class="row justify-content-center p-2"><a href="/Delegue"><button>Gestion Délégué</button></a></div>';
}

if ($_SESSION['role'] == "1" || $_SESSION['role'] == "2" || ($_SESSION['role'] == "3" && $_SESSION['deleg']['etudiant'] == "1")) {
    $html = $html.'<div class="row justify-content-center p-2"><a href="/Etudiant"><button>Gestion Etudiant</button></a></div>';
}

if ($_SESSION['role'] == "1" || $_SESSION['role'] == "2" || $_SESSION['role'] == "4" || ($_SESSION['role'] == "3" && $_SESSION['deleg']['candidature'] == "1")) {
    $html = $html.'<div class="row justify-content-center p-2"><a href="/Candidature"><button>Gestion Candidature</button></a></div>';
}

$smarty->assign('button', $html);

$smarty->display(ROOT.'view/layout/Accueil.tpl');
