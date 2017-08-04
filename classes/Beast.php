<?php

class Beast
{
    public $name = "Beast";

    private $beast_health_min = 60;
    private $beast_health_max = 90;

    private $beast_strength_min = 60;
    private $beast_strength_max = 90;

    private $beast_defense_min = 40;
    private $beast_defense_max = 60;

    private $beast_speed_min = 40;
    private $beast_speed_max = 60;

    private $beast_luck_min = 25;
    private $beast_luck_max = 40;

    private $beast_health_last = 0;
    private $beast_strength_last = 0;
    private $beast_defense_last = 0;
    private $beast_speed_last = 0;
    private $beast_luck_last = 0;

    public function __construct()
    {
        $this->health = rand($this->beast_health_min, $this->beast_health_max);
        $this->strength = rand($this->beast_strength_min, $this->beast_strength_max);
        $this->defense = rand($this->beast_defense_min, $this->beast_defense_max);
        $this->speed = rand($this->beast_speed_min, $this->beast_speed_max);
        $this->luck = rand($this->beast_luck_min, $this->beast_luck_max);
    }
}
