<?php
// On genere une constante qui contiendra le chemin vers index point php
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));
// die(ROOT);

// On les fichiers globaux que l'on utilisera plutard
require_once(ROOT.'app/Model.php');
require_once(ROOT.'app/Controler.php');


// on separe les paramètres du lien pour déterminer ou l'on se trouve
$param = explode('/', $_GET['p']);
// var_dump($param);

if ($param[0] != "") { // si le lien contient un parametre : envoie sur la bonne page

    // le pour que le non du controler sois toujours en majuscule et évité des erreurs
    $controler = ucfirst($param[0]);
    // echo $controler;

    // l'action correspondra a la méthode du controlere qui sera appelé, si il n'y en a pas celle par defalut sera l'index
    $action = isset($param[1]) ? $param[1] : 'index';
    // echo $action;

    // On verifie que le controler existe bien, sinon erreur 404
    if (file_exists(ROOT.'controler/'.$controler.'.php')) {

        // On appel le controler passe en parrametre en on le transphorme en variable grace a la class qu'il transport
        require_once(ROOT.'controler/'.$controler.'.php');
        $controler = new $controler();
    
        // on verifie que la méthode voulu existe bien, sinon erreur 404
        if (method_exists($controler, $action)) {
            // $controler->$action();
            unset($param[0]);
            unset($param[1]);
            call_user_func_array([$controler, $action], $param);
    
        }
        else {
            http_response_code(404);
            echo 'methode introuvable';
        }
    }
    else {
        http_response_code(404);
        echo 'page introuvable';
    }
}
else { // si le lien ne contient pas de parrametre : envoie sur la page d'acceuil ou connexion
    // Controler et methode par default si il n'y a aucun parametre
    $controler = "Connexion";
    $action = 'index';
    
    require_once(ROOT.'controler/Connexion.php');
    $controler = new $controler();
    $controler->$action();
}
