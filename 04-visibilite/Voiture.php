<?php

class Voiture 
{
    private $brand;
    private $model;



    public function __construct(string $brand, string $model)
    {
        $this->brand = $brand;
        $this->model = $model;
    }

    public function __destruct(){
        echo $this->brand;
    }
}