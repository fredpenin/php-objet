<?php

include "Voiture.php";

$voiture = new Voiture("Tesla", "s90");

echo $voiture->brand; // erreur car "private"