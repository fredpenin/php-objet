<?php
class Voiture 
{
    /**
     * PROPERTIES
     */
    
    /**
     * Marque de la voiture
     * @var string
     */
    public $brand;
    /**
     * Model de la voiture
     * @var string
     */
    public $model;
    /**
     * Couleur de la voiture
     * @var string
     */
    public $color;
    /**
     * La voiture est elle en marche (demarrée ?)
     * @var bool
     * @default false
     */
    public $isStarted = false;
    /**
     * Vitesse courante de la voiture
     * @var int
     * @default 0
     */
    public $speed = 0;
    /**
     * Vitesse max atteinte par la voiture
     * @var int
     * @default 0
     */
    public $maxSpeed = 0;
    /**
     * Nom du conduteur
     * @var string
     */
    public $driver;
    /**
     * La voiture à t'elle un conducteur ?
     * @var bool
     * @default false
     */
    public $hasDriver = false;
    /**
     * CONSTRUCTOR
     */
    public function __construct(string $brand, string $model, string $color, string $driver = "")
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->color = $color;
        $this->driver = $driver;
        if (!empty($this->driver)) 
        {
            $this->hasDriver = true;
        }
    }
    /**
     * METHODES
     */
    /**
     * Démarrer la voiture
     * le véhicule doit être à l'arrêt 
     * et avoir un conducteur
     */
    public function start()
    {
        if (!$this->isStarted && $this->hasDriver) 
        {
            $this->isStarted = true;
        }
        else {
            exit("La voiture $this->brand ne peut pas démarrer.");
        }
    }
    /**
     * Fait avancer la voiture jusqu'a une vitesse donnée
     * le véhicule doit être démarré
     * 
     * @param int $speed vitesse à atteindre
     */
    public function accelerate(int $speed)
    {
        if ($this->isStarted)
        {
            $this->speed = $speed;
            // Surcharge la vitesse max atteinte par la voiture
            if ($this->speed > $this->maxSpeed) 
            {
                $this->maxSpeed = $this->speed;
            }
        }
    }
    /**
     * Fait ralentir la voiture jusqu'a une vitesse donnée
     * le véhicule doit être en mouvement
     * 
     * @param int $speed vitesse à atteindre
     */
    public function decelerate(int $speed)
    {
        if ($this->speed > $speed && $speed >= 0) 
        {
            $this->speed = $speed;
        }
    }
    /**
     * Fait tourner la voiture dans une direction données
     * la vitesse ne doit pas être >= à 30 km/h
     * 
     * @param string $direction
     */
    public function turn(string $direction)
    {
        if ($this->speed >= 30) 
        {
            $this->decelerate(29);
        }
        echo "On tourne à ".$direction ."<br />";
    }
    /**
     * Stop la voiture
     * le véhicule doit être en marche et à une vitesse de 0km/h
     */
    public function stop()
    {
        if ($this->isStarted && $this->speed == 0)
        {
            $this->isStarted = false;
        }
    }
}