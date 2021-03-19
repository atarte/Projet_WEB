<?php

$smarty = new Smarty;

$smarty->assign('title', 'Accueil');

$html = '';

if ($_SESSION['role'] == "1" || $_SESSION['role'] == "2" || $_SESSION['role'] == "4" || ($_SESSION['role'] == "3" && $_SESSION['deleg']['entreprise'] == "1")) {
    $html = $html.'<a href="/Entreprise"><button>Gestion Entreprise</button></a><br>';
}

if ($_SESSION['role'] == "1" || $_SESSION['role'] == "2" || ($_SESSION['role'] == "3" && $_SESSION['deleg']['offre'] == "1")) {
    $html = $html.'<a href="/Offre"><button>Gestion Offre</button></a><br>';
}

if ($_SESSION['role'] == "1" || ($_SESSION['role'] == "3" && $_SESSION['deleg']['pilote'] == "1")) {
    $html = $html.'<a href="/Pilote"><button>Gestion Pilote</button></a><br>';
}

if ($_SESSION['role'] == "1" || $_SESSION['role'] == "2" || ($_SESSION['role'] == "3" && $_SESSION['deleg']['delegue'] == "1")) {
    $html = $html.'<a href="/Delegue"><button>Gestion Delegue</button></a><br>';
}

if ($_SESSION['role'] == "1" || $_SESSION['role'] == "2" || ($_SESSION['role'] == "3" && $_SESSION['deleg']['etudiant'] == "1")) {
    $html = $html.'<a href="/Etudiant"><button>Gestion Etudiant</button></a><br>';
}

if ($_SESSION['role'] == "1" || $_SESSION['role'] == "2" || $_SESSION['role'] == "4" || ($_SESSION['role'] == "3" && $_SESSION['deleg']['candidature'] == "1")) {
    $html = $html.'<a href="/Candidature"><button>Gestion Candidature</button></a><br>';
}

$smarty->assign('button', $html);

$smarty->display(ROOT.'view/layout/Accueil.tpl');
