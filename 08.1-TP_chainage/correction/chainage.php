<?php
/**
 * TP PHP POO
 * 
 * Chainage de méthodes
 * 
 * Partie 1 : Déclaration de la classe
 * Partie 2 : Utilisation de la classe
 */


/**
 * Partie 1 : Déclaration de la classe
 */


// Déclaration de la classe Text
class Text {

    /**
     * La propriété $text sert à stocker la chaine qui sera manipulé 
     * puis affiché
     * 
     * @var string
     */
    private $text;

    /**
     * Méthode qui affecte le texte à manipuler à la propriété $this->text
     *
     * @param string $text
     * @return self
     */
    public function set(string $text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Formate le texte en gras
     *
     * @return self
     */
    public function bold()
    {
        $this->text = "<strong>$this->text</strong>";

        return $this;
    }

    /**
     * Formate le texte en italic
     *
     * @return self
     */
    public function italic()
    {
        $this->text = "<em>$this->text</em>";

        return $this;
    }

    /**
     * Formate le texte en texte barré
     *
     * @return self
     */
    public function strike()
    {
        $this->text = "<del>$this->text</del>";

        return $this;
    }

    /**
     * Retourne le texte à afficher
     *
     * @return string
     */
    public function print()
    {
        return $this->text;
    }
}



/**
 * Partie 2 : Utilisation de la classe
 */

$hello = "Hello World";
$text = new Text;
echo $text->set($hello)->print()."<br>";
echo $text->set($hello)->bold()->print()."<br>";
echo $text->set($hello)->italic()->print()."<br>";
echo $text->set($hello)->strike()->print()."<br>";
echo $text->set($hello)->italic()->bold()->strike()->print()."<br>";