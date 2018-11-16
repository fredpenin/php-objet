<?php
abstract class Vehicule
{
    private $brand;
    private $model;
    private $color;
    private $driver;
    private $speed;
    private $maxSpeed;
    private $isStarted;
    private $hasDriver;
    /**
     * CONSTRUCTOR
     */
    public function __construct(string $brand, string $model, string $color, string $driver = "")
    {
        $this->setBrand($brand);
        $this->setModel($model);
        $this->setColor($color);
        $this->setDriver($driver);
        if (!empty($this->getDriver())) 
        {
            $this->setHasDriver(true);
        }
    }
    /**
     * SETTER / GETTER
     */
    public function setBrand($brand)
    {
        $this->brand = $this->formatBrand($brand);
        return $this;
    }
    public function getBrand()
    {
        return $this->brand;
    }
    private function formatBrand($brand)
    {
        return strtolower($brand);
        // return Utils::myUcfirst($brand);
    }
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }
    public function getModel()
    {
        return $this->model;
    }
    public function setColor($color)
    {
        $this->color = $color;
        return $this;
    }
    public function getColor()
    {
        return $this->color;
    }
    public function setDriver($driver)
    {
        $this->driver = $driver;
        return $this;
    }
    public function getDriver()
    {
        return $this->driver;
    }
    public function setSpeed($speed)
    {
        $this->speed = $speed;
        return $this;
    }
    public function getSpeed()
    {
        return $this->speed;
    }
    public function setMaxSpeed($maxSpeed)
    {
        $this->maxSpeed = $maxSpeed;
        return $this;
    }
    public function getMaxSpeed()
    {
        return $this->maxSpeed;
    }
    public function setIsStarted($isStarted)
    {
        $this->isStarted = $isStarted;
        return $this;
    }
    public function getIsStarted()
    {
        return $this->isStarted;
    }
    public function setHasDriver($hasDriver)
    {
        $this->hasDriver = $hasDriver;
        return $this;
    }
    public function getHasDriver()
    {
        return $this->hasDriver;
    }
    /**
     * METHODES
     */
    /**
     * Démarrer le véhicule
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
            exit("Le véhicule $this->brand ne peut pas démarrer.");
        }
    }
    /**
     * Fait avancer le véhicule jusqu'a une vitesse donnée
     * le véhicule doit être démarré
     * 
     * @param int $speed vitesse à atteindre
     */
    public function accelerate(int $speed)
    {
        if ($this->isStarted)
        {
            $this->speed = $speed;
            // Surcharge la vitesse max atteinte par le véhicule
            if ($this->speed > $this->maxSpeed) 
            {
                $this->maxSpeed = $this->speed;
            }
        }
    }
    /**
     * Fait ralentir le véhicule jusqu'a une vitesse donnée
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
     * Fait tourner le véhicule dans une direction données
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
        echo "On tourne à ".$direction."<br>";
    }
    /**
     * Stop le véhicule
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