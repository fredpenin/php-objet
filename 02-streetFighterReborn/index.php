<?php
// Enoncé : https://campus-osw3.gitbook.io/programmation-orient-objet-avec-php/classes-et-objets/cas-pratique

require_once "Personnage.php";

// Création des personnages
$batman = new Personnage("Batman", Personnage::MEDIUM);
$superman = new Personnage("Superman", Personnage::NOVICE);

echo "<h1>".$batman->name." vs. ".$superman->name."</h1>";

echo "<h3>".$batman->name."</h3>";
echo "<div> Points de vie : " . $batman->life . "</div>";
echo "<div> Expérience : " . $batman->xp . "</div>";

echo "<h3>".$superman->name."</h3>";
echo "<div> Points de vie : " . $superman->life . "</div>";
echo "<div> Expérience : " . $superman->xp . "</div>";

echo "<hr>";

echo "<h2>Début du combat !</h2>";
echo "<div>" . $batman->sayHello($superman) . "</div>";
echo "<div>" . $superman->sayHello($batman) . "</div>";
echo "<div>Score : Batman ".$batman->life." / ".$superman->life." Superman</div>";

echo "<h3>Batman attaque Superman</h3>";
$batman->attack($superman);
echo "<div>Score : Batman ".$batman->life." / ".$superman->life." Superman</div>";

echo "<h3>Superman riposte : Attaque + SuperAttaque</h3>";
$superman->attack($batman);
echo "<div>Score : Batman ".$batman->life." / ".$superman->life." Superman</div>";
$superman->superAttack($batman);
echo "<div>Score : Batman ".$batman->life." / ".$superman->life." Superman</div>";

echo "<h3>Une magnifique SuperAttaque de Batman !!</h3>";
$batman->superAttack($superman);
echo "<div>Score : Batman ".$batman->life." / ".$superman->life." Superman</div>";

echo "<h3>Superman se soigne</h3>";
$superman->care();
echo "<div>Score : Batman ".$batman->life." / ".$superman->life." Superman</div>";

echo "<h3>Batman tente une attaque secrète (mais échoue)</h3>";
$batman->secretAttack($superman);
echo "<div>Score : Batman ".$batman->life." / ".$superman->life." Superman</div>";

echo "<h3>Superman encore affaibli se défend avec une double attaque</h3>";
$superman->attack($batman);
echo "<div>Score : Batman ".$batman->life." / ".$superman->life." Superman</div>";
$superman->attack($batman);
echo "<div>Score : Batman ".$batman->life." / ".$superman->life." Superman</div>";

echo "<h3>Batman répond d'une attaque simple suivi d'une attaque secrète</h3>";
$batman->attack($superman);
echo "<div>Score : Batman ".$batman->life." / ".$superman->life." Superman</div>";
$batman->secretAttack($superman);
echo "<div>Score : Batman ".$batman->life." / ".$superman->life." Superman</div>";

echo "<h3>Superman est au tapie et Batman gagne un point d'expérience.</h3>";
$batman->levelUp();