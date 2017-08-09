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
        $this->display_individual_stats($this->orderus);
        $this->display_individual_stats($this->beast);
    }

    private function display_individual_stats($player)
    {
        $changes = $player->stat_changes();
        if (count($changes) > 0) {
            $this->ui->display("| $player->name:");
            foreach ($changes as $change) {
                $this->ui->display("|   " . $change->type . ": " . $change->value);
            }
        }
        $player->save_stats();
    }

    public function play_round()
    {
        // temporary for initial commit
        $this->turns--;
        $this->is_running = ($this->turns > 0);
    }
}
