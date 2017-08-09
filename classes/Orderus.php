<?php

class Orderus extends Player
{
    public $name = "Orderus";

    private $health_min = 70;
    private $health_max = 100;

    private $strength_min = 70;
    private $strength_max = 80;

    private $defense_min = 45;
    private $defense_max = 55;

    private $speed_min = 40;
    private $speed_max = 50;

    private $luck_min = 10;
    private $luck_max = 30;

    public function __construct()
    {
        $this->health = rand($this->health_min, $this->health_max);
        $this->strength = rand($this->strength_min, $this->strength_max);
        $this->defense = rand($this->defense_min, $this->defense_max);
        $this->speed = rand($this->speed_min, $this->speed_max);
        $this->luck = rand($this->luck_min, $this->luck_max);
    }
}
