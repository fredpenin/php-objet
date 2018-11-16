<?php
class CountryCapital{

/////// PROPRIETES /////////
private $capital;
private $coutry;

private $capitals;

///////// CONSTRUCTEUR ///////////
public function __construct(string $continentFile)
{
    // connexion au fichier json
    $file = file_get_contents ($continentFile);
    $this->capitals = json_decode($file);
    //var_dump($this->capitals);

}


/////////////////////////////// METHODES ////////////////////////////////////

/////////////// GETTERS / SETTERS ///////////////
/**
 * Get the value of capital
 */ 
public function getCapital()
{
return $this->capital;
}

/**
 * Set the value of capital
 *
 * @return  self
 */ 
public function setCapital($capital)
{
$this->capital = $capital;

return $this;
}

/**
 * Get the value of coutry
 */ 
public function getCoutry()
{
return $this->coutry;
}

/**
 * Set the value of coutry
 *
 * @return  self
 */ 
public function setCoutry($coutry)
{
$this->coutry = $coutry;

return $this;
}
///////// Fin des Getters / Setters //////////////
//  //  //  //  //  //  //  //  //  //  //  //  //


/////////////////// AUTRES METHODES /////////////////////
/**
 * retourne la capitale du pays dans la question
 */
function getCapitalByCountry(){
    return $this;
}

/**
 * retourne le pays dont la capitale est mentionnée dans la question
 */
function getCountryByCapital(){
    return $this;
}

/**
 * Vous affichera toutes les capitales et leur pays en une seule foi
 */
function getCapitals(){
    foreach($this->capitals as $capital){
        echo $capital->country." est la capitale de ".$capital->capital."<br />";
    }

}

///////////////////////////////////////////////////////////////////////////


}
