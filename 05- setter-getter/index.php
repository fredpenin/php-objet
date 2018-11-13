<?php
include "Utils.php";
include "Personnage.php";


$spiderCochon = new Personnage("SUPER COCO", 3);


// $spiderCochon->setName("Babe");

echo $spiderCochon->getName()."<br>";
echo $spiderCochon->getAge()."<br>";
echo "Couleur chemise : ".$spiderCochon->getShirtColor()."<br>";
$spiderCochon->setShirtColor("red");
echo "Couleur chemise : ".Utils::myUcfirst($spiderCochon->getShirtColor())."<br>";