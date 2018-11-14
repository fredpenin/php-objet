<?php
include "Vehicule.php";
include "Voiture.php";
include "Moto.php";
$chevrolet = new Voiture("Chevrolet", "Camaro", "Jaune", "Sam Witwiki");
echo "<div>Marque : ".$chevrolet->getBrand()."</div>";
echo "<div>Model : ".$chevrolet->getModel()."</div>";
echo "<div>Type : ".$chevrolet::VEHICULE_TYPE."</div>";
echo "<div>Type : ".Voiture::VEHICULE_TYPE."</div>";
$harley = new Moto("Harley", "Soft", "Rouge", "William");
echo "<div>Marque : ".$harley->getBrand()."</div>";
echo "<div>Model : ".$harley->getModel()."</div>";
echo "<div>Type : ".$harley::VEHICULE_TYPE."</div>";
echo "<div>Type : ".Moto::VEHICULE_TYPE."</div>";