<?php

namespace src\classes;

class Article {

    private $nom;

    public function afficheNomArticle($nom) {
        return $this->nom = $nom;
    }
}

?>