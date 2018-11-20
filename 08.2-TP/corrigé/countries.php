<?php
/**
 * TP PHP POO
 * 
 * Pays et Capitales
 * 
 * Partie 1 : Déclaration de la classe
 * Partie 2 : Utilisation de la classe
 */


/**
 * Partie 1 : Déclaration de la classe
 */



// Déclaration de la classe CountryCapital
class CountryCapital {

    /**
     * Chemin du fichier contenant la liste des pays/capitales
     *
     * @var string
     */
    private $file;

    /**
     * Tableau contenant la liste des pays/capitales, aprés récupération du
     * contenu du fichier $this->file
     *
     * @var array
     */
    private $countries;

    /**
     * Le constructteur récupère le chemine du fichier et exécute la procédure 
     * de récupération et d'affectation de la liste des pays/capitales dans la 
     * propriété $this->countries
     *
     * @param string $file
     */
    public function __construct(string $file)
    {
        $this->file = $file;
        $this->getFile();
    }

    /**
     * Vérification de l'existence du fichier source, Si oui: procédure 
     * de récupération et d'affectation de la liste des pays/capitales dans la 
     * propriété $this->countries
     *
     * @return void
     */
    private function getFile()
    {
        if (file_exists($this->file))
        {
            $file_content = file_get_contents($this->file);
            $file_content = json_decode($file_content);

            $this->countries = $file_content;
        }

        // Affiche une erreur si le fichier est introuvable
        else {
            echo "Le fichier ".$this->file." est introuvable";
        }
    }

    /**
     * Lit et affiche la liste complète des pays/capitales incrite dans le 
     * fichier source
     *
     * @return void
     */
    public function getCapitals()
    {
        foreach ($this->countries as $country) 
        {
            echo $country->capital ." est la capital du pays ". $country->country ."<br>";
        }
    }

    /**
     * Recherche et affiche la capital du pays donnés entrée de la méthode
     *
     * @param string $countryName Nom du pays pour lequel on recherche la capital
     * @return void
     */
    public function getCapitalByCountry(string $countryName)
    {
        foreach ($this->countries as $country) 
        {
            if ($countryName == $country->country) 
            {
                echo "La capitale du pays <strong>".$countryName."</strong> est <strong>".$country->capital."</strong><br>";
            }
        }
    }

    /**
     * Recherche et affiche le pays de la capitale donnés entrée de la méthode
     *
     * @param string $capitalName Nom de la capital pour laquel on recherche le pays
     * @return void
     */
    public function getCountryByCapital(string $capitalName)
    {
        foreach ($this->countries as $country) 
        {
            if ($capitalName == $country->capital) 
            {
                echo "<strong>".$capitalName ."</strong> est la capitale du pays <strong>".$country->country."</strong><br>";
            }
        }
    }
}



/**
 * Partie 2 : Utilisation de la classe
 */

$europa = new CountryCapital("europa.json");
$europa->getCapitalByCountry("France");
$europa->getCountryByCapital("Paris");
$europa->getCapitals();

$america = new CountryCapital("america.json");