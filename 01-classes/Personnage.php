<?php

// Création d'une classe (toujours en UpperCamelCase; nommer le fichier à l'identique)
// toujours 1 fichier par classe
class Personnage {
    //Déclaration des constantes
    const ONE = 1;
    const FOO = "bar";

    // Déclaration des propriétés (ou attributs) de la classe
    public $nom = "Francis";
    public $age = 53;

    // Déclaration des méthodes de la classe
    public function direBonjour(string $name){
        echo 'Bonjour ' . $name . "<br />";
    }
    public function direAuRevoir(){
        echo 'Au revoir ' . "<br />";
    }
}


