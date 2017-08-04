<?php

class Game
{
    private $turns = 5; // temporary for initial commit

    public function __construct($ui)
    {
        $this->ui = $ui;
        $this->winner = new stdClass();
        $this->winner->is_orderus = false;
        $this->winner->is_beast = false;
        $this->orderus = new Orderus();
        $this->beast = new Beast();
    }

    public $is_running = true;

    public function display_stats()
    {
        $this->ui->display("--");
        $this->display_individual_stats($this->orderus);
        $this->display_individual_stats($this->beast);
        $this->ui->display("--");
    }

    private function display_individual_stats($player)
    {
        $this->ui->display([
         "$player->name:",
         "  Health: " . $player->health,
         "  Strength: " . $player->strength,
         "  Defense: " . $player->defense,
         "  Speed: " . $player->speed,
         "  Luck: " . $player->luck,
        ]);
    }

    public function play_round()
    {
        // temporary for initial commit
        $this->turns--;
        $this->is_running = ($this->turns > 0);
    }
}
