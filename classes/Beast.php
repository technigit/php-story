<?php

class Beast extends Player
{
    public $name = "Beast";

    private $health_min = 60;
    private $health_max = 90;

    private $strength_min = 60;
    private $strength_max = 90;

    private $defense_min = 40;
    private $defense_max = 60;

    private $speed_min = 40;
    private $speed_max = 60;

    private $luck_min = 25;
    private $luck_max = 40;

    public function __construct()
    {
        $this->health = rand($this->health_min, $this->health_max);
        $this->strength = rand($this->strength_min, $this->strength_max);
        $this->defense = rand($this->defense_min, $this->defense_max);
        $this->speed = rand($this->speed_min, $this->speed_max);
        $this->luck = rand($this->luck_min, $this->luck_max);
    }
}
