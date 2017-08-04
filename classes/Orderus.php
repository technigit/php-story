<?php

class Orderus
{
    public $name = "Orderus";

    private $orderus_health_min = 70;
    private $orderus_health_max = 100;

    private $orderus_strength_min = 70;
    private $orderus_strength_max = 80;

    private $orderus_defense_min = 45;
    private $orderus_defense_max = 55;

    private $orderus_speed_min = 40;
    private $orderus_speed_max = 50;

    private $orderus_luck_min = 10;
    private $orderus_luck_max = 30;

    private $orderus_health_last = 0;
    private $orderus_strength_last = 0;
    private $orderus_defense_last = 0;
    private $orderus_speed_last = 0;
    private $orderus_luck_last = 0;

    public function __construct()
    {
        $this->health = rand($this->orderus_health_min, $this->orderus_health_max);
        $this->strength = rand($this->orderus_strength_min, $this->orderus_strength_max);
        $this->defense = rand($this->orderus_defense_min, $this->orderus_defense_max);
        $this->speed = rand($this->orderus_speed_min, $this->orderus_speed_max);
        $this->luck = rand($this->orderus_luck_min, $this->orderus_luck_max);
    }
}
