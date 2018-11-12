<?php 

// On inclue la classe Personnage.php sur la page :
require_once 'Personnage.php';

// On crée un objet, une instance de la classe Personnage :
$personnage = new Personnage();

// affichage des valeurs des propriétés de l'objet
echo "<div>Nom : ". $personnage->nom ."</div>";
echo "<div>Age : ". $personnage->age ."</div><hr>";

$personnage->direBonjour($personnage->nom);
$personnage->direBonjour("toto");
$personnage->direAuRevoir();
echo "<hr>";

// Affichage des constantes
echo $personnage::ONE . "<br />";
echo $personnage::FOO . "<br />";
// Possible aussi d'appeler directement la classe pour les constantes : 
echo Personnage::ONE;

echo "<hr>";