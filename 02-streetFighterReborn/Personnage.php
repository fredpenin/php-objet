<?php

class Personnage {
    ////////////////////////////
    /////// Constantes /////////
    /**
     * Niveau Novice 
     * @param int
     */
    const NOVICE = 1;
    
    /**
     * Niveau Medium 
     * @param int
     */
    const MEDIUM = 2;

    /**
     * Niveau Expert 
     * @param int
     */
    const EXPERT = 3;
    //////////////////////////////
    //////// Propriétés///////////
    /**
     * Nom du personnage
     * @param string
     */
    public $name;
    
    /**
     * Points de vie du personnage
     * @param int
     * @default 100
     */
    public $life = 100;
    
    /**
     * Niveau d'expérience du personnage
     * @param int
     */
    public $xp;


    /**
     * Constructeur
     */
    public function __construct(string $character_name, int $experience = self::NOVICE)
    {
        $this->name = $character_name;
        $this->xp = $experience;
    }
    ////////////////////////////////
    ///////// Méthodes//////////////
    /**
     * Saluer son adversaire
     * @param object $name Nom de l'adversaire
     * @return string Perso A salue le Perso B
     */
    public function sayHello($opponent)
    {
        return $this->name." salue ". $opponent->name;
    }

    /**
     * On attaque un adversaire et on lui soustrait des points de vie
     */
    public function attack($opponent, $coef = 1)
    {
        switch($this->xp){
            case self::NOVICE:
                $opponent->life -= (10 * $coef);
                break;

            case self::MEDIUM:
                $opponent->life -= (20 * $coef);
                break;

            case self::EXPERT:
                $opponent->life -= (30 * $coef);
                break;
        }
    }

    /**
     * Une super attaque double les dégats
     */
    public function superAttack($opponent)
    {
        $this->attack($opponent, 2);
    }

    /**
     * Un soin apporte 10 points de vie
     */
    public function care(){
        $this->life += 10;
    }

    /**
     * Une attaque secrète est réussie lorsque l'adversaire possède 
     * MOINS de 50 points de vie
     */
    public function secretAttack($opponent){
        if ($opponent->life < 50){
            $opponent->life = 0;
        }
    }

    public function levelUp(){
        switch($this->xp){
            case self::NOVICE:
                $this->xp = self::MEDIUM;

            case self::MEDIUM:
                $this->xp = self::EXPERT;

            default:
                $this->xp = self::NOVICE;
        }
    }
}