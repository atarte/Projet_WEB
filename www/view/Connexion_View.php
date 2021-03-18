<?php


if (isset($err)) {
    if ($err == '1') {
        echo "Utilisateur ou mot de passe incorect !";
    }
    else if ($err == '2') {
        echo "Adresse mail déjà utilsé !";
    }
}