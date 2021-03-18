<?php

// ceci est la class du controler global, elle est abstraite pour qu'elle ne puisse etre utilisable que par l'héritage
abstract class Controler {
    public function loadModel(string $model) {
        require_once(ROOT.'model/'.$model.'.php');

        $this->$model = new $model();
    }

    public function render(string $fichier, string $templ, array $data = []) {
        extract($data);

        // ON demare de EventBuffer
        ob_start();

        require_once(ROOT.'view/'.$fichier.'.php');

        $content = ob_get_clean();

        require_once(ROOT.'view/layout/'.$templ.'.php');
    }
}
