<?php
// Enoncé : https://campus-osw3.gitbook.io/programmation-orient-objet-avec-php/classes-et-objets/cas-pratique

include "Voiture.php";

$ford = new Voiture("Ford", "Ranger", "Noire", "Michel");
$toyota = new Voiture("Toyota", "Hillux", "Blanc");
$dodge = new Voiture("Dodge", "RAM 1500", "Rouge", "Janine");

// Démarrer les voiture 1 et 3
echo "<div>Ford démarré ? ". ($ford->isStarted ? "oui":"non") ."</div>";
echo "<div>Toyota démarré ? ". ($toyota->isStarted ? "oui":"non") ."</div>";
echo "<div>Dodge démarré ? ". ($dodge->isStarted ? "oui":"non") ."</div>";
$ford->start();
// $toyota->start();
$dodge->start();

echo "<div>Ford démarré ? ". ($ford->isStarted ? "oui":"non") ."</div>";
echo "<div>Toyota démarré ? ". ($toyota->isStarted ? "oui":"non") ."</div>";
echo "<div>Dodge démarré ? ". ($dodge->isStarted ? "oui":"non") ."</div>";
echo "<hr>";

// On fait avancer les voitures
echo "<div>Vitesse de Ford : ". $ford->speed ."</div>";
echo "<div>Vitesse de Dodge : ". $dodge->speed ."</div>";
$ford->accelerate(50);
$dodge->accelerate(30);

echo "<div>Vitesse de Ford : ". $ford->speed ."</div>";
echo "<div>Vitesse de Dodge : ". $dodge->speed ."</div>";
echo "<hr>";
echo "<div>Vitesse Max de Ford : ". $ford->maxSpeed ."</div>";
echo "<div>Vitesse Max de Dodge : ". $dodge->maxSpeed ."</div>";
echo "<hr>";

// on fait tourner les voitures
echo "<div>Vitesse de Ford : ". $ford->speed ."</div>";
echo "<div>Vitesse de Dodge : ". $dodge->speed ."</div>";
$ford->turn("right");
$dodge->turn("right");
echo "<div>Vitesse de Ford : ". $ford->speed ."</div>";
echo "<div>Vitesse de Dodge : ". $dodge->speed ."</div>";
echo "<hr>";
echo "<div>Vitesse de Ford : ". $ford->speed ."</div>";
echo "<div>Vitesse de Dodge : ". $dodge->speed ."</div>";
$ford->accelerate(30);
$dodge->accelerate(40);
echo "<div>Vitesse de Ford : ". $ford->speed ."</div>";
echo "<div>Vitesse de Dodge : ". $dodge->speed ."</div>";
echo "<hr>";
echo "<div>Vitesse de Ford : ". $ford->speed ."</div>";
$ford->turn("left");
echo "<div>Vitesse de Ford : ". $ford->speed ."</div>";
echo "<hr>";

// on arrete les voitures
echo "<div>Vitesse de Ford : ". $ford->speed ."</div>";
echo "<div>Vitesse de Dodge : ". $dodge->speed ."</div>";
$ford->decelerate(0);
$dodge->decelerate(0);
$ford->stop();
$dodge->stop();

echo "<div>Vitesse de Ford : ". $ford->speed ."</div>";
echo "<div>Vitesse de Dodge : ". $dodge->speed ."</div>";
echo "<hr>";
echo "<div>Ford démarré ? ". ($ford->isStarted ? "oui":"non") ."</div>";
echo "<div>Toyota démarré ? ". ($toyota->isStarted ? "oui":"non") ."</div>";
echo "<div>Dodge démarré ? ". ($dodge->isStarted ? "oui":"non") ."</div>";
echo "<hr>";
echo "<div>Vitesse Max de Ford : ". $ford->maxSpeed ."</div>";
echo "<div>Vitesse Max de Dodge : ". $dodge->maxSpeed ."</div>";
echo "<hr>";
echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
// echo "<div>Vitesse de Ford : ". $ford->speed ."</div>";
// echo "<div>Model de Ford : ". $ford->model ."</div>";