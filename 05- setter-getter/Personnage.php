<?php 
class Personnage
{
    /**
     * Nom du personnage
     * @var string
     */
    private $name;
    /**
     * Age du personnage
     * @var int
     */
    private $age;
    /**
     * Couleur de la chemise
     * @var string
     */
    private $shirtColor;
    /**
     * CONSTRUCTOR
     */
    /**
     * Constructeur
     */
    public function __construct(string $name, int $age)
    {
        $this->setName($name);
        $this->setAge($age);
    }
    /**
     * SETTER / GETTER
     */
    /**
     * Donne le nom du personnage
     * 
     * @param string $name Nom du personnage
     * @return object
     */
    private function setName(string $name)
    {
        $this->name = Utils::myUcfirst($name);
        return $this;
    }
    /**
     * Rend le nom du personnage
     * 
     * @return string Nom du personnage
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Donne l'age du personnage
     * 
     * @param int $age Age du personnage
     * @return object
     */
    private function setAge(int $age)
    {
        $this->age = $age;
        return $this;
    }
    /**
     * Rend l'age du personnage
     * 
     * @return int Age du personnage
     */
    public function getAge()
    {
        return $this->age;
    }
    /**
     * Donne la couleur de la chemise du personnage
     * 
     * @param string $color Couleur de la chemoise
     * @return object
     */
    public function setShirtColor(string $color)
    {
        $this->shirtColor = $color;
        return $this;
    }
    /**
     * Rend la couleur de la chemise du personnage
     * 
     * @return string Couleur de la chemise
     */
    public function getShirtColor()
    {
        return $this->shirtColor;
    }
    public function attack(Personnage $opponent)
    {
        echo $opponent->getName();
    }
}